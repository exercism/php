<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class HouseTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'House.php';
    }

    /**
     * uuid: 28a540ff-f765-4348-9d57-ae33f25f41f2
     */
    #[TestDox('Verse one - the house that jack built')]
    public function testVerseOneTheHouseThatJackBuilt(): void
    {
        $house = new House();
        $lyrics = ['This is the house that Jack built.'];
        $this->assertEquals($lyrics, $house->verse(1));
    }

    /**
     * uuid: ebc825ac-6e2b-4a5e-9afd-95732191c8da
     */
    #[TestDox('Verse two - the malt that lay')]
    public function testVerseTwoTheMaltThatLay(): void
    {
        $house = new House();
        $lyrics = [
            'This is the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $house->verse(2));
    }

    /**
     * uuid: 1ed8bb0f-edb8-4bd1-b6d4-b64754fe4a60
     */
    #[TestDox('Verse three - the rat that ate')]
    public function testVerseThreeTheRatThatAte(): void
    {
        $house = new House();
        $lyrics = [
            'This is the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $house->verse(3));
    }

    /**
     * uuid: 64b0954e-8b7d-4d14-aad0-d3f6ce297a30
     */
    #[TestDox('Verse four - the cat that killed')]
    public function testVerseFourTheCatThatKilled(): void
    {
        $house = new House();
        $lyrics = [
            'This is the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $house->verse(4));
    }

    /**
     * uuid: 1e8d56bc-fe31-424d-9084-61e6111d2c82
     */
    #[TestDox('Verse five - the dog that worried')]
    public function testVerseFiveTheDogThatWorried(): void
    {
        $house = new House();
        $lyrics = [
            'This is the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $house->verse(5));
    }

    /**
     * uuid: 6312dc6f-ab0a-40c9-8a55-8d4e582beac4
     */
    #[TestDox('Verse six - the cow with the crumpled horn')]
    public function testVerseSixTheCowWithTheCrumpledHorn(): void
    {
        $house = new House();
        $lyrics = [
            'This is the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $house->verse(6));
    }

    /**
     * uuid: 68f76d18-6e19-4692-819c-5ff6a7f92feb
     */
    #[TestDox('Verse seven - the maiden all forlorn')]
    public function testVerseSevenTheMaidenAllForlorn(): void
    {
        $house = new House();
        $lyrics = [
            'This is the maiden all forlorn',
            'that milked the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $house->verse(7));
    }

    /**
     * uuid: 73872564-2004-4071-b51d-2e4326096747
     */
    #[TestDox('Verse eight - the man all tattered and torn')]
    public function testVerseEightTheManAllTatteredAndTorn(): void
    {
        $house = new House();
        $lyrics = [
            'This is the man all tattered and torn',
            'that kissed the maiden all forlorn',
            'that milked the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $house->verse(8));
    }

    /**
     * uuid: 0d53d743-66cb-4351-a173-82702f3338c9
     */
    #[TestDox('Verse nine - the priest all shaven and shorn')]
    public function testVerseNineThePriestAllShavenAndShorn(): void
    {
        $house = new House();
        $lyrics = [
            'This is the priest all shaven and shorn',
            'that married the man all tattered and torn',
            'that kissed the maiden all forlorn',
            'that milked the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $house->verse(9));
    }

    /**
     * uuid: 452f24dc-8fd7-4a82-be1a-3b4839cfeb41
     */
    #[TestDox('Verse ten - the rooster that crowed in the morn')]
    public function testVerseTenTheRoosterThatCrowedInTheMorn(): void
    {
        $house = new House();
        $lyrics = [
            'This is the rooster that crowed in the morn',
            'that woke the priest all shaven and shorn',
            'that married the man all tattered and torn',
            'that kissed the maiden all forlorn',
            'that milked the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $house->verse(10));
    }

    /**
     * uuid: 97176f20-2dd3-4646-ac72-cffced91ea26
     */
    #[TestDox('Verse eleven - the farmer sowing his corn')]
    public function testVerseElevenTheFarmerSowingHisCorn(): void
    {
        $house = new House();
        $lyrics = [
            'This is the farmer sowing his corn',
            'that kept the rooster that crowed in the morn',
            'that woke the priest all shaven and shorn',
            'that married the man all tattered and torn',
            'that kissed the maiden all forlorn',
            'that milked the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $house->verse(11));
    }

    /**
     * uuid: 09824c29-6aad-4dcd-ac98-f61374a6a8b7
     */
    #[TestDox('Verse twelve - the horse and the hound and the horn')]
    public function testVerseTwelveTheHorseAndTheHoundAndTheHorn(): void
    {
        $house = new House();
        $lyrics = [
            'This is the horse and the hound and the horn',
            'that belonged to the farmer sowing his corn',
            'that kept the rooster that crowed in the morn',
            'that woke the priest all shaven and shorn',
            'that married the man all tattered and torn',
            'that kissed the maiden all forlorn',
            'that milked the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $house->verse(12));
    }

    /**
     * uuid: d2b980d3-7851-49e1-97ab-1524515ec200
     */
    #[TestDox('Multiple verses')]
    public function testMultipleVerses(): void
    {
        $house = new House();
        $startVerse = 4;
        $endVerse = 8;
        $lyrics = [
            'This is the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
            '',
            'This is the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
            '',
            'This is the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
            '',
            'This is the maiden all forlorn',
            'that milked the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
            '',
            'This is the man all tattered and torn',
            'that kissed the maiden all forlorn',
            'that milked the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $house->verses($startVerse, $endVerse));
    }

    /**
     * uuid: 0311d1d0-e085-4f23-8ae7-92406fb3e803
     */
    #[TestDox('Full rhyme')]
    public function testFullRhyme(): void
    {
        $house = new House();
        $startVerse = 1;
        $endVerse = 12;
        $lyrics = [
            'This is the house that Jack built.',
            '',
            'This is the malt',
            'that lay in the house that Jack built.',
            '',
            'This is the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
            '',
            'This is the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
            '',
            'This is the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
            '',
            'This is the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
            '',
            'This is the maiden all forlorn',
            'that milked the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
            '',
            'This is the man all tattered and torn',
            'that kissed the maiden all forlorn',
            'that milked the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
            '',
            'This is the priest all shaven and shorn',
            'that married the man all tattered and torn',
            'that kissed the maiden all forlorn',
            'that milked the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
            '',
            'This is the rooster that crowed in the morn',
            'that woke the priest all shaven and shorn',
            'that married the man all tattered and torn',
            'that kissed the maiden all forlorn',
            'that milked the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
            '',
            'This is the farmer sowing his corn',
            'that kept the rooster that crowed in the morn',
            'that woke the priest all shaven and shorn',
            'that married the man all tattered and torn',
            'that kissed the maiden all forlorn',
            'that milked the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
            '',
            'This is the horse and the hound and the horn',
            'that belonged to the farmer sowing his corn',
            'that kept the rooster that crowed in the morn',
            'that woke the priest all shaven and shorn',
            'that married the man all tattered and torn',
            'that kissed the maiden all forlorn',
            'that milked the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $house->verses($startVerse, $endVerse));
    }
}
