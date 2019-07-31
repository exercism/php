<?php

/**
 * Calculate the value of scrabble score for a given word.
 */
class ScrabbleScoreTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'scrabble-score.php';
    }

    /**
     * Test lowercase single letter word.
     */
    public function testLowercaseSingleLetter() : void
    {
        $word = 'a';
        $this->assertEquals(1, score($word));
    }

    /**
     * Test uppercase single letter word.
     */
    public function testUppercaseSingleLetter() : void
    {
        $word = 'A';
        $this->assertEquals(1, score($word));
    }

    /**
     * Test valuable single letter word.
     */
    public function testValuableSingleLetter() : void
    {
        $word = 'f';
        $this->assertEquals(4, score($word));
    }

    /**
     * Test short word.
     */
    public function testShortWord() : void
    {
        $word = 'at';
        $this->assertEquals(2, score($word));
    }

    /**
     * Test short valuable word.
     */
    public function testShortValuableWord() : void
    {
        $word = 'zoo';
        $this->assertEquals(12, score($word));
    }

    /**
     * Test medium word.
     */
    public function testMediumWord() : void
    {
        $word = 'street';
        $this->assertEquals(6, score($word));
    }

    /**
     * Test medium valuable word.
     */
    public function testMediumValuableWord() : void
    {
        $word = 'quirky';
        $this->assertEquals(22, score($word));
    }

    /**
     * Test long mixed-case word.
     */
    public function testLongMixedCaseWord() : void
    {
        $word = 'OxyphenButazone';
        $this->assertEquals(41, score($word));
    }

    /**
     * Test english-like word.
     */
    public function testEnglishLikeWord() : void
    {
        $word = 'pinata';
        $this->assertEquals(8, score($word));
    }

    /**
     * Test empty word score.
     */
    public function testEmptyWordScore() : void
    {
        $word = '';
        $this->assertEquals(0, score($word));
    }

    /*
     * Test entire alphabet word.
     */
    public function testEntireAlphabetWord() : void
    {
        $word = 'abcdefghijklmnopqrstuvwxyz';
        $this->assertEquals(87, score($word));
    }
}
