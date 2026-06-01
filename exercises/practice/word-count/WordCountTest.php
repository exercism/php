<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class WordCountTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'WordCount.php';
    }

    /**
     * UUID 61559d5f-2cad-48fb-af53-d3973a9ee9ef
     */
    #[TestDox('count one word')]
    public function testCountOneWord(): void
    {
        $this->assertEquals(['word' => 1], wordCount('word'));
    }

    /**
     * UUID 5abd53a3-1aed-43a4-a15a-29f88c09cbbd
     */
    #[TestDox('count one of each word')]
    public function testCountOneOfEachWord(): void
    {
        $this->assertEquals(['one' => 1, 'of' => 1, 'each' => 1], wordCount('one of each'));
    }

    /**
     * UUID 2a3091e5-952e-4099-9fac-8f85d9655c0e
     */
    #[TestDox('multiple occurrences of a word')]
    public function testMultipleOccurrencesOfAWord(): void
    {
        $this->assertEquals(['one' => 1, 'fish' => 4, 'two' => 1, 'red' => 1, 'blue' => 1], wordCount('one fish two fish red fish blue fish'));
    }

    /**
     * UUID e81877ae-d4da-4af4-931c-d923cd621ca6
     */
    #[TestDox('handles cramped lists')]
    public function testHandlesCrampedLists(): void
    {
        $this->assertEquals(['one' => 1, 'two' => 1, 'three' => 1], wordCount('one,two,three'));
    }

    /**
     * UUID 7349f682-9707-47c0-a9af-be56e1e7ff30
     */
    #[TestDox('handles expanded lists')]
    public function testHandlesExpandedLists(): void
    {
        $this->assertEquals(
            ['one' => 1, 'two' => 1, 'three' => 1],
            wordCount("one,\ntwo,\nthree"),
        );
    }

    /**
     * UUID a514a0f2-8589-4279-8892-887f76a14c82
     */
    #[TestDox('ignore punctuation')]
    public function testIgnorePunctuation(): void
    {
        $this->assertEquals(['car' => 1, 'carpet' => 1, 'as' => 1, 'java' => 1, 'javascript' => 1], wordCount('car : carpet as java : javascript!!&@$%^&'));
    }

    /**
     * UUID d2e5cee6-d2ec-497b-bdc9-3ebe092ce55e
     */
    #[TestDox('include numbers')]
    public function testIncludeNumbers(): void
    {
        $this->assertEquals(['1' => 1, '2' => 1, 'testing' => 2], wordCount('testing, 1, 2 testing'));
    }

    /**
     * UUID dac6bc6a-21ae-4954-945d-d7f716392dbf
     */
    #[TestDox('normalize case')]
    public function testNormalizeCase(): void
    {
        $this->assertEquals(['go' => 3, 'stop' => 2], wordCount('go Go GO Stop stop'));
    }

    /**
     * UUID 4ff6c7d7-fcfc-43ef-b8e7-34ff1837a2d3
     */
    #[TestDox('with apostrophes')]
    public function testWithApostrophes(): void
    {
        $this->assertEquals(['first' => 1, "don't" => 1, 'count' => 1], wordCount("first: don't count"));
    }

    /**
     * UUID be72af2b-8afe-4337-b151-b297202e4a7b
     */
    #[TestDox('with quotations')]
    public function testWithQuotations(): void
    {
        $this->assertEquals(
            [
                'joe' => 1,
                "can't" => 1,
                'tell' => 1,
                'between' => 1,
                'large' => 2,
                'and' => 1,
            ],
            wordCount("Joe can't tell between 'large' and large."),
        );
    }

    /**
     * UUID 8d6815fe-8a51-4a65-96f9-2fb3f6dc6ed6
     */
    #[TestDox('starts from the beginning')]
    public function testStartsFromTheBeginning(): void
    {
        $this->assertEquals(['goody' => 1, 'good' => 1, 'oody' => 1], wordCount('goody good oody'));
    }

    /**
     * UUID c5f4ef26-f3f7-4725-b314-855c04fb4c13
     */
    #[TestDox('counts multiple spaces as one')]
    public function testCountsMultipleSpacesAsOne(): void
    {
        $this->assertEquals(['hello' => 1, 'world' => 1], wordCount('hello  world'));
    }

    /**
     * UUID 50176e8a-fe8e-4f4c-b6b6-aa9cf8f20360
     */
    #[TestDox('alternating word separators are not detected as words')]
    public function testAlternatingWordSeparatorsNotDetectedAsWord(): void
    {
        $this->assertEquals(['one' => 1, 'two' => 1, 'three' => 1], wordCount("one,\ntwo,\nthree"));
    }

    /**
     * UUID 6d00f1db-901c-4bec-9829-d20eb3044557
     */
    #[TestDox('quotation for word with apostrophe')]
    public function testQuotationForWordWithApostrophe(): void
    {
        $this->assertEquals(['well' => 1, 'happening' => 1, "what's" => 1], wordCount("well, \"what's\" happening"));
    }

    /**
     * UUID not found
     */
    public function testDoesNotCountLeadingOrTrailingWhitespace(): void
    {
        $this->assertEquals(['introductory' => 1, 'course' => 1], wordCount("\t\tIntroductory Course      "));
    }

    /**
     * UUID not found
     */
    public function testCountsMultiline(): void
    {
        $this->assertEquals(['hello' => 1, 'world' => 1], wordCount("hello\nworld"));
    }

    /**
     * UUID not found
     */
    public function testCountsTabs(): void
    {
        $this->assertEquals(['hello' => 1, 'world' => 1], wordCount("hello\tworld"));
    }
}
