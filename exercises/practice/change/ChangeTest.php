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

class ChangeTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Change.php';
    }

    public function testSingleCoinChange(): void
    {
        $this->assertEquals([25], findFewestCoins([1, 5, 10, 25, 100], 25));
    }

    public function testChange(): void
    {
        $this->assertEquals([5, 10], findFewestCoins([1, 5, 10, 25, 100], 15));
    }

    public function testChangeWithLilliputianCoins(): void
    {
        $this->assertEquals([4, 4, 15], findFewestCoins([1, 4, 15, 20, 50], 23));
    }

    public function testChangeWithLowerElboniaCoins(): void
    {
        $this->assertEquals([21, 21, 21], findFewestCoins([1, 5, 10, 21, 25], 63));
    }

    public function testWithLargeTargetValue(): void
    {
        $this->assertEquals(
            [2, 2, 5, 20, 20, 50, 100, 100, 100, 100, 100, 100, 100, 100, 100],
            findFewestCoins([1, 2, 5, 10, 20, 50, 100], 999)
        );
    }

    public function testPossibleChangeWithoutUnitCoinsAvailable(): void
    {
        $this->assertEquals(
            [2, 2, 2, 5, 10],
            findFewestCoins([2, 5, 10, 20, 50], 21)
        );
    }

    public function testAnotherPossibleChangeWithoutUnitCoinsAvailable(): void
    {
        $this->assertEquals(
            [4, 4, 4, 5, 5, 5],
            findFewestCoins([4, 5], 27)
        );
    }

    public function testNoCoinsForZero(): void
    {
        $this->assertEquals([], findFewestCoins([1, 5, 10, 21, 25], 0));
    }

    public function testForChangeSmallerThanAvailableCoins(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('No coins small enough to make change');

        findFewestCoins([5, 10], 3);
    }

    public function testErrorIfNoCombinationCanAddUpToTarget(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('No combination can add up to target');

        findFewestCoins([5, 10], 94);
    }

    public function testChangeValueLessThanZero(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Cannot make change for negative value');

        findFewestCoins([1, 2, 5], -5);
    }
}
