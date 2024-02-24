<?php

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
    private string $exerciseSlug;

    public function __construct()
    {
        $this->builderFactory = new BuilderFactory();

        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('exercise', InputArgument::REQUIRED, 'Exercise slug');
    }

    /**
     * @throws \JsonException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->exerciseSlug = $input->getArgument('exercise');

        // TODO: Make this relative to $PWD === track root
        $pathToConfiglet = '../../bin/configlet';
        if (!(is_executable($pathToConfiglet) && is_file($pathToConfiglet)))
            throw new RuntimeException(
                'configlet not found. Fetch configlet and create exercise with configlet first!'
            );

        // TODO: Make this relative to $PWD === track root
        $pathToPracticeExercise = '../../exercises/practice/' . $this->exerciseSlug;
        if (!(is_writable($pathToPracticeExercise) && is_dir($pathToPracticeExercise)))
            throw new RuntimeException(
                'Cannot write to exercise directory. Create exercise with configlet first or check access rights!'
            );


        $io = new SymfonyStyle($input, $output);
        $io->writeln('Generating tests for ' . $this->exerciseSlug . ' in ' . $pathToPracticeExercise);

        $pathToCanonicalData = $this->pathToCachedCanonicalData();
        $io->writeln('Constructed path to canonical data: ' . $pathToCanonicalData);

        if (!(is_readable($pathToCanonicalData) && is_file($pathToCanonicalData)))
            throw new RuntimeException(
                'Cannot read "configlet" provided cached canonical data from '
                . $pathToCanonicalData
                .'. Check exercise slug or access rights!'
            );

        $io->success('Generating Tests - Finished');
        return Command::SUCCESS;
    }

    private function pathToCachedCanonicalData(): string
    {
        // TODO: Make this relative to $PWD === track root
        $command = 'bash -c \'set -eo pipefail; ../../bin/configlet -v d -t ../.. info -o | head -1 | cut -d " " -f 5\'';
        $resultCode = 1;
        $configletCache = \exec(command: $command, result_code: $resultCode);
        if ($configletCache === false || $resultCode !== Command::SUCCESS)
            throw new RuntimeException(
                '"configlet" could not provide cached canonical data. Create exercise with configlet first!'
            );

        return \sprintf('%1$s/exercises/%2$s/canonical-data.json', $configletCache, $this->exerciseSlug);
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
