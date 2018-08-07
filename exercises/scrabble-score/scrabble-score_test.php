

<?php

include_once 'scrabble-score.php';

/**
 * Calculate the value of scrabble score for a given word.
 */
class ScrabbleScoreTest extends PHPUnit\Framework\TestCase
{
    /**
     * Test lowercase single letter word.
     */
    public function testLowercaseSingleLetter()
    {
        $word = 'a';
        $this->assertEquals(1, score($word));
    }

    /**
     * Test uppercase single letter word.
     */
    public function testUppercaseSingleLetter()
    {
        $word = 'A';
        $this->assertEquals(1, score($word));
    }

    /**
     * Test valuable single letter word.
     */
    public function testValuableSingleLetter()
    {
        $word = 'f';
        $this->assertEquals(4, score($word));
    }

    /**
     * Test short word.
     */
    public function testShortWord()
    {
        $word = 'at';
        $this->assertEquals(2, score($word));
    }

    /**
     * Test short valuable word.
     */
    public function testShortValuableWord()
    {
        $word = 'zoo';
        $this->assertEquals(12, score($word));
    }

    /**
     * Test medium word.
     */
    public function testMediumWord()
    {
        $word = 'street';
        $this->assertEquals(6, score($word));
    }

    /**
     * Test medium valuable word.
     */
    public function testMediumValuableWord()
    {
        $word = 'quirky';
        $this->assertEquals(22, score($word));
    }

    /**
     * Test long mixed-case word.
     */
    public function testLongMixedCaseWord()
    {
        $word = 'OxyphenButazone';
        $this->assertEquals(41, score($word));
    }

    /**
     * Test english-like word.
     */
    public function testEnglishLikeWord()
    {
        $word = 'pinata';
        $this->assertEquals(8, score($word));
    }

    /**
     * Test empty word score.
     */
    public function testEmptyWordScore()
    {
        $word = '';
        $this->assertEquals(0, score($word));
    }

    /*
     * Test entire alphabet word.
     */
    public function testEntireAlphabetWord()
    {
        $word = 'abcdefghijklmnopqrstuvwxyz';
        $this->assertEquals(87, score($word));
    }
}
