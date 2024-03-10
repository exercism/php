<?php

declare(strict_types=1);

namespace App\TrackData;

use App\TrackData\CanonicalData\TestCase;
use PhpParser\BuilderFactory;
use PhpParser\Comment\Doc;
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
        // TODO: The exercise key is not required
        public string $exercise,
        public array $testCases = [],
        public array $comments = [],
        private ?object $unknown = null,
    ) {
    }

    public static function from(object $rawData): ?self
    {
        if (empty(\get_object_vars($rawData))) {
            return null;
        }

        $comments = $rawData->comments ?? [];
        unset($rawData->comments);

        return new static(
            '',
            comments: $comments,
            unknown: empty(\get_object_vars($rawData)) ? null : $rawData,
        );
    }

    public function toPhpCode(
        string $testClass,
        string $solutionFile,
    ): string {
        $topLevelStatements = [];

        if ($this->unknown !== null) {
            $nop = new Nop();
            $nop->setDocComment(new Doc($this->asMultiLineComment([\json_encode($this->unknown)])));
            $topLevelStatements[] = $nop;
        }

        $builderFactory = new BuilderFactory();
        // TODO: Add `declare(strict_types=1);`
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

        // Include Setup Method
        $methodSetup = 'setUpBeforeClass';
        $method = $builderFactory->method($methodSetup)
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

        if (\count($this->testCases) > 0) {
            // TODO: Add test cases
        }

        $class->addStmt($method);

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
