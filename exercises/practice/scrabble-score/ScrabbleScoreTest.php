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

/**
 * Calculate the value of scrabble score for a given word.
 */
class ScrabbleScoreTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'ScrabbleScore.php';
    }

    /**
     * Test lowercase single letter word.
     */
    public function testLowercaseSingleLetter(): void
    {
        $word = 'a';
        $this->assertEquals(1, score($word));
    }

    /**
     * Test uppercase single letter word.
     */
    public function testUppercaseSingleLetter(): void
    {
        $word = 'A';
        $this->assertEquals(1, score($word));
    }

    /**
     * Test valuable single letter word.
     */
    public function testValuableSingleLetter(): void
    {
        $word = 'f';
        $this->assertEquals(4, score($word));
    }

    /**
     * Test short word.
     */
    public function testShortWord(): void
    {
        $word = 'at';
        $this->assertEquals(2, score($word));
    }

    /**
     * Test short valuable word.
     */
    public function testShortValuableWord(): void
    {
        $word = 'zoo';
        $this->assertEquals(12, score($word));
    }

    /**
     * Test medium word.
     */
    public function testMediumWord(): void
    {
        $word = 'street';
        $this->assertEquals(6, score($word));
    }

    /**
     * Test medium valuable word.
     */
    public function testMediumValuableWord(): void
    {
        $word = 'quirky';
        $this->assertEquals(22, score($word));
    }

    /**
     * Test long mixed-case word.
     */
    public function testLongMixedCaseWord(): void
    {
        $word = 'OxyphenButazone';
        $this->assertEquals(41, score($word));
    }

    /**
     * Test english-like word.
     */
    public function testEnglishLikeWord(): void
    {
        $word = 'pinata';
        $this->assertEquals(8, score($word));
    }

    /**
     * Test empty word score.
     */
    public function testEmptyWordScore(): void
    {
        $word = '';
        $this->assertEquals(0, score($word));
    }

    /*
     * Test entire alphabet word.
     */
    public function testEntireAlphabetWord(): void
    {
        $word = 'abcdefghijklmnopqrstuvwxyz';
        $this->assertEquals(87, score($word));
    }
}
