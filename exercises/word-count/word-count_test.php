<?php

require "word-count.php";

class WordCountTest extends PHPUnit\Framework\TestCase
{
    public function testCountOneWord()
    {
        $this->assertEquals(['word' => 1], wordCount('word'));
    }

    public function testCountOneOfEachWord()
    {
        $this->assertEquals(['one' => 1, 'of' => 1, 'each' => 1], wordCount('one of each'));
    }

    public function testMultipleOccurrencesOfAWord()
    {
        $this->assertEquals(
            ['one' => 1, 'fish' => 4, 'two' => 1, 'red' => 1, 'blue' => 1],
            wordCount('one fish two fish red fish blue fish')
        );
    }

    public function testIgnorePunctuation()
    {
        $this->assertEquals(
            ['car' => 1, 'carpet' => 1, 'as' => 1, 'java' => 1, 'javascript' => 1],
            wordCount('car : carpet as java : javascript!!&@$%^&')
        );
    }

    public function testIncludeNumbers()
    {
        $this->assertEquals(['1' => 1, '2' => 1, 'testing' => 2], wordCount('testing, 1, 2 testing'));
    }

    public function testNormalizeCase()
    {
        $this->assertEquals(['go' => 3, 'stop' => 2], wordCount('go Go GO Stop stop'));
    }

    public function testCountsMultiline()
    {
        $this->assertEquals(['hello' => 1, 'world' => 1], wordCount("hello\nworld"));
    }

    public function testCountsTabs()
    {
        $this->assertEquals(['hello' => 1, 'world' => 1], wordCount("hello\tworld"));
    }

    public function testCountsMultipleSpacesAsOne()
    {
        $this->assertEquals(['hello' => 1, 'world' => 1], wordCount('hello  world'));
    }

    public function testDoesNotCountLeadingOrTrailingWhitespace()
    {
        $this->assertEquals(['introductory' => 1, 'course' => 1], wordCount("\t\tIntroductory Course      "));
    }
}
