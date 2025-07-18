<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class FoodChainTest extends TestCase
{
    private FoodChain $foodChain;

    public static function setUpBeforeClass(): void
    {
        require_once 'FoodChain.php';
    }

    /**
     * uuid: 751dce68-9412-496e-b6e8-855998c56166
     */
    #[TestDox('fly')]
    public function testFly(): void
    {
        $foodChain = new FoodChain();
        $expected = [
            "I know an old lady who swallowed a fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die."
        ];
        $this->assertEquals($expected, $foodChain->verse(1));
    }

    /**
     * uuid: 6c56f861-0c5e-4907-9a9d-b2efae389379
     */
    #[TestDox('spider')]
    public function testSpider(): void
    {
        $foodChain = new FoodChain();
        $expected = [
            "I know an old lady who swallowed a spider.",
            "It wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die."
        ];
        $this->assertEquals($expected, $foodChain->verse(2));
    }

    /**
     * uuid: 3edf5f33-bef1-4e39-ae67-ca5eb79203fa
     */
    #[TestDox('bird')]
    public function testBird(): void
    {
        $foodChain = new FoodChain();
        $expected = [
            "I know an old lady who swallowed a bird.",
            "How absurd to swallow a bird!",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die."
        ];
        $this->assertEquals($expected, $foodChain->verse(3));
    }

    /**
     * uuid: e866a758-e1ff-400e-9f35-f27f28cc288f
     */
    #[TestDox('cat')]
    public function testCat(): void
    {
        $foodChain = new FoodChain();
        $expected = [
            "I know an old lady who swallowed a cat.",
            "Imagine that, to swallow a cat!",
            "She swallowed the cat to catch the bird.",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die."
        ];
        $this->assertEquals($expected, $foodChain->verse(4));
    }

    /**
     * uuid: 3f02c30e-496b-4b2a-8491-bc7e2953cafb
     */
    #[TestDox('dog')]
    public function testDog(): void
    {
        $foodChain = new FoodChain();
        $expected = [
            "I know an old lady who swallowed a dog.",
            "What a hog, to swallow a dog!",
            "She swallowed the dog to catch the cat.",
            "She swallowed the cat to catch the bird.",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die."
        ];
        $this->assertEquals($expected, $foodChain->verse(5));
    }

    /**
     * uuid: 4b3fd221-01ea-46e0-825b-5734634fbc59
     */
    #[TestDox('goat')]
    public function testGoat(): void
    {
        $foodChain = new FoodChain();
        $expected = [
            "I know an old lady who swallowed a goat.",
            "Just opened her throat and swallowed a goat!",
            "She swallowed the goat to catch the dog.",
            "She swallowed the dog to catch the cat.",
            "She swallowed the cat to catch the bird.",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die."
        ];
        $this->assertEquals($expected, $foodChain->verse(6));
    }

    /**
     * uuid: 1b707da9-7001-4fac-941f-22ad9c7a65d4
     */
    #[TestDox('cow')]
    public function testCow(): void
    {
        $foodChain = new FoodChain();
        $expected = [
            "I know an old lady who swallowed a cow.",
            "I don't know how she swallowed a cow!",
            "She swallowed the cow to catch the goat.",
            "She swallowed the goat to catch the dog.",
            "She swallowed the dog to catch the cat.",
            "She swallowed the cat to catch the bird.",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die."
        ];
        $this->assertEquals($expected, $foodChain->verse(7));
    }

    /**
     * uuid: 3cb10d46-ae4e-4d2c-9296-83c9ffc04cdc
     */
    #[TestDox('horse')]
    public function testHorse(): void
    {
        $foodChain = new FoodChain();
        $expected = [
            "I know an old lady who swallowed a horse.",
            "She's dead, of course!"
        ];
        $this->assertEquals($expected, $foodChain->verse(8));
    }

    /**
     * uuid: 22b863d5-17e4-4d1e-93e4-617329a5c050
     */
    #[TestDox('multiple verses')]
    public function testMultipleVerses(): void
    {
        $foodChain = new FoodChain();
        $expected = [
            "I know an old lady who swallowed a fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die.",
            "",
            "I know an old lady who swallowed a spider.",
            "It wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die.",
            "",
            "I know an old lady who swallowed a bird.",
            "How absurd to swallow a bird!",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die."
        ];
        $this->assertEquals($expected, $foodChain->verses(1, 3));
    }
    /**
     * uuid: e626b32b-745c-4101-bcbd-3b13456893db
     */
    #[TestDox('full song')]
    public function testFullSong(): void
    {
        $foodChain = new FoodChain();
        $expected = [
            "I know an old lady who swallowed a fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die.",
            "",
            "I know an old lady who swallowed a spider.",
            "It wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die.",
            "",
            "I know an old lady who swallowed a bird.",
            "How absurd to swallow a bird!",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die.",
            "",
            "I know an old lady who swallowed a cat.",
            "Imagine that, to swallow a cat!",
            "She swallowed the cat to catch the bird.",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die.",
            "",
            "I know an old lady who swallowed a dog.",
            "What a hog, to swallow a dog!",
            "She swallowed the dog to catch the cat.",
            "She swallowed the cat to catch the bird.",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die.",
            "",
            "I know an old lady who swallowed a goat.",
            "Just opened her throat and swallowed a goat!",
            "She swallowed the goat to catch the dog.",
            "She swallowed the dog to catch the cat.",
            "She swallowed the cat to catch the bird.",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die.",
            "",
            "I know an old lady who swallowed a cow.",
            "I don't know how she swallowed a cow!",
            "She swallowed the cow to catch the goat.",
            "She swallowed the goat to catch the dog.",
            "She swallowed the dog to catch the cat.",
            "She swallowed the cat to catch the bird.",
            "She swallowed the bird to catch the spider that wriggled and jiggled and tickled inside her.",
            "She swallowed the spider to catch the fly.",
            "I don't know why she swallowed the fly. Perhaps she'll die.",
            "",
            "I know an old lady who swallowed a horse.",
            "She's dead, of course!"
        ];
        $this->assertEquals($expected, $foodChain->song());
    }
}
