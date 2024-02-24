<?php

declare(strict_types=1);

namespace App\Command;

use PhpParser\BuilderFactory;
use PhpParser\Node;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\PrettyPrinter;
use RuntimeException;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:create-tests',
    description: 'This will automatically create tests',
)]
class CreateTestsCommand extends Command
{
    private BuilderFactory $builderFactory;
    private string $trackRoot;
    private string $pathToConfiglet = '';
    private string $pathToPracticeExercises = '';
    private string $pathToPracticeExercise = '';
    private string $pathToCanonicalData = '';

    private string $exerciseSlug;

    public function __construct()
    {
        // TODO: Make this $PWD (being injected by DI) and check for $PWD === track root
        $this->trackRoot = '../..';
        $this->pathToConfiglet = $this->trackRoot . '/bin/configlet';
        $this->pathToPracticeExercises = $this->trackRoot . '/exercises/practice/';

        $this->builderFactory = new BuilderFactory();

        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('exercise', InputArgument::REQUIRED, 'Exercise slug');
    }

    /**
     * @throws RuntimeException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->exerciseSlug = $input->getArgument('exercise');
        $this->pathToPracticeExercise =
            $this->pathToPracticeExercises . $this->exerciseSlug;

        $this->ensureConfigletCanBeUsed();
        $this->ensurePracticeExerciseCanBeUsed();
        $this->pathToCachedCanonicalDataFromConfiglet();
        $this->ensurePathToCanonicalDataCanBeUsed();

        $io = new SymfonyStyle($input, $output);
        $io->writeln('Generating tests for ' . $this->exerciseSlug . ' in ' . $this->pathToPracticeExercise);
        $io->writeln('Constructed path to canonical data: ' . $this->pathToCanonicalData);

        $io->success('Generating Tests - Finished');
        return Command::SUCCESS;
    }

    private function ensurePathToCanonicalDataCanBeUsed(): void
    {
        if (
            !(
                is_readable($this->pathToCanonicalData)
                && is_file($this->pathToCanonicalData)
            )
        ) {
            throw new RuntimeException(
                'Cannot read "configlet" provided cached canonical data from '
                . $this->pathToCanonicalData
                .'. Check exercise slug or access rights!'
            );
        }
    }

    private function ensurePracticeExerciseCanBeUsed(): void
    {
        if (
            !(
                is_writable($this->pathToPracticeExercise)
                && is_dir($this->pathToPracticeExercise)
            )
        ) {
            throw new RuntimeException(
                'Cannot write to exercise directory. Create exercise with'
                . ' configlet first or check access rights!'
            );
        }
    }

    private function ensureConfigletCanBeUsed(): void
    {
        if (
            !(
                is_executable($this->pathToConfiglet)
                && is_file($this->pathToConfiglet)
            )
        ) {
            throw new RuntimeException(
                'configlet not found. Run the generator from track root.'
                . ' Fetch configlet and create exercise with configlet first!'
            );
        }
    }

    private function pathToCachedCanonicalDataFromConfiglet(): void
    {
        $command = 'bash -c \'set -eo pipefail; '
            . $this->pathToConfiglet
            . ' -v d -t '
            . $this->trackRoot
            . ' info -o | head -1 | cut -d " " -f 5\''
            ;
        $resultCode = Command::FAILURE;

        $configletCache = \exec(command: $command, result_code: $resultCode);
        if ($configletCache === false || $resultCode !== Command::SUCCESS) {
            throw new RuntimeException(
                '"configlet" could not provide cached canonical data.'
                . ' Create exercise with configlet first!'
            );
        }

        $this->pathToCanonicalData = \sprintf(
            '%1$s/exercises/%2$s/canonical-data.json',
            $configletCache,
            $this->exerciseSlug
        );
    }

    /**
     * @throws \JsonException
     */
    private function createTests(): void
    {
        $jsonData = file_get_contents(__DIR__ . "/canonical-data.json");
        $data = json_decode($jsonData, true, 512, JSON_THROW_ON_ERROR);

        $classBuilder = $this->builderFactory->class($this->generateClassName($data['exercise']) . "Test")->makeFinal()->extend('\PHPUnit\Framework\TestCase');

        // Include Setup Method
        $methodSetup = 'setUpBeforeClass';
        $method = $this->builderFactory->method($methodSetup)
            ->makePublic()
            ->makeStatic()
            ->setReturnType('void')
            ->addStmt(
                $this->builderFactory->funcCall(
                    "require_once",
                    [$this->generateClassName($data['exercise']) . ".php"]
                ),
            );

        $classBuilder->addStmt($method);

        foreach ($data['cases'] as $case) {
            // Generate a method for each test case
            $description = $case['description'];
            $methodName = ucfirst(str_replace('-', ' ', $description));
            $methodName = 'test' . str_replace(' ', '', ucwords($methodName));
            $uuid = $case['uuid'];

            $exceptionClassName = new Node\Name\FullyQualified('Exception');
            if (isset($case['expected']['error'])) {
                $method = $this->builderFactory->method($methodName)
                    ->makePublic()
                    ->setReturnType('void')
                    ->addStmt(
                        $this->builderFactory->funcCall('$this->expectException',
                        [new Node\Arg(new Node\Expr\ClassConstFetch($exceptionClassName, 'class'))]
                        )
                    )
                    ->addStmt($this->builderFactory->funcCall($case['property'], [$case['input']['strand']]))
                    ->setDocComment("/**\n * uuid: $uuid\n */");
            } else {
                $method = $this->builderFactory->method($methodName)
                    ->makePublic()
                    ->setReturnType('void')
                    ->addStmt(
                        $this->builderFactory->funcCall('$this->assertEquals', [
                            $case['expected'],
                            $this->builderFactory->funcCall($case['property'], [$case['input']['strand']])
                        ])
                    )
                    ->setDocComment("/**\n * uuid: $uuid\n */");
            }
            $classBuilder->addStmt($method);
        }

        $class = $classBuilder->getNode();

        $namespace = new Namespace_(new Node\Name('Tests'));
        $namespace->stmts[] = $class;

        $printer = new PrettyPrinter\Standard();

        // Write to file
        $file = fopen(__DIR__ . "/" . $this->generateClassName($data['exercise']) . "Test.php", "w") or die("Unable to open file!");
        fwrite($file, $printer->prettyPrintFile([$namespace]) . PHP_EOL);
        fclose($file);

    }

    private function generateClassName(string $name): string
    {
        $name = str_replace("-", " ", $name);
        $name = ucwords($name);
        return str_replace(" ", "", $name);
    }
}
