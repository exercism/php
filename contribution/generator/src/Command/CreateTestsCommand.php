<?php

namespace App\Command;

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
    private BuilderFactory $builderFactory;

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

        $io = new SymfonyStyle($input, $output);
        $io->writeln('Generating tests for ' . $input->getArgument('exercise'));

        // $this->createTests();

        $io->success('Generating Tests - Finished');
        return Command::SUCCESS;
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
