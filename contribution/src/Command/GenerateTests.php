<?php

declare(strict_types=1);

namespace App\Command;

use App\Configlet;
use App\Model\CanonicalData\CanonicalData;
use App\Model\CanonicalData\LabeledTest;
use App\Model\CanonicalData\LabeledTestGroup;
use App\Model\CanonicalData\LabeledTestItem;
use Brick\VarExporter\VarExporter;
use InvalidArgumentException;
use JsonException;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemException;
use PhpCollective\Toml\Exception\ParseException;
use PhpCollective\Toml\Toml;
use Psr\Log\LoggerInterface;
use RuntimeException;
use Symfony\Component\Console\Attribute\Argument;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Attribute\Option;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;
use Twig\Environment;
use Twig\Error\Error as TwigError;
use Twig\Loader\ArrayLoader;
use Twig\TwigFunction;

use function array_filter;
use function array_key_exists;
use function assert;
use function implode;
use function json_decode;
use function preg_replace;
use function str_replace;
use function ucwords;

use const JSON_THROW_ON_ERROR;

#[AsCommand('exercism:generate-tests', 'Exercism PHP Test Generator')]
class GenerateTests
{
    public function __construct(
        private Configlet $configlet,
        private Filesystem $exercisesFilesystem,
    ) {}

    /**
     * @throws TwigError
     * @throws ParseException
     * @throws FilesystemException
     * @throws JsonException
     * @throws RuntimeException
     */
    public function __invoke(
        OutputInterface $output,
        #[Argument('Slug of the exercise')]
        string $exerciseSlug,
        #[Option(suggestedValues: ['practice', 'concept'])]
        string $category = 'practice',
        #[Option('Checks whether the existing files are the same as generated one.')]
        bool $check = false,
    ): int {
        $logger = new ConsoleLogger($output);
        $canonicalData = $this->configlet->canonicalData($exerciseSlug);

        $success = $this->generate($category . '/' . $exerciseSlug, $check, $canonicalData, $logger);

        return $success ? Command::SUCCESS : Command::FAILURE;
    }

    /**
     * @throws FilesystemException
     * @throws TwigError
     * @throws ParseException
     */
    public function generate(string $basePath, bool $check, CanonicalData $canonicalData, LoggerInterface $logger): bool // @mago-expect lint:no-boolean-flag-parameter
    {
        // 1. Read config.json
        $configJson = $this->exercisesFilesystem->read($basePath . '/.meta/config.json');
        /** @var array{files: array{test: list<string>}} $config */
        $config = json_decode($configJson, true, flags: JSON_THROW_ON_ERROR);
        $testsPaths = $config['files']['test'];
        $logger->info('.meta/config.json: tests files: ' . implode(', ', $testsPaths));

        if ($testsPaths === []) {
            $logger->warning('.meta/config.json: `files.test` key is empty');
        }

        // 2. Read test.toml
        $testsToml = $this->exercisesFilesystem->read($basePath . '/.meta/tests.toml');
        /** @var array<string, array{description: string, include?: bool, comment?: string}> $tests */
        $tests = Toml::decode($testsToml);

        // 3. Remove `include = false` tests
        $excludedTests = array_filter(
            $tests,
            static fn(array $props) => array_key_exists('include', $props) && !$props['include'],
        );
        $this->removeExcludedTests($excludedTests, $canonicalData);

        // 4. foreach tests files, check if there is a twig file
        $twigLoader = new ArrayLoader();
        $twigEnvironment = new Environment($twigLoader, ['strict_variables' => true, 'autoescape' => false]);
        $twigEnvironment->addFunction(new TwigFunction('export', static fn(mixed $value) => VarExporter::export( // @mago-expect analyzer:unhandled-thrown-type
            $value,
            VarExporter::INLINE_ARRAY,
        )));
        $twigEnvironment->addFunction(new TwigFunction('testfn', static function (string $label) {
            $labelSpaced = preg_replace('/[^a-zA-Z0-9]/', ' ', $label);
            assert($labelSpaced !== null, 'preg_replace failed');

            return 'test' . str_replace(' ', '', ucwords($labelSpaced));
        }));
        $twigEnvironment->addFunction(
            new TwigFunction(
                'sort_input',
                /**
                 * @param array<string, mixed> $inputs
                 * @param list<string> $order
                 */
                static function (array $inputs, array $order) {
                    uksort($inputs, static function (string $keyA, string $keyB) use ($order): int {
                        $keyAIdx = array_search($keyA, $order, true);
                        if ($keyAIdx === false) {
                            throw new InvalidArgumentException(
                                '`' . $keyA . '` not in `' . implode(', ', $order) . '`',
                            );
                        }

                        $keyBIdx = array_search($keyB, $order, true);
                        if ($keyBIdx === false) {
                            throw new InvalidArgumentException(
                                '`' . $keyB . '` not in `' . implode(', ', $order) . '`',
                            );
                        }

                        return $keyAIdx <=> $keyBIdx;
                    });

                    return $inputs;
                },
            ),
        );
        foreach ($testsPaths as $testPath) {
            // 5. generate the file
            $twigFilename = $testPath . '.twig';
            $testTemplate = $this->exercisesFilesystem->read($basePath . '/' . $twigFilename);
            $rendered = $twigEnvironment
                ->createTemplate($testTemplate, $twigFilename)
                ->render(['canonicalData' => $canonicalData]);

            if ($check) {
                // 6. Compare it if check mode
                if ($this->exercisesFilesystem->read($basePath . '/' . $testPath) !== $rendered) {
                    return false;
                }
            } else {
                $this->exercisesFilesystem->write($basePath . '/' . $testPath, $rendered);
            }
        }

        return true;
    }

    /**
     * @param array<string, array{description: string, include?: bool, comment?: string}> $tests
     */
    private function removeExcludedTests(array $tests, CanonicalData|LabeledTestGroup $group): void
    {
        $group->cases = array_values(array_filter($group->cases, function (LabeledTestItem $case) use ($tests) {
            if ($case instanceof LabeledTestGroup) {
                $this->removeExcludedTests($tests, $case);
                return true;
            }

            assert($case instanceof LabeledTest, '$case is either one or the other');

            return !array_key_exists($case->uuid, $tests);
        }));
    }
}
