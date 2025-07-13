<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class ChangeTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Change.php';
    }

    /**
     * uuid d0ebd0e1-9d27-4609-a654-df5c0ba1d83a
     */
    #[TestDox('change for 1 cent')]
    public function testChangeForOneCent(): void
    {
        $this->assertEquals([1], findFewestCoins([1, 5, 10, 25], 1));
    }

    /**
     * uuid 36887bea-7f92-4a9c-b0cc-c0e886b3ecc8
     */
    #[TestDox('single coin change')]
    public function testSingleCoinChange(): void
    {
        $this->assertEquals([25], findFewestCoins([1, 5, 10, 25, 100], 25));
    }

    /**
     * uuid cef21ccc-0811-4e6e-af44-f011e7eab6c6
     */
    #[TestDox('multiple coin change')]
    public function testMultipleCoinChange(): void
    {
        $this->assertEquals([5, 10], findFewestCoins([1, 5, 10, 25, 100], 15));
    }

    /**
     * uuid d60952bc-0c1a-4571-bf0c-41be72690cb3
     */
    #[TestDox('change with Lilliputian Coins')]
    public function testChangeWithLilliputianCoins(): void
    {
        $this->assertEquals([4, 4, 15], findFewestCoins([1, 4, 15, 20, 50], 23));
    }

    /**
     * uuid 408390b9-fafa-4bb9-b608-ffe6036edb6c
     */
    #[TestDox('change with Lower Elbonia Coins')]
    public function testChangeWithLowerElboniaCoins(): void
    {
        $this->assertEquals([21, 21, 21], findFewestCoins([1, 5, 10, 21, 25], 63));
    }

    /**
     * uuid 7421a4cb-1c48-4bf9-99c7-7f049689132f
     */
    #[TestDox('large target values')]
    public function testWithLargeTargetValue(): void
    {
        $this->assertEquals(
            [2, 2, 5, 20, 20, 50, 100, 100, 100, 100, 100, 100, 100, 100, 100],
            findFewestCoins([1, 2, 5, 10, 20, 50, 100], 999)
        );
    }

    /**
     * uuid f79d2e9b-0ae3-4d6a-bb58-dc978b0dba28
     */
    #[TestDox('possible change without unit coins available')]
    public function testPossibleChangeWithoutUnitCoinsAvailable(): void
    {
        $this->assertEquals(
            [2, 2, 2, 5, 10],
            findFewestCoins([2, 5, 10, 20, 50], 21)
        );
    }

    /**
     * uuid 9a166411-d35d-4f7f-a007-6724ac266178
     */
    #[TestDox('another possible change without unit coins available')]
    public function testAnotherPossibleChangeWithoutUnitCoinsAvailable(): void
    {
        $this->assertEquals(
            [4, 4, 4, 5, 5, 5],
            findFewestCoins([4, 5], 27)
        );
    }

    /**
     * uuid ce0f80d5-51c3-469d-818c-3e69dbd25f75
     */
    #[TestDox('a greedy approach is not optimal')]
    public function testAGreedyApproachIsNotOptimal(): void
    {
        $this->assertEquals([10, 10], findFewestCoins([1, 10, 11], 20));
    }

    /**
     * uuid bbbcc154-e9e9-4209-a4db-dd6d81ec26bb
     */
    #[TestDox('no coins make 0 change')]
    public function testNoCoinsForZero(): void
    {
        $this->assertEquals([], findFewestCoins([1, 5, 10, 21, 25], 0));
    }

    /**
     * uuid c8b81d5a-49bd-4b61-af73-8ee5383a2ce1
     */
    #[TestDox('error testing for change smaller than the smallest of coins')]
    public function testForChangeSmallerThanAvailableCoins(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('No coins small enough to make change');

        findFewestCoins([5, 10], 3);
    }

    /**
     * uuid 3c43e3e4-63f9-46ac-9476-a67516e98f68
     */
    #[TestDox('error if no combination can add up to target')]
    public function testErrorIfNoCombinationCanAddUpToTarget(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('No combination can add up to target');

        findFewestCoins([5, 10], 94);
    }

    /**
     * uuid 8fe1f076-9b2d-4f44-89fe-8a6ccd63c8f3
     */
    #[TestDox('cannot find negative change values')]
    public function testChangeValueLessThanZero(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Cannot make change for negative value');

        findFewestCoins([1, 2, 5], -5);
    }
}
