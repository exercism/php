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

class YachtTest extends PHPUnit\Framework\TestCase
{
    private Yacht $yacht;

    public static function setUpBeforeClass(): void
    {
        require_once 'Yacht.php';
    }

    public function setUp(): void
    {
        $this->yacht = new Yacht();
    }

    public function testScoreYacht(): void
    {
        $this->assertEquals(50, $this->yacht->score([5, 5, 5, 5, 5], 'yacht'));
    }

    public function testScoreNotYacht(): void
    {
        $this->assertEquals(0, $this->yacht->score([1, 3, 3, 2, 5], 'yacht'));
    }

    public function testScoreOnes(): void
    {
        $this->assertEquals(3, $this->yacht->score([1, 1, 1, 3, 5], 'ones'));
    }

    public function testScoreOnesOutOfOrders(): void
    {
        $this->assertEquals(3, $this->yacht->score([3, 1, 1, 5, 1], 'ones'));
    }

    public function testScoreNoOnes(): void
    {
        $this->assertEquals(0, $this->yacht->score([4, 3, 6, 5, 5], 'ones'));
    }

    public function testScoreTwos(): void
    {
        $this->assertEquals(2, $this->yacht->score([2, 3, 4, 5, 6], 'twos'));
    }

    public function testScoreFours(): void
    {
        $this->assertEquals(8, $this->yacht->score([1, 4, 1, 4, 1], 'fours'));
    }

    public function testScoreYachtAsThrees(): void
    {
        $this->assertEquals(15, $this->yacht->score([3, 3, 3, 3, 3], 'threes'));
    }

    public function testScoreYachtThreesCountedAsFives(): void
    {
        $this->assertEquals(0, $this->yacht->score([3, 3, 3, 3, 3], 'fives'));
    }

    public function testScoreFives(): void
    {
        $this->assertEquals(10, $this->yacht->score([1, 5, 3, 5, 3], 'fives'));
    }

    public function testScoreSixes(): void
    {
        $this->assertEquals(6, $this->yacht->score([2, 3, 4, 5, 6], 'sixes'));
    }

    public function testScoreFullHouseThreeLargeNumbers(): void
    {
        $this->assertEquals(16, $this->yacht->score([2, 2, 4, 4, 4], 'full house'));
    }

    public function testScoreFullHouseThreeSmallNumbers(): void
    {
        $this->assertEquals(19, $this->yacht->score([5, 3, 3, 5, 3], 'full house'));
    }

    public function testScoreTwoPairNotFullHouse(): void
    {
        $this->assertEquals(0, $this->yacht->score([2, 2, 4, 4, 5], 'full house'));
    }

    public function testScoreFourOfAKindNotFullHouse(): void
    {
        $this->assertEquals(0, $this->yacht->score([1, 4, 4, 4, 4], 'full house'));
    }

    public function testScoreYachtNotFullHouse(): void
    {
        $this->assertEquals(0, $this->yacht->score([2, 2, 2, 2, 2], 'full house'));
    }

    public function testScoreFourOfAKind(): void
    {
        $this->assertEquals(24, $this->yacht->score([6, 6, 4, 6, 6], 'four of a kind'));
    }

    public function testScoreYachtAsFourOfAKind(): void
    {
        $this->assertEquals(12, $this->yacht->score([3, 3, 3, 3, 3], 'four of a kind'));
    }

    public function testScoreFullHouseNotFourOfAKind(): void
    {
        $this->assertEquals(0, $this->yacht->score([3, 3, 3, 5, 5], 'four of a kind'));
    }

    public function testScoreLittleStraight(): void
    {
        $this->assertEquals(30, $this->yacht->score([3, 5, 4, 1, 2], 'little straight'));
    }

    public function testScoreLittleStraightAsBigStraight(): void
    {
        $this->assertEquals(0, $this->yacht->score([1, 2, 3, 4, 5], 'big straight'));
    }

    public function testScoreFourInOrderNotStraight(): void
    {
        $this->assertEquals(0, $this->yacht->score([1, 1, 2, 3, 4], 'little straight'));
    }

    public function testScoreNoPairsNoLittleStraight(): void
    {
        $this->assertEquals(0, $this->yacht->score([1, 2, 3, 4, 6], 'little straight'));
    }

    public function testScoreMinOneMaxFiveNotLittleStraight(): void
    {
        $this->assertEquals(0, $this->yacht->score([1, 1, 3, 4, 5], 'little straight'));
    }

    public function testScoreBigStraight(): void
    {
        $this->assertEquals(30, $this->yacht->score([4, 6, 2, 5, 3], 'big straight'));
    }

    public function testScoreBigStraightAsLittleStraight(): void
    {
        $this->assertEquals(0, $this->yacht->score([6, 5, 4, 3, 2], 'little straight'));
    }

    public function testScoreNoPairsNoBigStraight(): void
    {
        $this->assertEquals(0, $this->yacht->score([6, 5, 4, 3, 1], 'big straight'));
    }

    public function testScoreChoice(): void
    {
        $this->assertEquals(23, $this->yacht->score([3, 3, 5, 6, 6], 'choice'));
    }

    public function testScoreYachtAsChoice(): void
    {
        $this->assertEquals(10, $this->yacht->score([2, 2, 2, 2, 2], 'choice'));
    }
}
