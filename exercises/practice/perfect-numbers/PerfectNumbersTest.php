<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class PerfectNumbersTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'PerfectNumbers.php';
    }

    public function testSmallPerfectNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("perfect", getClassification(6));
    }

    public function testMediumPerfectNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("perfect", getClassification(28));
    }

    public function testLargePerfectNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("perfect", getClassification(33550336));
    }

    public function testSmallAbundantNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("abundant", getClassification(12));
    }

    public function testMediumAbundantNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("abundant", getClassification(30));
    }

    public function testLargeAbundantNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("abundant", getClassification(33550335));
    }

    public function testSmallestPrimeDeficientNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("deficient", getClassification(2));
    }

    public function testSmallestNonPrimeDeficientNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("deficient", getClassification(4));
    }

    public function testMediumDeficientNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("deficient", getClassification(32));
    }

    public function testLargeDeficientNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("deficient", getClassification(33550337));
    }

    public function testThatOneIsCorrectlyClassifiedAsDeficient(): void
    {
        $this->assertEquals("deficient", getClassification(1));
    }

    public function testThatNonNegativeIntegerIsRejected(): void
    {
        $this->expectException(InvalidArgumentException::class);

        getClassification(0);
    }

    public function testThatNegativeIntegerIsRejected(): void
    {
        $this->expectException(InvalidArgumentException::class);

        getClassification(-1);
    }
}
