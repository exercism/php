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

/**
 * Translated from original source:
 * https://butunclebob.com/ArticleS.UncleBob.TheBowlingGameKata
 */
class BowlingTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Bowling.php';
    }

    /** @var Game */
    private $game;

    public function setUp(): void
    {
        $this->game = new Game();
    }

    public function testShouldBeAbleToScoreAGameWithAllZeros(): void
    {
        $this->rollMany(20, 0);

        $this->assertEquals(0, $this->game->score());
    }

    public function testShouldBeAbleToScoreAGameWithNoStrikesOrSpares(): void
    {
        $this->game->roll(3);
        $this->game->roll(6);
        $this->game->roll(3);
        $this->game->roll(6);
        $this->game->roll(3);
        $this->game->roll(6);
        $this->game->roll(3);
        $this->game->roll(6);
        $this->game->roll(3);
        $this->game->roll(6);
        $this->game->roll(3);
        $this->game->roll(6);
        $this->game->roll(3);
        $this->game->roll(6);
        $this->game->roll(3);
        $this->game->roll(6);
        $this->game->roll(3);
        $this->game->roll(6);
        $this->game->roll(3);
        $this->game->roll(6);

        $this->assertEquals(90, $this->game->score());
    }

    public function testASpareFollowedByZerosIsWorthTenPoints(): void
    {
        $this->game->roll(6);
        $this->game->roll(4);
        $this->rollMany(18, 0);

        $this->assertEquals(10, $this->game->score());
    }

    public function testPointsScoredInTheRollAfterASpareAreCountedTwice(): void
    {
        $this->game->roll(6);
        $this->game->roll(4);
        $this->game->roll(3);
        $this->rollMany(17, 0);

        $this->assertEquals(16, $this->game->score());
    }

    public function testConsecutiveSparesEachGetAOneRollBonus(): void
    {
        $this->game->roll(5);
        $this->game->roll(5);
        $this->game->roll(3);
        $this->game->roll(7);
        $this->game->roll(4);
        $this->rollMany(15, 0);

        $this->assertEquals(31, $this->game->score());
    }

    public function testASpareInTheLastFrameGetsAOneRollBonusThatIsCountedOnce(): void
    {
        $this->rollMany(18, 0);
        $this->game->roll(7);
        $this->game->roll(3);
        $this->game->roll(7);

        $this->assertEquals(17, $this->game->score());
    }

    public function testAStrikeEarnsTenPointsInFrameWithASingleRoll(): void
    {
        $this->game->roll(10);
        $this->rollMany(18, 0);

        $this->assertEquals(10, $this->game->score());
    }

    public function testPointsScoredInTheTwoRollsAfterAStrikeAreCountedTwiceAsABonus(): void
    {
        $this->game->roll(10);
        $this->game->roll(5);
        $this->game->roll(3);
        $this->rollMany(16, 0);

        $this->assertEquals(26, $this->game->score());
    }

    public function testConsecutiveStrikesEachGetTheTwoRollBonus(): void
    {
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(5);
        $this->game->roll(3);
        $this->rollMany(12, 0);

        $this->assertEquals(81, $this->game->score());
    }

    public function testAStrikeInTheLastFrameGetsATwoRollBonusThatIsCountedOnce(): void
    {
        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(7);
        $this->game->roll(1);

        $this->assertEquals(18, $this->game->score());
    }

    public function testRollingASpareWithTheTwoRollBonusDoesNotGetABonusRoll(): void
    {
        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);

        $this->assertEquals(30, $this->game->score());
    }

    public function testAStrikeWithTheOneRollBonusAfterASpareInTheLastFrameDoesNotGetABonus(): void
    {
        $this->rollMany(18, 0);
        $this->game->roll(7);
        $this->game->roll(3);
        $this->game->roll(10);

        $this->assertEquals(20, $this->game->score());
    }

    public function testStrikesWithTheTwoRollBonusDoNotGetBonusRolls(): void
    {
        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(7);
        $this->game->roll(3);

        $this->assertEquals(20, $this->game->score());
    }

    public function testAllStrikesIsAPerfectGame(): void
    {
        $this->rollMany(12, 10);

        $this->assertEquals(300, $this->game->score());
    }

    public function testRollsCanNotScoreNegativePoints(): void
    {
        $this->expectException(Exception::class);

        $this->game->roll(-1);
    }

    public function testARollCanNotScoreMoreThan10Points(): void
    {
        $this->expectException(Exception::class);
        $this->game->roll(11);
        $this->rollMany(19, 0);

        $this->game->score();
    }

    public function testTwoRollsInAFrameCanNotScoreMoreThan10Points(): void
    {
        $this->expectException(Exception::class);
        $this->game->roll(5);
        $this->game->roll(6);
        $this->rollMany(18, 0);

        $this->game->score();
    }

    public function testTwoBonusRollsAfterAStrikeInTheLastFrameCanNotScoreMoreThan10Points(): void
    {
        $this->expectException(Exception::class);

        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(5);
        $this->game->roll(6);

        $this->game->score();
    }

    public function testAnUnstartedGameCanNotBeScored(): void
    {
        $this->expectException(Exception::class);

        $this->game->score();
    }

    public function testAnIncompleteGameCanNotBeScored(): void
    {
        $this->expectException(Exception::class);
        $this->game->roll(0);
        $this->game->roll(0);

        $this->game->score();
    }

    public function testAGameWithMoreThanTenFramesCanNotBeScored(): void
    {
        $this->expectException(Exception::class);
        $this->rollMany(21, 0);

        $this->game->score();
    }

    public function testBonusRollsForAStrikeInTheLastFrameMustBeRolledBeforeScoreCanBeCalculated(): void
    {
        $this->expectException(Exception::class);
        $this->rollMany(18, 0);
        $this->game->roll(10);

        $this->game->score();
    }

    public function testBothBonusRollsForAStrikeInTheLastFrameMustBeRolledBeforeScoreCanBeCalculated(): void
    {
        $this->expectException(Exception::class);
        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(10);

        $this->game->score();
    }

    public function testBonusRollForASpareInTheLastFrameMustBeRolledBeforeScoreCanBeCalculated(): void
    {
        $this->expectException(Exception::class);
        $this->rollMany(18, 0);
        $this->game->roll(7);
        $this->game->roll(3);

        $this->game->score();
    }

    private function rollStrike(): void
    {
        $this->game->roll(10);
    }

    private function rollSpare(): void
    {
        $this->rollMany(2, 5);
    }

    private function rollMany($n, $pins): void
    {
        for ($i = 0; $i < $n; $i++) {
            $this->game->roll($pins);
        }
    }
}
