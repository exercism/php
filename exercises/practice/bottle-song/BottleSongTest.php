<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class BottleSongTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'BottleSong.php';
    }

    /**
     * uuid: d4ccf8fc-01dc-48c0-a201-4fbeb30f2d03
     */
    #[TestDox('verse -> single verse -> first generic verse')]
    public function testVerseSingleVerseFirstGenericVerse(): void
    {
        $expected = "Ten green bottles hanging on the wall,\n" .
            "Ten green bottles hanging on the wall,\n" .
            "And if one green bottle should accidentally fall,\n" .
            "There'll be nine green bottles hanging on the wall.";
        $song = new BottleSong();
        $this->assertEquals($expected, $song->verse(10));
    }

    /**
     * uuid: 0f0aded3-472a-4c64-b842-18d4f1f5f030
     */
    #[TestDox('verse -> single verse -> last generic verse')]
    public function testVerseSingleVerseLastGenericVerse(): void
    {
        $expected = "Three green bottles hanging on the wall,\n" .
            "Three green bottles hanging on the wall,\n" .
            "And if one green bottle should accidentally fall,\n" .
            "There'll be two green bottles hanging on the wall.";
        $song = new BottleSong();
        $this->assertEquals($expected, $song->verse(3));
    }

    /**
     * uuid: f61f3c97-131f-459e-b40a-7428f3ed99d9
     */
    #[TestDox('verse -> single verse -> verse with 2 bottles')]
    public function testVerseSingleVerseVerseWithTwoBottles(): void
    {
        $expected = "Two green bottles hanging on the wall,\n" .
            "Two green bottles hanging on the wall,\n" .
            "And if one green bottle should accidentally fall,\n" .
            "There'll be one green bottle hanging on the wall.";
        $song = new BottleSong();
        $this->assertEquals($expected, $song->verse(2));
    }

    /**
     * uuid: 05eadba9-5dbd-401e-a7e8-d17cc9baa8e0
     */
    #[TestDox('verse -> single verse -> verse with 1 bottle')]
    public function testVerseSingleVerseVerseWithOneBottle(): void
    {
        $expected = "One green bottle hanging on the wall,\n" .
            "One green bottle hanging on the wall,\n" .
            "And if one green bottle should accidentally fall,\n" .
            "There'll be no green bottles hanging on the wall.";
        $song = new BottleSong();
        $this->assertEquals($expected, $song->verse(1));
    }

    /**
     * uuid: a4a28170-83d6-4dc1-bd8b-319b6abb6a80
     */
    #[TestDox('verses -> multiple verses -> first two verses')]
    public function testVersesMultipleVersesFirstTwoVerses(): void
    {
        $expected = "Ten green bottles hanging on the wall,\n" .
            "Ten green bottles hanging on the wall,\n" .
            "And if one green bottle should accidentally fall,\n" .
            "There'll be nine green bottles hanging on the wall.\n" .
            "\n" .
            "Nine green bottles hanging on the wall,\n" .
            "Nine green bottles hanging on the wall,\n" .
            "And if one green bottle should accidentally fall,\n" .
            "There'll be eight green bottles hanging on the wall.";
        $song = new BottleSong();
        $this->assertEquals($expected, $song->verses(10, 2));
    }

    /**
     * uuid: 3185d438-c5ac-4ce6-bcd3-02c9ff1ed8db
     */
    #[TestDox('verses -> multiple verses -> last three verses')]
    public function testVersesMultipleVersesLastThreeVerses(): void
    {
        $expected = "Three green bottles hanging on the wall,\n" .
            "Three green bottles hanging on the wall,\n" .
            "And if one green bottle should accidentally fall,\n" .
            "There'll be two green bottles hanging on the wall.\n" .
            "\n" .
            "Two green bottles hanging on the wall,\n" .
            "Two green bottles hanging on the wall,\n" .
            "And if one green bottle should accidentally fall,\n" .
            "There'll be one green bottle hanging on the wall.\n" .
            "\n" .
            "One green bottle hanging on the wall,\n" .
            "One green bottle hanging on the wall,\n" .
            "And if one green bottle should accidentally fall,\n" .
            "There'll be no green bottles hanging on the wall.";
        $song = new BottleSong();
        $this->assertEquals($expected, $song->verses(3, 3));
    }

    /**
     * uuid: 28c1584a-0e51-4b65-9ae2-fbc0bf4bbb28
     */
    #[TestDox('lyrics -> multiple verses -> all verses')]
    public function testLyricsMultipleVersesAllVerses(): void
    {
        $expected = <<<SONG
Ten green bottles hanging on the wall,
Ten green bottles hanging on the wall,
And if one green bottle should accidentally fall,
There'll be nine green bottles hanging on the wall.

Nine green bottles hanging on the wall,
Nine green bottles hanging on the wall,
And if one green bottle should accidentally fall,
There'll be eight green bottles hanging on the wall.

Eight green bottles hanging on the wall,
Eight green bottles hanging on the wall,
And if one green bottle should accidentally fall,
There'll be seven green bottles hanging on the wall.

Seven green bottles hanging on the wall,
Seven green bottles hanging on the wall,
And if one green bottle should accidentally fall,
There'll be six green bottles hanging on the wall.

Six green bottles hanging on the wall,
Six green bottles hanging on the wall,
And if one green bottle should accidentally fall,
There'll be five green bottles hanging on the wall.

Five green bottles hanging on the wall,
Five green bottles hanging on the wall,
And if one green bottle should accidentally fall,
There'll be four green bottles hanging on the wall.

Four green bottles hanging on the wall,
Four green bottles hanging on the wall,
And if one green bottle should accidentally fall,
There'll be three green bottles hanging on the wall.

Three green bottles hanging on the wall,
Three green bottles hanging on the wall,
And if one green bottle should accidentally fall,
There'll be two green bottles hanging on the wall.

Two green bottles hanging on the wall,
Two green bottles hanging on the wall,
And if one green bottle should accidentally fall,
There'll be one green bottle hanging on the wall.

One green bottle hanging on the wall,
One green bottle hanging on the wall,
And if one green bottle should accidentally fall,
There'll be no green bottles hanging on the wall.
SONG;
        $song = new BottleSong();
        $this->assertEquals($expected, $song->lyrics());
    }
}
