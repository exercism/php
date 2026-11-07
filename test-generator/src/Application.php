<?php

declare(strict_types=1);

namespace App;

use Brick\VarExporter\VarExporter;
use Exception;
use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Psr\Log\LoggerInterface;
use RuntimeException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\SingleCommandApplication;
use Twig\Environment;
use Twig\Loader\ArrayLoader;
use Twig\TwigFunction;

use function array_filter;
use function array_key_exists;
use function assert;
use function file_get_contents;
use function implode;
use function is_array;
use function is_bool;
use function is_string;
use function json_decode;
use function preg_replace;
use function str_replace;
use function ucwords;

use const JSON_THROW_ON_ERROR;

class Application extends SingleCommandApplication
{
    public function __construct()
    {
        parent::__construct('Exercism PHP Test Generator');
    }

    protected function configure(): void
    {
        parent::configure();

        $this->setVersion('1.0.0');
        // @TODO
        $this->addArgument('exercise-path', InputArgument::REQUIRED, 'Path of the exercise.');
        $this->addArgument('canonical-data', InputArgument::REQUIRED, 'Path of the canonical data for the exercise. (Use `bin/configlet -verbosity info --offline`)');
        $this->addOption('check', null, InputOption::VALUE_NONE, 'Checks whether the existing files are the same as generated one.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $exercisePath = $input->getArgument('exercise-path');
        $canonicalPath = $input->getArgument('canonical-data');
        $exerciseCheck = $input->getOption('check');
        assert(is_string($exercisePath), 'exercise-path must be a string');
        assert(is_string($canonicalPath), 'canonical-data must be a string');
        assert(is_bool($exerciseCheck), 'check must be a bool');

        $logger = new ConsoleLogger($output);
        $logger->info('Exercise path: ' . $exercisePath);
        $logger->info('canonical-data path: ' . $canonicalPath);

        $canonicalDataJson = file_get_contents($canonicalPath);
        if ($canonicalDataJson === false) {
            throw new RuntimeException('Faield to fetch canonical-data.json, check you `canonical-data` argument.');
        }

        $canonicalData = json_decode($canonicalDataJson, true, flags: JSON_THROW_ON_ERROR);
        assert(is_array($canonicalData), 'json_decode(..., true) should return an array');
        $exerciseAdapter = new LocalFilesystemAdapter($exercisePath);
        $exerciseFilesystem = new Filesystem($exerciseAdapter);

        $success = $this->generate($exerciseFilesystem, $exerciseCheck, $canonicalData, $logger);

        return $success ? self::SUCCESS : self::FAILURE;
    }

    /** @param array<string, mixed> $canonicalData */
    public function generate(Filesystem $exerciseDir, bool $check, array $canonicalData, LoggerInterface $logger): bool
    {
        // 1. Read config.json
        $configJson = $exerciseDir->read('/.meta/config.json');
        $config = json_decode($configJson, true, flags: JSON_THROW_ON_ERROR);
        assert(is_array($config), 'json_decode(..., true) should return an array');

        if (! isset($config['files']['test']) || ! is_array($config['files']['test'])) {
            throw new RuntimeException('.meta/config.json: missing or invalid `files.test` key');
        }

        $testsPaths = $config['files']['test'];
        $logger->info('.meta/config.json: tests files: ' . implode(', ', $testsPaths));

        if (empty($testsPaths)) {
            $logger->warning('.meta/config.json: `files.test` key is empty');
        }

        // 2. Read test.toml
        $testsToml = $exerciseDir->read('/.meta/tests.toml');
        $tests = TomlParser::parse($testsToml);

        // 3. Remove `include = false` tests
        $excludedTests = array_filter($tests, static fn (array $props) => isset($props['include']) && $props['include'] === false);
        $this->removeExcludedTests($excludedTests, $canonicalData['cases']);

        // 4. foreach tests files, check if there is a twig file
        $twigLoader = new ArrayLoader();
        $twigEnvironment = new Environment($twigLoader, ['strict_variables' => true, 'autoescape' => false]);
        $twigEnvironment->addFunction(new TwigFunction('export', static fn (mixed $value) => VarExporter::export($value, VarExporter::INLINE_ARRAY)));
        $twigEnvironment->addFunction(new TwigFunction('testfn', static fn (string $label) => 'test' . str_replace(' ', '', ucwords(preg_replace('/[^a-zA-Z0-9]/', ' ', $label)))));
        foreach ($testsPaths as $testPath) {
            // 5. generate the file
            $twigFilename = $testPath . '.twig';
            // @TODO warning or error if it does not exist
            $testTemplate = $exerciseDir->read($twigFilename);
            $rendered = $twigEnvironment->createTemplate($testTemplate, $twigFilename)->render($canonicalData);

            if ($check) {
                // 6. Compare it if check mode
                if ($exerciseDir->read($testPath) !== $rendered) {
                    // return false;
                    throw new Exception('Differences between generated and existing file');
                }
            } else {
                $exerciseDir->write($testPath, $rendered);
            }
        }

        return true;
    }

    private function removeExcludedTests(array $tests, array &$cases): void
    {
        foreach ($cases as $key => &$case) {
            if (array_key_exists('cases', $case)) {
                $this->removeExcludedTests($tests, $case['cases']);
            } else {
                assert(array_key_exists('uuid', $case));
                if (array_key_exists($case['uuid'], $tests)) {
                    unset($cases[$key]);
                }
            }
        }
    }
}
