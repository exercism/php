<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class PokerTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Poker.php';
    }

    /**
     * uuid: 161f485e-39c2-4012-84cf-bec0c755b66c
     */
    #[TestDox('Single hand always wins')]
    public function testSingleHandAlwaysWins(): void
    {
        $hands = ['4S,5S,7H,8D,JC'];
        $game = new Poker($hands);

        $this->assertEquals(['4S,5S,7H,8D,JC'], $game->bestHands);
    }

    /**
     * uuid: 370ac23a-a00f-48a9-9965-6f3fb595cf45
     */
    #[TestDox('Highest card out of all hands wins')]
    public function testHighestCardOutOfAllHandsWins(): void
    {
        $hands = ['4D,5S,6S,8D,3C', '2S,4C,7S,9H,10H', '3S,4S,5D,6H,JH'];
        $game = new Poker($hands);

        $this->assertEquals(['3S,4S,5D,6H,JH'], $game->bestHands);
    }

    /**
     * uuid: d94ad5a7-17df-484b-9932-c64fc26cff52
     */
    #[TestDox('A tie has multiple winners')]
    public function testATieHasMultipleWinners(): void
    {
        $hands = ['4D,5S,6S,8D,3C', '2S,4C,7S,9H,10H', '3S,4S,5D,6H,JH', '3H,4H,5C,6C,JD'];
        $game = new Poker($hands);

        $this->assertEquals(['3S,4S,5D,6H,JH', '3H,4H,5C,6C,JD'], $game->bestHands);
    }

    /**
     * uuid: 61ed83a9-cfaa-40a5-942a-51f52f0a8725
     */
    #[TestDox('Multiple hands with the same high cards, tie compares next highest ranked, down to last card')]
    public function testMultipleHandsWithTheSameHighCardsTieComparesNextHighestRankedDownToLastCard(): void
    {
        $hands = ['3S,5H,6S,8D,7H', '2S,5D,6D,8C,7S'];
        $game = new Poker($hands);

        $this->assertEquals(['3S,5H,6S,8D,7H'], $game->bestHands);
    }

    /**
     * uuid: da01becd-f5b0-4342-b7f3-1318191d0580
     */
    #[TestDox('Winning high card hand also has the lowest card')]
    public function testWinningHighCardHandAlsoHasTheLowestCard(): void
    {
        $hands = ['2S,5H,6S,8D,7H', '3S,4D,6D,8C,7S'];
        $game = new Poker($hands);

        $this->assertEquals(['2S,5H,6S,8D,7H'], $game->bestHands);
    }

     /**
     * uuid: f7175a89-34ff-44de-b3d7-f6fd97d1fca4
     */
    #[TestDox('One pair beats high card')]
    public function testOnePairBeatsHighCard(): void
    {
        $hands = ['4S,5H,6C,8D,KH', '2S,4H,6S,4D,JH'];
        $game = new Poker($hands);

        $this->assertEquals(['2S,4H,6S,4D,JH'], $game->bestHands);
    }

    /**
     * uuid: e114fd41-a301-4111-a9e7-5a7f72a76561
     */
    #[TestDox('Highest pair wins')]
    public function testHighestPairWins(): void
    {
        $hands = ['4S,2H,6S,2D,JH', '2S,4H,6C,4D,JD'];
        $game = new Poker($hands);

        $this->assertEquals(['2S,4H,6C,4D,JD'], $game->bestHands);
    }

    /**
     * uuid: b3acd3a7-f9fa-4647-85ab-e0a9e07d1365
     */
    #[TestDox('Both hands have the same pair, high card wins')]
    public function testBothHandsHaveTheSamePairHighCardWins(): void
    {
        $hands = ['4H,4S,AH,JC,3D', '4C,4D,AS,5D,6C'];
        $game = new Poker($hands);

        $this->assertEquals(['4H,4S,AH,JC,3D'], $game->bestHands);
    }

    /**
     * uuid: 935bb4dc-a622-4400-97fa-86e7d06b1f76
     */
    #[TestDox('Two pairs beats one pair')]
    public function testTwoPairsBeatsOnePair(): void
    {
        $hands = ['2S,8H,6S,8D,JH', '4S,5H,4C,8C,5C'];
        $game = new Poker($hands);

        $this->assertEquals(['4S,5H,4C,8C,5C'], $game->bestHands);
    }

    /**
     * uuid: c8aeafe1-6e3d-4711-a6de-5161deca91fd
     */
    #[TestDox('Both hands have two pairs, highest ranked pair wins')]
    public function testBothHandsHaveTwoPairsHighestRankedPairWins(): void
    {
        $hands = ['2S,8H,2D,8D,3H', '4S,5H,4C,8S,5D'];
        $game = new Poker($hands);

        $this->assertEquals(['2S,8H,2D,8D,3H'], $game->bestHands);
    }

    /**
     * uuid: 88abe1ba-7ad7-40f3-847e-0a26f8e46a60
     */
    #[TestDox('Both hands have two pairs, with the same highest ranked pair, tie goes to low pair')]
    public function testBothHandsHaveTwoPairsWithTheSameHighestRankedPairTieGoesToLowPair(): void
    {
        $hands = ['2S,QS,2C,QD,JH', 'JD,QH,JS,8D,QC'];
        $game = new Poker($hands);

        $this->assertEquals(['JD,QH,JS,8D,QC'], $game->bestHands);
    }

    /**
     * uuid: 15a7a315-0577-47a3-9981-d6cf8e6f387b
     */
    #[TestDox('Both hands have two identically ranked pairs, tie goes to remaining card (kicker)')]
    public function testBothHandsHaveTwoIdenticallyRankedPairsTieGoesToRemainingCard(): void
    {
        $hands = ['JD,QH,JS,8D,QC', 'JS,QS,JC,2D,QD'];
        $game = new Poker($hands);

        $this->assertEquals(['JD,QH,JS,8D,QC'], $game->bestHands);
    }

    /**
     * uuid: f761e21b-2560-4774-a02a-b3e9366a51ce
     */
    #[TestDox('Both hands have two pairs that add to the same value, win goes to highest pair')]
    public function testBotHandsHaveTwoPairsThatAddToTheSameValueWinGoesToHighestPair()
    {
        $hands = ['6S,6H,3S,3H,AS', '7H,7S,2H,2S,AC'];
        $game = new Poker($hands);

        $this->assertEquals(['7H,7S,2H,2S,AC'], $game->bestHands);
    }

    /**
     * uuid: fc6277ac-94ac-4078-8d39-9d441bc7a79e
     */
    #[TestDox('Two pairs first ranked by largest pair')]
    public function testTwoPairsFirstRankedByLargestPair()
    {
        $hands = ["5C,2S,5S,4H,4C", "6S,2S,6H,7C,2C"];
        $game = new Poker($hands);

        $this->assertEquals(["6S,2S,6H,7C,2C"], $game->bestHands);
    }

    /**
     * uuid: 21e9f1e6-2d72-49a1-a930-228e5e0195dc
     */
    #[TestDox('Three of a kind beats two pair')]
    public function testThreeOfAKindBeatsTwoPair(): void
    {
        $hands = ['2S,8H,2H,8D,JH', '4S,5H,4C,8S,4H'];
        $game = new Poker($hands);

        $this->assertEquals(['4S,5H,4C,8S,4H'], $game->bestHands);
    }

    /**
     * uuid: c2fffd1f-c287-480f-bf2d-9628e63bbcc3
     */
    #[TestDox('Both hands have three of a kind, tie goes to highest ranked triplet')]
    public function testBothHandsHaveThreeOfAKindTieGoesToHighestRankedTriplet(): void
    {
        $hands = ['2S,2H,2C,8D,JH', '4S,AH,AS,8C,AD'];
        $game = new Poker($hands);

        $this->assertEquals(['4S,AH,AS,8C,AD'], $game->bestHands);
    }

    /**
     * Ensure that high cards are checked in the correct order (high to low).
     *
     * uuid: 26a4a7d4-34a2-4f18-90b4-4a8dd35d2bb1
     */
    #[TestDox('With multiple decks, two players can have same three of a kind, ties go to highest remaining cards')]
    public function testWithMultipleDecksTwoPlayersCanHaveSameThreeOfAKindTiesGoToHighestRemainingCards(): void
    {
        $hands = ['5S,AH,AS,7C,AD', '4S,AH,AS,8C,AD'];
        $game = new Poker($hands);

        $this->assertEquals(['4S,AH,AS,8C,AD'], $game->bestHands);
    }

    /**
     * uuid: a858c5d9-2f28-48e7-9980-b7fa04060a60
     */
    #[TestDox('A straight beats three of a kind')]
    public function testStraightBeatsThreeOfAKind(): void
    {
        $hands = ['4S,5H,4C,8D,4H', '3S,4D,2S,6D,5C'];
        $game = new Poker($hands);

        $this->assertEquals(['3S,4D,2S,6D,5C'], $game->bestHands);
    }

    /**
     * uuid: 73c9c756-e63e-4b01-a88d-0d4491a7a0e3
     */
    #[TestDox('Aces can end a straight (10 J Q K A)')]
    public function testAcesCanEndAStraight(): void
    {
        $hands = ['4S,5H,4C,8D,4H', '10D,JH,QS,KD,AC'];
        $game = new Poker($hands);

        $this->assertEquals(['10D,JH,QS,KD,AC'], $game->bestHands);
    }

    /**
     * uuid: 76856b0d-35cd-49ce-a492-fe5db53abc02
     */
    #[TestDox('Aces can start a straight (A 2 3 4 5)')]
    public function testAcesCanStartAStraight(): void
    {
        $hands = ['4S,5H,4C,8D,4H', '4D,AH,3S,2D,5C'];
        $game = new Poker($hands);

        $this->assertEquals(['4D,AH,3S,2D,5C'], $game->bestHands);
    }

    /**
     * uuid: e214b7df-dcba-45d3-a2e5-342d8c46c286
     */
    #[TestDox('Aces cannot be in the middle of a straight (Q K A 2 3)')]
    public function testAcesCannotBeInTheMiddleOfAStraight(): void
    {
        $hands = ['2C,3D,7H,5H,2S', 'QS,KH,AC,2D,3S'];
        $game = new Poker($hands);

        $this->assertEquals(['2C,3D,7H,5H,2S'], $game->bestHands);
    }

    /**
     * uuid: 6980c612-bbff-4914-b17a-b044e4e69ea1
     */
    #[TestDox('Both hands with a straight, tie goes to highest ranked card')]
    public function testBothHandsWithAStraightTieGoesToHighestRankedCard(): void
    {
        $hands = ['4S,6C,7S,8D,5H', '5S,7H,8S,9D,6H'];
        $game = new Poker($hands);

        $this->assertEquals(['5S,7H,8S,9D,6H'], $game->bestHands);
    }

    /**
     * uuid: 5135675c-c2fc-4e21-9ba3-af77a32e9ba4
     */
    #[TestDox('Even though an ace is usually high, a 5-high straight is the lowest-scoring straight')]
    public function testEvenThoughAnAceIsUsuallyHighAFiveHighStraightIsTheLowestScoringStraight(): void
    {
        $hands = ['2H,3C,4D,5D,6H', '4S,AH,3S,2D,5H'];
        $game = new Poker($hands);

        $this->assertEquals(['2H,3C,4D,5D,6H'], $game->bestHands);
    }

    /**
     * uuid: c601b5e6-e1df-4ade-b444-b60ce13b2571
     */
    #[TestDox('Flush beats a straight')]
    public function testFlushBeatsAStraight(): void
    {
        $hands = ['4C,6H,7D,8D,5H', '2S,4S,5S,6S,7S'];
        $game = new Poker($hands);

        $this->assertEquals(['2S,4S,5S,6S,7S'], $game->bestHands);
    }

    /**
     * Ensure that high cards are checked in the correct order (high to low).
     *
     * uuid: e04137c5-c19a-4dfc-97a1-9dfe9baaa2ff
     */
    #[TestDox('Both hands have a flush, tie goes to high card, down to the last one if necessary')]
    public function testBothHandsHaveAFlushTieGoesToHighCardDownToTheLastOneIfNecessary(): void
    {
        $hands = ['2H,7H,8H,9H,6H', '3S,5S,6S,7S,8S'];
        $game = new Poker($hands);

        $this->assertEquals(['2H,7H,8H,9H,6H'], $game->bestHands);
    }

    /**
     * uuid: 3a19361d-8974-455c-82e5-f7152f5dba7c
     */
    #[TestDox('Full house beats a flush')]
    public function testFullHouseBeatsAFlush(): void
    {
        $hands = ['3H,6H,7H,8H,5H', '4S,5H,4C,5D,4H'];
        $game = new Poker($hands);

        $this->assertEquals(['4S,5H,4C,5D,4H'], $game->bestHands);
    }

    /**
     * uuid: eb73d0e6-b66c-4f0f-b8ba-bf96bc0a67f0
     */
    #[TestDox('Both hands have a full house, tie goes to highest-ranked triplet')]
    public function testBothHandsHaveAFullHouseTieGoesToHighestRankedTriplet(): void
    {
        $hands = ['4H,4S,4D,9S,9D', '5H,5S,5D,8S,8D'];
        $game = new Poker($hands);

        $this->assertEquals(['5H,5S,5D,8S,8D'], $game->bestHands);
    }

    /**
     * uuid: e34b51168-1e43-4c0d-9b32-e356159b4d5d
     */
    #[TestDox('With multiple decks, both hands have a full house with the same triplet, tie goes to the pair')]
    public function testWithMultipleDecksBothHandsHaveAFullHouseWithTheSameTripletTieGoesToThePair(): void
    {
        $hands = ['5H,5S,5D,9S,9D', '5H,5S,5D,8S,8D'];
        $game = new Poker($hands);

        $this->assertEquals(['5H,5S,5D,9S,9D'], $game->bestHands);
    }

    /**
     * uuid: d61e9e99-883b-4f99-b021-18f0ae50c5f4
     */
    #[TestDox('Four of a kind beats a full house')]
    public function testFourOfAKindBeatsAFullHouse(): void
    {
        $hands = ['4S,5H,4D,5D,4H', '3S,3H,2S,3D,3C'];
        $game = new Poker($hands);

        $this->assertEquals(['3S,3H,2S,3D,3C'], $game->bestHands);
    }

    /**
     * uuid: 2e1c8c63-e0cb-4214-a01b-91954490d2fe
     */
    #[TestDox('Both hands have four of a kind, tie goes to high quad')]
    public function testBothHandsHaveFourOfAKindTieGoesToHighQuad(): void
    {
        $hands = ['2S,2H,2C,8D,2D', '4S,5H,5S,5D,5C'];
        $game = new Poker($hands);

        $this->assertEquals(['4S,5H,5S,5D,5C'], $game->bestHands);
    }

    /**
     * uuid: 892ca75d-5474-495d-9f64-a6ce2dcdb7e1
     */
    #[TestDox('With multiple decks, both hands with identical four of a kind, tie determined by kicker')]
    public function testWithMultipleDecksBothHandsWithIdenticalFourOfAKindTieDeterminedByKicker(): void
    {
        $hands = ['3S,3H,2S,3D,3C', '3S,3H,4S,3D,3C'];
        $game = new Poker($hands);

        $this->assertEquals(['3S,3H,4S,3D,3C'], $game->bestHands);
    }

    /**
     * uuid: 923bd910-dc7b-4f7d-a330-8b42ec10a3ac
     */
    #[TestDox('Straight flush beats four of a kind')]
    public function testStraightFlushBeatsFourOfAKind(): void
    {
        $hands = ['4S,5H,5S,5D,5C', '7S,8S,9S,6S,10S'];
        $game = new Poker($hands);

        $this->assertEquals(['7S,8S,9S,6S,10S'], $game->bestHands);
    }

    /**
     * uuid: d9629e22-c943-460b-a951-2134d1b43346
     */
    #[TestDox('Aces can end a straight flush (10 J Q K A)')]
    public function testAcesCanEndAStraightFlush(): void
    {
        $hands = ['KC,AH,AS,AD,AC', '10C,JC,QC,KC,AC'];
        $game = new Poker($hands);

        $this->assertEquals(['10C,JC,QC,KC,AC'], $game->bestHands);
    }

    /**
     * uuid: 05d5ede9-64a5-4678-b8ae-cf4c595dc824
     */
    #[TestDox('Aces can start a straight flush (A 2 3 4 5)')]
    public function testAcesCanStartAStraightFlush(): void
    {
        $hands = ['KS,AH,AS,AD,AC', '4H,AH,3H,2H,5H'];
        $game = new Poker($hands);

        $this->assertEquals(['4H,AH,3H,2H,5H'], $game->bestHands);
    }

    /**
     * uuid: ad655466-6d04-49e8-a50c-0043c3ac18ff
     */
    #[TestDox('Aces cannot be in the middle of a straight flush (Q K A 2 3)')]
    public function testAcesCannotBeInTheMiddleOfAStraightFlush(): void
    {
        $hands = ['2C,AC,QC,10C,KC', 'QH,KH,AH,2H,3H'];
        $game = new Poker($hands);

        $this->assertEquals(['2C,AC,QC,10C,KC'], $game->bestHands);
    }

    /**
     * uuid: d0927f70-5aec-43db-aed8-1cbd1b6ee9ad
     */
    #[TestDox('Both hands have a straight flush, tie goes to highest-ranked card')]
    public function testBothHandsHaveAStraightFlushTieGoesToHighestRankedCard(): void
    {
        $hands = ['4H,6H,7H,8H,5H', '5S,7S,8S,9S,6S'];
        $game = new Poker($hands);

        $this->assertEquals(['5S,7S,8S,9S,6S'], $game->bestHands);
    }

    /**
     * uuid: be620e09-0397-497b-ac37-d1d7a4464cfc
     */
    #[TestDox('Even though an ace is usually high, a 5-high straight flush is the lowest-scoring straight flush')]
    public function tesEvenThoughAnAceIsUsuallyHighAFivehighStraightFlushIsTheLowestScoringStraightFlush(): void
    {
        $hands = ['2H,3H,4H,5H,6H', '4D,AD,3D,2D,5D'];
        $game = new Poker($hands);

        $this->assertEquals(['2H,3H,4H,5H,6H'], $game->bestHands);
    }
}
