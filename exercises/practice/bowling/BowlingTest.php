<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

/**
 * Translated from original source:
 * https://butunclebob.com/ArticleS.UncleBob.TheBowlingGameKata
 */
class BowlingTest extends TestCase
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

    /**
     * uuid 656ae006-25c2-438c-a549-f338e7ec7441
     */
    #[TestDox('should be able to score a game with all zeros')]
    public function testShouldBeAbleToScoreAGameWithAllZeros(): void
    {
        $this->rollMany(20, 0);

        $this->assertEquals(0, $this->game->score());
    }

    /**
     * uuid f85dcc56-cd6b-4875-81b3-e50921e3597b
     */
    #[TestDox('should be able to score a game with no strikes or spares')]
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

    /**
     * uuid d1f56305-3ac2-4fe0-8645-0b37e3073e20
     */
    #[TestDox('a spare followed by zeros is worth ten points')]
    public function testASpareFollowedByZerosIsWorthTenPoints(): void
    {
        $this->game->roll(6);
        $this->game->roll(4);
        $this->rollMany(18, 0);

        $this->assertEquals(10, $this->game->score());
    }

    /**
     * uuid 0b8c8bb7-764a-4287-801a-f9e9012f8be4
     */
    #[TestDox('points scored in the roll after a spare are counted twice')]
    public function testPointsScoredInTheRollAfterASpareAreCountedTwice(): void
    {
        $this->game->roll(6);
        $this->game->roll(4);
        $this->game->roll(3);
        $this->rollMany(17, 0);

        $this->assertEquals(16, $this->game->score());
    }

    /**
     * uuid 4d54d502-1565-4691-84cd-f29a09c65bea
     */
    #[TestDox('consecutive spares each get a one roll bonus')]
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

    /**
     * uuid e5c9cf3d-abbe-4b74-ad48-34051b2b08c0
     */
    #[TestDox('a spare in the last frame gets a one roll bonus that is counted once')]
    public function testASpareInTheLastFrameGetsAOneRollBonusThatIsCountedOnce(): void
    {
        $this->rollMany(18, 0);
        $this->game->roll(7);
        $this->game->roll(3);
        $this->game->roll(7);

        $this->assertEquals(17, $this->game->score());
    }

    /**
     * uuid 75269642-2b34-4b72-95a4-9be28ab16902
     */
    #[TestDox('a strike earns ten points in a frame with a single roll')]
    public function testAStrikeEarnsTenPointsInFrameWithASingleRoll(): void
    {
        $this->game->roll(10);
        $this->rollMany(18, 0);

        $this->assertEquals(10, $this->game->score());
    }

    /**
     * uuid 037f978c-5d01-4e49-bdeb-9e20a2e6f9a6
     */
    #[TestDox('points scored in the two rolls after a strike are counted twice as a bonus')]
    public function testPointsScoredInTheTwoRollsAfterAStrikeAreCountedTwiceAsABonus(): void
    {
        $this->game->roll(10);
        $this->game->roll(5);
        $this->game->roll(3);
        $this->rollMany(16, 0);

        $this->assertEquals(26, $this->game->score());
    }

    /**
     * uuid 1635e82b-14ec-4cd1-bce4-4ea14bd13a49
     */
    #[TestDox('consecutive strikes each get the two roll bonus')]
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

    /**
     * uuid e483e8b6-cb4b-4959-b310-e3982030d766
     */
    #[TestDox('a strike in the last frame gets a two roll bonus that is counted once')]
    public function testAStrikeInTheLastFrameGetsATwoRollBonusThatIsCountedOnce(): void
    {
        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(7);
        $this->game->roll(1);

        $this->assertEquals(18, $this->game->score());
    }

    /**
     * uuid 9d5c87db-84bc-4e01-8e95-53350c8af1f8
     */
    #[TestDox('rolling a spare with the two roll bonus does not get a bonus roll')]
    public function testAStrikeWithTheOneRollBonusAfterASpareInTheLastFrameDoesNotGetABonus(): void
    {
        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(7);
        $this->game->roll(3);

        $this->assertEquals(20, $this->game->score());
    }

    /**
     * uuid 576faac1-7cff-4029-ad72-c16bcada79b5
     */
    #[TestDox('strikes with the two roll bonus do not get bonus rolls')]
    public function testRollingASpareWithTheTwoRollBonusDoesNotGetABonusRoll(): void
    {
        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(10);

        $this->assertEquals(30, $this->game->score());
    }

    /**
     * uuid efb426ec-7e15-42e6-9b96-b4fca3ec2359
     */
    #[TestDox('last two strikes followed by only last bonus with non strike points')]
    public function testLastTwoStrikesFollowedByOnlyLastBonusWithNonStrikePoints(): void
    {
        $this->rollMany(16, 0);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(0);
        $this->game->roll(1);

        $this->assertEquals(31, $this->game->score());
    }

    /**
     * uuid 72e24404-b6c6-46af-b188-875514c0377b
     */
    #[TestDox('a strike with the one roll bonus after a spare in the last frame does not get a bonus')]
    public function testStrikesWithTheTwoRollBonusDoNotGetBonusRolls(): void
    {
        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(7);
        $this->game->roll(3);

        $this->assertEquals(20, $this->game->score());
    }

    /**
     * uuid 62ee4c72-8ee8-4250-b794-234f1fec17b1
     */
    #[TestDox('all strikes is a perfect gam')]
    public function testAllStrikesIsAPerfectGame(): void
    {
        $this->rollMany(12, 10);

        $this->assertEquals(300, $this->game->score());
    }

    /**
     * uuid 1245216b-19c6-422c-b34b-6e4012d7459f
     */
    #[TestDox('rolls cannot score negative points')]
    public function testRollsCanNotScoreNegativePoints(): void
    {
        $this->expectException(Exception::class);

        $this->game->roll(-1);
    }

    /**
     * uuid 5fcbd206-782c-4faa-8f3a-be5c538ba841
     */
    #[TestDox('a roll cannot score more than 10 points')]
    public function testARollCanNotScoreMoreThan10Points(): void
    {
        $this->expectException(Exception::class);
        $this->game->roll(11);
        $this->rollMany(19, 0);

        $this->game->score();
    }

    /**
     * uuid fb023c31-d842-422d-ad7e-79ce1db23c21
     */
    #[TestDox('two rolls in a frame cannot score more than 10 points')]
    public function testTwoRollsInAFrameCanNotScoreMoreThan10Points(): void
    {
        $this->expectException(Exception::class);
        $this->game->roll(5);
        $this->game->roll(6);
        $this->rollMany(18, 0);

        $this->game->score();
    }

    /**
     * uuid 6082d689-d677-4214-80d7-99940189381b
     */
    #[TestDox('bonus roll after a strike in the last frame cannot score more than 10 points')]
    public function testBonusRollsAfterAStrikeInTheLastFrameCanNotScoreMoreThan10Points(): void
    {
        $this->expectException(Exception::class);

        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(11);

        $this->game->score();
    }


    /**
     * uuid e9565fe6-510a-4675-ba6b-733a56767a45
     */
    #[TestDox('two bonus rolls after a strike in the last frame cannot score more than 10 points')]
    public function testTwoBonusRollsAfterAStrikeInTheLastFrameCanNotScoreMoreThan10Points(): void
    {
        $this->expectException(Exception::class);

        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(5);
        $this->game->roll(6);

        $this->game->score();
    }

    /**
     * uuid 2f6acf99-448e-4282-8103-0b9c7df99c3d
     */
    #[TestDox('two bonus rolls after a strike in the last frame can score more than 10 points if one is a strike')]
    public function testTwoBonusRollsAfterAStrikeInTheLastFramCanScoreMoreThan10PointsIfOneIsAStrike(): void
    {
        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(6);

        $this->assertEquals(26, $this->game->score());
    }

    /**
     * uuid 6380495a-8bc4-4cdb-a59f-5f0212dbed01
     */
    #[TestDox('the second bonus rolls after a strike in the last frame cannot be a strike if the first one is not a strike')]
    public function testTheSecondBonusRollsAfterAStrikeInTheLastFrameCannotBeAStrikeIfTheFirstOneIsNotAStrike(): void
    {
        $this->expectException(Exception::class);
        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(6);
        $this->game->roll(10);

        $this->game->score();
    }

    /**
     * uuid 2b2976ea-446c-47a3-9817-42777f09fe7e
     */
    #[TestDox('second bonus roll after a strike in the last frame cannot score more than 10 points')]
    public function testSecondBonusRollAfterAStrikeInTheLastFrameCannotScoreMoreThan10Points(): void
    {
        $this->expectException(Exception::class);
        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(10);
        $this->game->roll(11);

        $this->game->score();
    }

    /**
     * uuid 29220245-ac8d-463d-bc19-98a94cfada8a
     */
    #[TestDox('an unstarted game cannot be scored')]
    public function testAnUnstartedGameCanNotBeScored(): void
    {
        $this->expectException(Exception::class);

        $this->game->score();
    }

    /**
     * uuid 4473dc5d-1f86-486f-bf79-426a52ddc955
     */
    #[TestDox('an incomplete game cannot be scored')]
    public function testAnIncompleteGameCanNotBeScored(): void
    {
        $this->expectException(Exception::class);
        $this->game->roll(0);
        $this->game->roll(0);

        $this->game->score();
    }

    /**
     * uuid 2ccb8980-1b37-4988-b7d1-e5701c317df3
     */
    #[TestDox('cannot roll if game already has ten frames')]
    public function testCannotRollIfGameAlreadyHasTenFrames(): void
    {
        $this->expectException(Exception::class);
        $this->rollMany(20, 0);
        $this->game->roll(0);

        $this->game->score();
    }

    /**
     * uuid 4864f09b-9df3-4b65-9924-c595ed236f1b
     */
    #[TestDox('bonus rolls for a strike in the last frame must be rolled before score can be calculated')]
    public function testBonusRollsForAStrikeInTheLastFrameMustBeRolledBeforeScoreCanBeCalculated(): void
    {
        $this->expectException(Exception::class);
        $this->rollMany(18, 0);
        $this->game->roll(10);

        $this->game->score();
    }

    /**
     * uuid 537f4e37-4b51-4d1c-97e2-986eb37b2ac1
     */
    #[TestDox('both bonus rolls for a strike in the last frame must be rolled before score can be calculated')]
    public function testBothBonusRollsForAStrikeInTheLastFrameMustBeRolledBeforeScoreCanBeCalculated(): void
    {
        $this->expectException(Exception::class);
        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(10);

        $this->game->score();
    }

    /**
     * uuid 8134e8c1-4201-4197-bf9f-1431afcde4b9
     */
    #[TestDox('bonus roll for a spare in the last frame must be rolled before score can be calculated')]
    public function testBonusRollForASpareInTheLastFrameMustBeRolledBeforeScoreCanBeCalculated(): void
    {
        $this->expectException(Exception::class);
        $this->rollMany(18, 0);
        $this->game->roll(7);
        $this->game->roll(3);

        $this->game->score();
    }

    /**
     * uuid 9d4a9a55-134a-4bad-bae8-3babf84bd570
     */
    #[TestDox('cannot roll after bonus roll for spare')]
    public function testCannotRollAfterBonusRollForSpare(): void
    {
        $this->expectException(Exception::class);
        $this->rollMany(18, 0);
        $this->game->roll(7);
        $this->game->roll(3);
        $this->game->roll(2);
        $this->game->roll(2);

        $this->game->score();
    }

    /**
     * uuid d3e02652-a799-4ae3-b53b-68582cc604be
     */
    #[TestDox('cannot roll after bonus rolls for strike')]
    public function testCannotRollAfterBonusRollsForStrike(): void
    {
        $this->expectException(Exception::class);
        $this->rollMany(18, 0);
        $this->game->roll(10);
        $this->game->roll(3);
        $this->game->roll(2);
        $this->game->roll(2);

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
