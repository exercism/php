<?php

declare(strict_types=1);

namespace App\TrackData;

use App\TrackData\CanonicalData\TestCase;
use App\TrackData\CanonicalData\Unknown;
use PhpParser\BuilderFactory;
use PhpParser\Comment\Doc;
use PhpParser\Node\DeclareItem;
use PhpParser\Node\Scalar\Int_;
use PhpParser\Node\Stmt\Declare_;
use PhpParser\Node\Stmt\Nop;
use PhpParser\PrettyPrinter\Standard;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class CanonicalData
{
    /**
     * PHP_EOL is CRLF on Windows, we always want LF
     * @see https://www.php.net/manual/en/reserved.constants.php#constant.php-eol
     */
    private const LF = "\n";

    /**
     * @param TestCase[] $testCases
     * @param string[] $comments
     */
    public function __construct(
        public array $testCases = [],
        public array $comments = [],
        private ?object $unknown = null,
    ) {
    }

    public static function from(object $rawData): self
    {
        $comments = $rawData->comments ?? [];
        unset($rawData->comments);

        $testCases = [];
        foreach($rawData->cases ?? [] as $rawTestCase) {
            $thisCase = TestCase::from($rawTestCase);
            if ($thisCase === null)
                $thisCase = Unknown::from($rawTestCase);
            $testCases[] = $thisCase;
        }
        unset($rawData->cases);

        // Ignore "exercise" key (not required)
        unset($rawData->exercise);

        return new static(
            testCases: $testCases,
            comments: $comments,
            unknown: empty(\get_object_vars($rawData)) ? null : $rawData,
        );
    }

    public function toPhpCode(
        string $testClass,
        string $solutionFile,
        string $solutionClass = 'TODO',
    ): string {
        $topLevelStatements = [];

        if ($this->unknown !== null) {
            $nop = new Nop();
            $nop->setDocComment(new Doc($this->asMultiLineComment([\json_encode($this->unknown)])));
            $topLevelStatements[] = $nop;
        }

        $topLevelStatements[] = new Declare_([
            new DeclareItem('strict_types', new Int_(1))
        ]);

        // Renders as empty line
        $nop = new Nop();
        $topLevelStatements[] = $nop;

        $builderFactory = new BuilderFactory();

        $topLevelStatements[] = $builderFactory->use(PHPUnitTestCase::class)->getNode();

        $class = $builderFactory->class($testClass)
            ->makeFinal()
            ->extend('TestCase')
            ->setDocComment(
                $this->asDocBlock(
                    [
                        ...$this->comments,
                        ...(\count($this->comments) > 0 ? [''] : []),
                        ...$this->trackRules()
                    ]
                )
            )
            ;

        // Require solution file once in setUpBeforeClass()
        $method = $builderFactory->method('setUpBeforeClass')
            ->makePublic()
            ->makeStatic()
            ->setReturnType('void')
            ->addStmt(
                $builderFactory->funcCall(
                    "require_once",
                    [ $solutionFile ]
                ),
            )
            ;
        $class->addStmt($method);

        /*
        // Produce new instance in setUp()
        // TODO: Add class property 'subject'
        $method = $builderFactory->method('setUp')
            ->makePublic()
            ->setReturnType('void')
            ->addStmt(new Assign(
                $builderFactory->var('this->subject'),
                $builderFactory->new($solutionClass),
            ))
            ;
        $class->addStmt($method);
        */
        foreach($this->testCases as $count => $testCase) {
            $class->addStmts($testCase->asClassMethods('unknownMethod' . $count));
        }

        $topLevelStatements[] = $class->getNode();

        return (new Standard())->prettyPrintFile($topLevelStatements) . self::LF;
    }

    private function asDocBlock(array $lines): string
    {
        return self::LF
            . '/**' . self::LF
            . ' * ' . implode(self::LF . ' * ', $lines) . self::LF
            . ' */'
            ;
    }

    private function asMultiLineComment(array $lines): string
    {
        return self::LF
            . '/* Unknown data:' . self::LF
            . ' * ' . implode(self::LF . ' * ', $lines) . self::LF
            . ' */' . self::LF
            ;
    }

    private function trackRules(): array
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
