<?php

declare(strict_types=1);

namespace App\Command;

use App\Model\CanonicalData\CanonicalData;
use App\Model\CanonicalData\LabeledTest;
use App\Model\CanonicalData\LabeledTestGroup;
use App\Model\CanonicalData\LabeledTestItem;
use App\Service\Configlet;
use App\Service\PathResolver;
use Brick\VarExporter\ExportException;
use Brick\VarExporter\VarExporter;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemException;
use PhpParser\Builder\Class_;
use PhpParser\BuilderFactory;
use PhpParser\Comment;
use PhpParser\Node;
use PhpParser\PrettyPrinter;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Symfony\Component\Console\Attribute\Argument;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(name: 'exercism:test:bootstrap', description: 'Create test stubs.')]
class TestBootstrap
{
    public function __construct(
        private Configlet $configlet,
        private Filesystem $exercisesFilesystem,
    ) {}

    /**
     * @throws FilesystemException
     * @throws RuntimeException
     * @throws ExportException
     */
    public function __invoke(
        #[Argument('Exercise slug')]
        string $exerciseSlug,
        InputInterface $input,
        OutputInterface $output,
    ): int {
        $canonicalData = $this->configlet->canonicalData($exerciseSlug);
        $exercisePath = PathResolver::exercisePath('practice', $exerciseSlug);

        $io = new SymfonyStyle($input, $output);
        $io->writeln('Generating tests for ' . $exerciseSlug . ' in ' . $exercisePath);

        $this->exercisesFilesystem->write(
            // TODO(@mk-mxp): Make '$exercise->pathToTestFile()'
            $exercisePath . '/' . PathResolver::toPascalCase($exerciseSlug) . 'Test.php',
            $this->createTestsFor($canonicalData, PathResolver::toPascalCase($exerciseSlug)),
        );
        // TODO(@mk-mxp): Make '$exercise->pathToStudentsFile()'
        // TODO(@mk-mxp): Make '$testGenerator->studentsFileFor()'

        $io->success('Generating Tests - Finished');
        return Command::SUCCESS;
    }

    /**
     * @throws ExportException
     */
    private function createTestsFor(CanonicalData $canonicalData, string $exerciseClass): string
    {
        $builderFactory = new BuilderFactory();

        $class = $builderFactory
            ->class($exerciseClass . 'Test')
            ->makeFinal()
            ->extend('TestCase');
        $class->setDocComment("/**\n * " . implode("\n * ", $canonicalData->comments) . "\n */");

        // Include Setup Method
        $methodSetUp = $builderFactory
            ->method('setUpBeforeClass')
            ->makePublic()
            ->makeStatic()
            ->setReturnType('void')
            ->addStmt($builderFactory->funcCall('require_once', [$exerciseClass . '.php']));

        $class->addStmt($methodSetUp);

        $this->addCases($class, $builderFactory, $canonicalData->cases);

        $namespace = new Node\Stmt\Namespace_(new Node\Name('Tests'));
        $namespace->stmts[] = $builderFactory->use(TestCase::class)->getNode();
        $namespace->stmts[] = $class->getNode();

        $printer = new PrettyPrinter\Standard();

        return $printer->prettyPrintFile([$namespace]) . "\n";
    }

    /**
     * @param list<LabeledTestItem> $cases
     * @return void
     * @throws ExportException
     */
    private function addCases(Class_ $class, BuilderFactory $builderFactory, array $cases): void
    {
        foreach ($cases as $case) {
            if ($case instanceof LabeledTestGroup) {
                $this->addCases($class, $builderFactory, $case->cases);

                continue;
            }

            assert($case instanceof LabeledTest, '$case is always a LabeledTest here.');

            $description = \ucfirst($case->description);
            $methodTest = $builderFactory
                ->method(PathResolver::testFunctionName($description))
                ->makePublic()
                ->setReturnType('void')
                ->setDocComment("/** uuid: {$case->uuid} */")
                ->addAttribute(new Node\Attribute(
                    new Node\Name(\PHPUnit\Framework\Attributes\TestDox::class),
                    [new Node\Arg(new Node\Scalar\String_($description))],
                ));
            $methodTestBody = new Node\Stmt\Expression($builderFactory->funcCall('$this->markTestIncomplete', [
                'This test has not been implemented yet.',
            ]));
            $methodTestComment = preg_replace('/^/m', '// ', VarExporter::export([
                'property' => $case->property,
                'input' => $case->input,
                'expected' => $case->expected,
            ], VarExporter::INLINE_SCALAR_LIST | VarExporter::TRAILING_COMMA_IN_ARRAY));
            assert($methodTestComment !== null, 'Regex pattern always match any string');
            $methodTestBody->setAttribute('comments', [new Comment($methodTestComment)]);
            $methodTest->addStmt($methodTestBody);

            $class->addStmt($methodTest);
        }
    }
}
