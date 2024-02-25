<?php

declare(strict_types=1);

namespace App;

use App\TrackData\CanonicalData;
use PhpParser\BuilderFactory;
use PhpParser\Node;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\PrettyPrinter;
use PHPUnit\Framework\TestCase;

class TestGenerator
{
    private BuilderFactory $builderFactory;

    public function createTestsFor(
        CanonicalData $canonicalData,
        string $exerciseClass
    ): string {
        $this->builderFactory = new BuilderFactory();

        $class = $this->builderFactory->class(
            $exerciseClass . "Test"
        )->makeFinal()->extend(TestCase::class);

        // Include Setup Method
        $methodSetup = 'setUpBeforeClass';
        $method = $this->builderFactory->method($methodSetup)
            ->makePublic()
            ->makeStatic()
            ->setReturnType('void')
            ->addStmt(
                $this->builderFactory->funcCall(
                    "require_once",
                    [$exerciseClass . ".php"]
                ),
            );

        $class->addStmt($method);

        foreach ($canonicalData->testCases as $case) {
            // Generate a method for each test case
            $description = $case->description;
            $methodName = ucfirst(str_replace('-', ' ', $description));
            $methodName = 'test' . str_replace(' ', '', ucwords($methodName));
            $uuid = $case->uuid;

            // $exceptionClassName = new Node\Name\FullyQualified('Exception');
            $method = $this->builderFactory->method($methodName)
                ->makePublic()
                ->setReturnType('void')
                ->setDocComment("/**\n * uuid: $uuid\n */")
                ;
            // if (isset($case->expected->error)) {
            //     $method->addStmt(
            //         $this->builderFactory->funcCall('$this->expectException',
            //         [new Node\Arg(new Node\Expr\ClassConstFetch($exceptionClassName, 'class'))]
            //         )
            //     )
            //     ->addStmt($this->builderFactory->funcCall($case->property, [$case->input->strand ?? 'unknown']))
            //     ;
            // } else {
            //     $method->addStmt(
            //         $this->builderFactory->funcCall('$this->assertEquals', [
            //             $case->expected,
            //             $this->builderFactory->funcCall($case->property, [$case->input->strand ?? 'unknown'])
            //         ])
            //     );
            // }

            $class->addStmt($method);
        }

        $namespace = new Namespace_(new Node\Name('Tests'));
        $namespace->stmts[] = $class->getNode();

        $printer = new PrettyPrinter\Standard();

        return $printer->prettyPrintFile([$namespace]) . PHP_EOL;
    }
}
