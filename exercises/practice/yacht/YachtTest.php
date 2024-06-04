<?php

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

    /**
     * uuid 3060e4a5-4063-4deb-a380-a630b43a84b6
     * @testdox Yacht
     */
    public function testScoreYacht(): void
    {
        $this->assertEquals(50, $this->yacht->score([5, 5, 5, 5, 5], 'yacht'));
    }

    /**
     * uuid 15026df2-f567-482f-b4d5-5297d57769d9
     * @testdox Not Yacht
     */
    public function testScoreNotYacht(): void
    {
        $this->assertEquals(0, $this->yacht->score([1, 3, 3, 2, 5], 'yacht'));
    }

    /**
     * uuid 36b6af0c-ca06-4666-97de-5d31213957a4
     * @testdox Ones
     */
    public function testScoreOnes(): void
    {
        $this->assertEquals(3, $this->yacht->score([1, 1, 1, 3, 5], 'ones'));
    }

    /**
     * uuid 023a07c8-6c6e-44d0-bc17-efc5e1b8205a
     * @testdox Ones, out of order
     */
    public function testScoreOnesOutOfOrders(): void
    {
        $this->assertEquals(3, $this->yacht->score([3, 1, 1, 5, 1], 'ones'));
    }

    /**
     * uuid 7189afac-cccd-4a74-8182-1cb1f374e496
     * @testdox No ones
     */
    public function testScoreNoOnes(): void
    {
        $this->assertEquals(0, $this->yacht->score([4, 3, 6, 5, 5], 'ones'));
    }

    /**
     * uuid 793c4292-dd14-49c4-9707-6d9c56cee725
     * @testdox Twos
     */
    public function testScoreTwos(): void
    {
        $this->assertEquals(2, $this->yacht->score([2, 3, 4, 5, 6], 'twos'));
    }

    /**
     * uuid dc41bceb-d0c5-4634-a734-c01b4233a0c6
     * @testdox Fours
     */
    public function testScoreFours(): void
    {
        $this->assertEquals(8, $this->yacht->score([1, 4, 1, 4, 1], 'fours'));
    }

    /**
     * uuid f6125417-5c8a-4bca-bc5b-b4b76d0d28c8
     * @testdox Yacht counted as threes
     */
    public function testScoreYachtAsThrees(): void
    {
        $this->assertEquals(15, $this->yacht->score([3, 3, 3, 3, 3], 'threes'));
    }

    /**
     * uuid 464fc809-96ed-46e4-acb8-d44e302e9726
     * @testdox Yacht of 3s counted as fives
     */
    public function testScoreYachtThreesCountedAsFives(): void
    {
        $this->assertEquals(0, $this->yacht->score([3, 3, 3, 3, 3], 'fives'));
    }

    /**
     * uuid d054227f-3a71-4565-a684-5c7e621ec1e9
     * @testdox Fives
     */
    public function testScoreFives(): void
    {
        $this->assertEquals(10, $this->yacht->score([1, 5, 3, 5, 3], 'fives'));
    }

    /**
     * uuid e8a036e0-9d21-443a-8b5f-e15a9e19a761
     * @testdox Sixes
     */
    public function testScoreSixes(): void
    {
        $this->assertEquals(6, $this->yacht->score([2, 3, 4, 5, 6], 'sixes'));
    }

    /**
     * uuid 51cb26db-6b24-49af-a9ff-12f53b252eea
     * @testdox Full house two small, three big
     */
    public function testScoreFullHouseThreeLargeNumbers(): void
    {
        $this->assertEquals(16, $this->yacht->score([2, 2, 4, 4, 4], 'full house'));
    }

    /**
     * uuid 1822ca9d-f235-4447-b430-2e8cfc448f0c
     * @testdox Full house three small, two big
     */
    public function testScoreFullHouseThreeSmallNumbers(): void
    {
        $this->assertEquals(19, $this->yacht->score([5, 3, 3, 5, 3], 'full house'));
    }

    /**
     * uuid b208a3fc-db2e-4363-a936-9e9a71e69c07
     * @testdox Two pair is not a full house
     */
    public function testScoreTwoPairNotFullHouse(): void
    {
        $this->assertEquals(0, $this->yacht->score([2, 2, 4, 4, 5], 'full house'));
    }

    /**
     * uuid b90209c3-5956-445b-8a0b-0ac8b906b1c2
     * @testdox Four of a kind is not a full house
     */
    public function testScoreFourOfAKindNotFullHouse(): void
    {
        $this->assertEquals(0, $this->yacht->score([1, 4, 4, 4, 4], 'full house'));
    }

    /**
     * uuid 32a3f4ee-9142-4edf-ba70-6c0f96eb4b0c
     * @testdox Yacht is not a full house
     */
    public function testScoreYachtNotFullHouse(): void
    {
        $this->assertEquals(0, $this->yacht->score([2, 2, 2, 2, 2], 'full house'));
    }

    /**
     * uuid b286084d-0568-4460-844a-ba79d71d79c6
     * @testdox Four of a Kind
     */
    public function testScoreFourOfAKind(): void
    {
        $this->assertEquals(24, $this->yacht->score([6, 6, 4, 6, 6], 'four of a kind'));
    }

    /**
     * uuid f25c0c90-5397-4732-9779-b1e9b5f612ca
     * @testdox Yacht can be scored as Four of a Kind
     */
    public function testScoreYachtAsFourOfAKind(): void
    {
        $this->assertEquals(12, $this->yacht->score([3, 3, 3, 3, 3], 'four of a kind'));
    }

    /**
     * uuid 9f8ef4f0-72bb-401a-a871-cbad39c9cb08
     * @testdox Full house is not Four of a Kind
     */
    public function testScoreFullHouseNotFourOfAKind(): void
    {
        $this->assertEquals(0, $this->yacht->score([3, 3, 3, 5, 5], 'four of a kind'));
    }

    /**
     * uuid b4743c82-1eb8-4a65-98f7-33ad126905cd
     * @testdox Little Straight
     */
    public function testScoreLittleStraight(): void
    {
        $this->assertEquals(30, $this->yacht->score([3, 5, 4, 1, 2], 'little straight'));
    }

    /**
     * uuid 7ac08422-41bf-459c-8187-a38a12d080bc
     * @testdox Little Straight as Big Straight
     */
    public function testScoreLittleStraightAsBigStraight(): void
    {
        $this->assertEquals(0, $this->yacht->score([1, 2, 3, 4, 5], 'big straight'));
    }

    /**
     * uuid 97bde8f7-9058-43ea-9de7-0bc3ed6d3002
     * @testdox Four in order but not a little straight
     */
    public function testScoreFourInOrderNotStraight(): void
    {
        $this->assertEquals(0, $this->yacht->score([1, 1, 2, 3, 4], 'little straight'));
    }

    /**
     * uuid cef35ff9-9c5e-4fd2-ae95-6e4af5e95a99
     * @testdox No pairs but not a little straight
     */
    public function testScoreNoPairsNoLittleStraight(): void
    {
        $this->assertEquals(0, $this->yacht->score([1, 2, 3, 4, 6], 'little straight'));
    }

    /**
     * uuid fd785ad2-c060-4e45-81c6-ea2bbb781b9d
     * @testdox Minimum is 1, maximum is 5, but not a little straight
     */
    public function testScoreMinOneMaxFiveNotLittleStraight(): void
    {
        $this->assertEquals(0, $this->yacht->score([1, 1, 3, 4, 5], 'little straight'));
    }

    /**
     * uuid 35bd74a6-5cf6-431a-97a3-4f713663f467
     * @testdox Big Straight
     */
    public function testScoreBigStraight(): void
    {
        $this->assertEquals(30, $this->yacht->score([4, 6, 2, 5, 3], 'big straight'));
    }

    /**
     * uuid 87c67e1e-3e87-4f3a-a9b1-62927822b250
     * @testdox Big Straight as little straight
     */
    public function testScoreBigStraightAsLittleStraight(): void
    {
        $this->assertEquals(0, $this->yacht->score([6, 5, 4, 3, 2], 'little straight'));
    }

    /**
     * uuid c1fa0a3a-40ba-4153-a42d-32bc34d2521e
     * @testdox No pairs but not a big straight
     */
    public function testScoreNoPairsNoBigStraight(): void
    {
        $this->assertEquals(0, $this->yacht->score([6, 5, 4, 3, 1], 'big straight'));
    }

    /**
     * uuid 207e7300-5d10-43e5-afdd-213e3ac8827d
     * @testdox Choice
     */
    public function testScoreChoice(): void
    {
        $this->assertEquals(23, $this->yacht->score([3, 3, 5, 6, 6], 'choice'));
    }

    /**
     * uuid b524c0cf-32d2-4b40-8fb3-be3500f3f135
     * @testdox Yacht as choice
     */
    public function testScoreYachtAsChoice(): void
    {
        $this->assertEquals(10, $this->yacht->score([2, 2, 2, 2, 2], 'choice'));
    }
}
