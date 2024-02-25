<?php

declare(strict_types=1);

namespace App\Command;

use App\TrackData\PracticeExercise;
use PhpParser\BuilderFactory;
use PhpParser\Node;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\PrettyPrinter;
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
    private string $trackRoot;

    public function __construct(
        private string $projectDir,
    ) {
        $this->trackRoot = realpath($projectDir . '/../..');

        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('exercise', InputArgument::REQUIRED, 'Exercise slug');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // TODO: Move things to `TestGenerator`
        $exerciseSlug = $input->getArgument('exercise');
        $exercise = new PracticeExercise(
            $this->trackRoot,
            $exerciseSlug,
        );

        $io = new SymfonyStyle($input, $output);
        $io->writeln('Generating tests for ' . $exerciseSlug . ' in ' . $exercise->pathToExercise());

        $io->success('Generating Tests - Finished');
        return Command::SUCCESS;
    }

    // TODO: Move to own class

    private BuilderFactory $builderFactory;

    /**
     * @throws \JsonException
     */
    private function createTests(): void
    {
        $this->builderFactory = new BuilderFactory();

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
