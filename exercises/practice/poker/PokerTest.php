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

class PokerTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Poker.php';
    }

    public function testSingleHandAlwaysWins(): void
    {
        $hands = ['4S,5S,7H,8D,JC'];
        $game = new Poker($hands);

        $this->assertEquals(['4S,5S,7H,8D,JC'], $game->bestHands);
    }

    public function testHighestCardOutOfAllHandsWins(): void
    {
        $hands = ['4D,5S,6S,8D,3C', '2S,4C,7S,9H,10H', '3S,4S,5D,6H,JH'];
        $game = new Poker($hands);

        $this->assertEquals(['3S,4S,5D,6H,JH'], $game->bestHands);
    }

    public function testHighCardTiesHaveMultipleWinners(): void
    {
        $hands = ['4D,5S,6S,8D,3C', '2S,4C,7S,9H,10H', '3S,4S,5D,6H,JH', '3H,4H,5C,6C,JD'];
        $game = new Poker($hands);

        $this->assertEquals(['3S,4S,5D,6H,JH', '3H,4H,5C,6C,JD'], $game->bestHands);
    }

    public function testMultipleHandsWithSameHighCardsNextHighestCardWins(): void
    {
        $hands = ['3S,5H,6S,8D,7H', '2S,5D,6D,8C,7S'];
        $game = new Poker($hands);

        $this->assertEquals(['3S,5H,6S,8D,7H'], $game->bestHands);
    }

    public function testOnePairBeatsHighCard(): void
    {
        $hands = ['4S,5H,6C,8D,KH', '2S,4H,6S,4D,JH'];
        $game = new Poker($hands);

        $this->assertEquals(['2S,4H,6S,4D,JH'], $game->bestHands);
    }

    public function testHighestPairWins(): void
    {
        $hands = ['4S,2H,6S,2D,JH', '2S,4H,6C,4D,JD'];
        $game = new Poker($hands);

        $this->assertEquals(['2S,4H,6C,4D,JD'], $game->bestHands);
    }

    public function testTwoPairsThatAddToTheSameValue()
    {
        $hands = ['6S,6H,3S,3H,AS', '7H,7S,2H,2S,AC'];
        $game = new Poker($hands);

        $this->assertEquals(['7H,7S,2H,2S,AC'], $game->bestHands);
    }

    public function testTwoPairsWhereLowerHandHasHigherTotal()
    {
        $hands = ["5C,2S,5S,4H,4C", "6S,2S,6H,7C,2C"];
        $game = new Poker($hands);

        $this->assertEquals(["6S,2S,6H,7C,2C"], $game->bestHands);
    }

    public function testTwoPairBeatsOnePair(): void
    {
        $hands = ['2S,8H,6S,8D,JH', '4S,5H,4C,8C,5C'];
        $game = new Poker($hands);

        $this->assertEquals(['4S,5H,4C,8C,5C'], $game->bestHands);
    }

    public function testHighestTwoPairWins(): void
    {
        $hands = ['2S,8H,2D,8D,3H', '4S,5H,4C,8S,5D'];
        $game = new Poker($hands);

        $this->assertEquals(['2S,8H,2D,8D,3H'], $game->bestHands);
    }

    public function testSameHighPairForTwoPairHigherSecondPairWins(): void
    {
        $hands = ['2S,QS,2C,QD,JH', 'JD,QH,JS,8D,QC'];
        $game = new Poker($hands);

        $this->assertEquals(['JD,QH,JS,8D,QC'], $game->bestHands);
    }

    public function testSameTwoPairsForTwoPairHighCardWins(): void
    {
        $hands = ['JD,QH,JS,8D,QC', 'JS,QS,JC,2D,QD'];
        $game = new Poker($hands);

        $this->assertEquals(['JD,QH,JS,8D,QC'], $game->bestHands);
    }

    public function testThreeOfAKindBeatsTwoPair(): void
    {
        $hands = ['2S,8H,2H,8D,JH', '4S,5H,4C,8S,4H'];
        $game = new Poker($hands);

        $this->assertEquals(['4S,5H,4C,8S,4H'], $game->bestHands);
    }

    public function testHighestThreeOfAKindWins(): void
    {
        $hands = ['2S,2H,2C,8D,JH', '4S,AH,AS,8C,AD'];
        $game = new Poker($hands);

        $this->assertEquals(['4S,AH,AS,8C,AD'], $game->bestHands);
    }

    public function testSameThreeOfAKindHighCardsWin(): void
    {
        $hands = ['4S,AH,AS,7C,AD', '4S,AH,AS,8C,AD'];
        $game = new Poker($hands);

        $this->assertEquals(['4S,AH,AS,8C,AD'], $game->bestHands);
    }

    public function testStraightBeatsThreeOfAKind(): void
    {
        $hands = ['4S,5H,4C,8D,4H', '3S,4D,2S,6D,5C'];
        $game = new Poker($hands);

        $this->assertEquals(['3S,4D,2S,6D,5C'], $game->bestHands);
    }

    public function testAcesCanBeHighCardForAStraight(): void
    {
        $hands = ['4S,5H,4C,8D,4H', '10D,JH,QS,KD,AC'];
        $game = new Poker($hands);

        $this->assertEquals(['10D,JH,QS,KD,AC'], $game->bestHands);
    }

    public function testAcesCanBeLowCardForAStraight(): void
    {
        $hands = ['4S,5H,4C,8D,4H', '4D,AH,3S,2D,5C'];
        $game = new Poker($hands);

        $this->assertEquals(['4D,AH,3S,2D,5C'], $game->bestHands);
    }

    public function testHigherStraightWins(): void
    {
        $hands = ['4S,6C,7S,8D,5H', '5S,7H,8S,9D,6H'];
        $game = new Poker($hands);

        $this->assertEquals(['5S,7H,8S,9D,6H'], $game->bestHands);
    }

    public function testFlushBeatsAStraight(): void
    {
        $hands = ['4C,6H,7D,8D,5H', '2S,4S,5S,6S,7S'];
        $game = new Poker($hands);

        $this->assertEquals(['2S,4S,5S,6S,7S'], $game->bestHands);
    }

    public function testHighestFlushWins(): void
    {
        $hands = ['4H,7H,8H,9H,6H', '2S,4S,5S,6S,7S'];
        $game = new Poker($hands);

        $this->assertEquals(['4H,7H,8H,9H,6H'], $game->bestHands);
    }

    public function testFullHouseBeatsAFlush(): void
    {
        $hands = ['3H,6H,7H,8H,5H', '4S,5H,4C,5D,4H'];
        $game = new Poker($hands);

        $this->assertEquals(['4S,5H,4C,5D,4H'], $game->bestHands);
    }

    public function testHigherTripletFullHouseWins(): void
    {
        $hands = ['4H,4S,4D,9S,9D', '5H,5S,5D,8S,8D'];
        $game = new Poker($hands);

        $this->assertEquals(['5H,5S,5D,8S,8D'], $game->bestHands);
    }

    public function testSameTripleFullHouseHighPairWins(): void
    {
        $hands = ['5H,5S,5D,9S,9D', '5H,5S,5D,8S,8D'];
        $game = new Poker($hands);

        $this->assertEquals(['5H,5S,5D,9S,9D'], $game->bestHands);
    }

    public function testFourOfAKindBeatsAFullHouse(): void
    {
        $hands = ['4S,5H,4D,5D,4H', '3S,3H,2S,3D,3C'];
        $game = new Poker($hands);

        $this->assertEquals(['3S,3H,2S,3D,3C'], $game->bestHands);
    }

    public function testHigherFourOfAKindWins(): void
    {
        $hands = ['2S,2H,2C,8D,2D', '4S,5H,5S,5D,5C'];
        $game = new Poker($hands);

        $this->assertEquals(['4S,5H,5S,5D,5C'], $game->bestHands);
    }

    public function testSameFourOfAKindHighCardWins(): void
    {
        $hands = ['3S,3H,2S,3D,3C', '3S,3H,4S,3D,3C'];
        $game = new Poker($hands);

        $this->assertEquals(['3S,3H,4S,3D,3C'], $game->bestHands);
    }

    public function testStraightFlushBeatsFourOfAKind(): void
    {
        $hands = ['4S,5H,5S,5D,5C', '7S,8S,9S,6S,10S'];
        $game = new Poker($hands);

        $this->assertEquals(['7S,8S,9S,6S,10S'], $game->bestHands);
    }

    public function testHigherStraightFlushWins(): void
    {
        $hands = ['4H,6H,7H,8H,5H', '5S,7S,8S,9S,6S'];
        $game = new Poker($hands);

        $this->assertEquals(['5S,7S,8S,9S,6S'], $game->bestHands);
    }
}
