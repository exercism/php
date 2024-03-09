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
    /**
     * PHP_EOL is CRLF on Windows, we always want LF
     * @see https://www.php.net/manual/en/reserved.constants.php#constant.php-eol
     */
    private const LF = "\n";

    private BuilderFactory $builderFactory;

    public function createTestClassFor(
        CanonicalData $canonicalData,
        string $exerciseClass
    ): string {
        $this->builderFactory = new BuilderFactory();

        $class = $this->builderFactory->class(
            $exerciseClass . "Test"
        )->makeFinal()->extend('TestCase');
        $class->setDocComment($this->asDocBlock([
            ...$canonicalData->comments,
            '',
            ...$this->trackRulesDocBlock()
        ]));

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
            $description = \ucfirst($case->description);
            $methodName = ucfirst(str_replace('-', ' ', $description));
            $methodName = 'test' . str_replace(' ', '', ucwords($methodName));

            // $exceptionClassName = new Node\Name\FullyQualified('Exception');
            $method = $this->builderFactory->method($methodName)
                ->makePublic()
                ->setReturnType('void')
                ->setDocComment($this->asDocBlock([
                    'uuid: ' . $case->uuid,
                    '@testdox ' . $description,
                ]))
                ->addStmt(
                    $this->builderFactory->funcCall(
                        '$this->markTestIncomplete',
                        [ 'This test has not been implemented yet.' ],
                    )
                )
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
        $namespace->stmts[] = $this->builderFactory->use(TestCase::class)->getNode();
        $namespace->stmts[] = $class->getNode();

        $printer = new PrettyPrinter\Standard();

        return $printer->prettyPrintFile([$namespace]) . self::LF;
    }

    private function asDocBlock(array $lines): string
    {
        $lf = self::LF;

        return self::LF
            . '/**' . self::LF
            . ' * ' . implode(self::LF . ' * ', $lines) . self::LF
            . ' */'
            ;
    }

    private function trackRulesDocBlock(): array
    {
        return \explode(self::LF, <<<'EO_TRACK_RULES'
        - Please use `assertSame()` whenever possible. Add a comment with reason
          when it is not possible.
        - Do not use calls with named arguments. Use them only when the
          exercise requires named arguments (e.g. because the exercise is
          about named arguments).
          Named arguments are in the way of defining argument names the
          students want (e.g. in their native language).
        - Add `@testdox` with a useful test title, e.g. the test case heading
          from canonical data. The online editor shows that to students.
        - Add fail messages to assertions where helpful to tell students more
          than `@testdox` says.
        EO_TRACK_RULES);
    }
}
