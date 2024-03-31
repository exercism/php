<?php

declare(strict_types=1);

class HouseTest extends PHPUnit\Framework\TestCase
{
    private House $house;

    public static function setUpBeforeClass(): void
    {
        require_once 'House.php';
    }

    protected function setUp(): void
    {
        $this->house = new House();
    }

    /**
     * uuid: 28a540ff-f765-4348-9d57-ae33f25f41f2
     */
    public function testVerseOne(): void
    {
        $lyrics = ['This is the house that Jack built.'];
        $this->assertEquals($lyrics, $this->house->verse(1));
    }

    /**
     * uuid: ebc825ac-6e2b-4a5e-9afd-95732191c8da
     */
    public function testVerseTwo(): void
    {
        $lyrics = [
            'This is the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $this->house->verse(2));
    }

    /**
     * uuid: 1ed8bb0f-edb8-4bd1-b6d4-b64754fe4a60
     */
    public function testVerseThree(): void
    {
        $lyrics = [
            'This is the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $this->house->verse(3));
    }

    /**
     * uuid: 64b0954e-8b7d-4d14-aad0-d3f6ce297a30
     */
    public function testVerseFour(): void
    {
        $lyrics = [
            'This is the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $this->house->verse(4));
    }

    /**
     * uuid: 1e8d56bc-fe31-424d-9084-61e6111d2c82
     */
    public function testVerseFive(): void
    {
        $lyrics = [
            'This is the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $this->house->verse(5));
    }

    /**
     * uuid: 6312dc6f-ab0a-40c9-8a55-8d4e582beac4
     */
    public function testVerseSix(): void
    {
        $lyrics = [
            'This is the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $this->house->verse(6));
    }

    /**
     * uuid: 68f76d18-6e19-4692-819c-5ff6a7f92feb
     */
    public function testVerseSeven(): void
    {
        $lyrics = [
            'This is the maiden all forlorn',
            'that milked the cow with the crumpled horn',
            'that tossed the dog',
            'that worried the cat',
            'that killed the rat',
            'that ate the malt',
            'that lay in the house that Jack built.',
        ];
        $this->assertEquals($lyrics, $this->house->verse(7));
    }

    /**
     * uuid: 73872564-2004-4071-b51d-2e4326096747
     */
    public function testVerseEight(): void
    {
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
        $this->assertEquals($lyrics, $this->house->verse(8));
    }

    /**
     * uuid: 0d53d743-66cb-4351-a173-82702f3338c9
     */
    public function testVerseNine(): void
    {
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
        $this->assertEquals($lyrics, $this->house->verse(9));
    }

    /**
     * uuid: 452f24dc-8fd7-4a82-be1a-3b4839cfeb41
     */
    public function testVerseTen(): void
    {
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
        $this->assertEquals($lyrics, $this->house->verse(10));
    }

    /**
     * uuid: 97176f20-2dd3-4646-ac72-cffced91ea26
     */
    public function testVerseEleven(): void
    {
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
        $this->assertEquals($lyrics, $this->house->verse(11));
    }

    /**
     * uuid: 09824c29-6aad-4dcd-ac98-f61374a6a8b7
     */
    public function testVerseTwelve(): void
    {
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
        $this->assertEquals($lyrics, $this->house->verse(12));
    }

    /**
     * uuid: d2b980d3-7851-49e1-97ab-1524515ec200
     */
    public function testMultipleVerses(): void
    {
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
        $this->assertEquals($lyrics, $this->house->verses($startVerse, $endVerse));
    }

    /**
     * uuid: 0311d1d0-e085-4f23-8ae7-92406fb3e803
     */
    public function testFullRhyme(): void
    {
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
        $this->assertEquals($lyrics, $this->house->verses($startVerse, $endVerse));
    }
}
