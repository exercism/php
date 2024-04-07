<?php

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
     * uuid f46cda29-1ca5-4ef2-bd45-388a767e3db2
     * @testdox Lowercase letter
     */
    public function testLowercaseSingleLetter(): void
    {
        $word = 'a';
        $this->assertEquals(1, score($word));
    }

    /**
     * uuid f7794b49-f13e-45d1-a933-4e48459b2201
     * @testdox Uppercase letter
     */
    public function testUppercaseSingleLetter(): void
    {
        $word = 'A';
        $this->assertEquals(1, score($word));
    }

    /**
     * uuid eaba9c76-f9fa-49c9-a1b0-d1ba3a5b31fa
     * @testdox Valuable letter
     */
    public function testValuableSingleLetter(): void
    {
        $word = 'f';
        $this->assertEquals(4, score($word));
    }

    /**
     * uuid f3c8c94e-bb48-4da2-b09f-e832e103151e
     * @testdox Short word
     */
    public function testShortWord(): void
    {
        $word = 'at';
        $this->assertEquals(2, score($word));
    }

    /**
     * uuid 71e3d8fa-900d-4548-930e-68e7067c4615
     * @testdox Short, valuable word
     */
    public function testShortValuableWord(): void
    {
        $word = 'zoo';
        $this->assertEquals(12, score($word));
    }

    /**
     * uuid d3088ad9-570c-4b51-8764-c75d5a430e99
     * @testdox Medium word
     */
    public function testMediumWord(): void
    {
        $word = 'street';
        $this->assertEquals(6, score($word));
    }

    /**
     * uuid fa20c572-ad86-400a-8511-64512daac352
     * @testdox Medium, valuable word
     */
    public function testMediumValuableWord(): void
    {
        $word = 'quirky';
        $this->assertEquals(22, score($word));
    }

    /**
     * uuid 9336f0ba-9c2b-4fa0-bd1c-2e2d328cf967
     * @testdox Long, mixed-case word
     */
    public function testLongMixedCaseWord(): void
    {
        $word = 'OxyphenButazone';
        $this->assertEquals(41, score($word));
    }

    /**
     * uuid 1e34e2c3-e444-4ea7-b598-3c2b46fd2c10
     * @testdox English-like word
     */
    public function testEnglishLikeWord(): void
    {
        $word = 'pinata';
        $this->assertEquals(8, score($word));
    }

    /**
     * uuid 4efe3169-b3b6-4334-8bae-ff4ef24a7e4f
     * @testdox Empty input
     */
    public function testEmptyWordScore(): void
    {
        $word = '';
        $this->assertEquals(0, score($word));
    }

    /*
     * uuid 3b305c1c-f260-4e15-a5b5-cb7d3ea7c3d7
     * @testdox Entire alphabet available
     */
    public function testEntireAlphabetWord(): void
    {
        $word = 'abcdefghijklmnopqrstuvwxyz';
        $this->assertEquals(87, score($word));
    }
}
