<?php

require "change.php";

class ChangeTest extends PHPUnit\Framework\TestCase
{
    public function testSingleCoinChange()
    {
        $this->assertEquals([25], findFewestCoins([1, 5, 10, 25, 100], 25));
    }

    public function testChange()
    {
        $this->assertEquals([5, 10], findFewestCoins([1, 5, 10, 25, 100], 15));
    }

    public function testChangeWithLilliputianCoins()
    {
        $this->assertEquals([4, 4, 15], findFewestCoins([1, 4, 15, 20, 50], 23));
    }

    public function testChangeWithLowerElboniaCoins()
    {
        $this->assertEquals([21, 21, 21], findFewestCoins([1, 5, 10, 21, 25], 63));
    }

    public function testWithLargeTargetValue()
    {
        $this->assertEquals(
            [2, 2, 5, 20, 20, 50, 100, 100, 100, 100, 100, 100, 100, 100, 100],
            findFewestCoins([1, 2, 5, 10, 20, 50, 100], 999)
        );
    }

    public function testPossibleChangeWithoutUnitCoinsAvailable()
    {
        $this->assertEquals(
            [2, 2, 2, 5, 10],
            findFewestCoins([2, 5, 10, 20, 50], 21)
        );
    }

    public function testAnotherPossibleChangeWithoutUnitCoinsAvailable()
    {
        $this->assertEquals(
            [4, 4, 4, 5, 5, 5],
            findFewestCoins([4, 5], 27)
        );
    }

    public function testNoCoinsForZero()
    {
        $this->assertEquals([], findFewestCoins([1, 5, 10, 21, 25], 0));
    }

    public function testForChangeSmallerThanAvailableCoins()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('No coins small enough to make change');

        findFewestCoins([5, 10], 3);
    }

    public function testErrorIfNoCombinationCanAddUpToTarget()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('No combination can add up to target');

        findFewestCoins([5, 10], 94);
    }

    public function testChangeValueLessThanZero()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Cannot make change for negative value');

        findFewestCoins([1, 2, 5], -5);
    }
}
