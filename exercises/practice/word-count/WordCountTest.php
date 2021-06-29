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

class WordCountTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'WordCount.php';
    }

    public function testCountOneWord(): void
    {
        $this->assertEquals(['word' => 1], wordCount('word'));
    }

    public function testCountOneOfEachWord(): void
    {
        $this->assertEquals(['one' => 1, 'of' => 1, 'each' => 1], wordCount('one of each'));
    }

    public function testMultipleOccurrencesOfAWord(): void
    {
        $this->assertEquals(
            ['one' => 1, 'fish' => 4, 'two' => 1, 'red' => 1, 'blue' => 1],
            wordCount('one fish two fish red fish blue fish')
        );
    }

    public function testIgnorePunctuation(): void
    {
        $this->assertEquals(
            ['car' => 1, 'carpet' => 1, 'as' => 1, 'java' => 1, 'javascript' => 1],
            wordCount('car : carpet as java : javascript!!&@$%^&')
        );
    }

    public function testIncludeNumbers(): void
    {
        $this->assertEquals(['1' => 1, '2' => 1, 'testing' => 2], wordCount('testing, 1, 2 testing'));
    }

    public function testNormalizeCase(): void
    {
        $this->assertEquals(['go' => 3, 'stop' => 2], wordCount('go Go GO Stop stop'));
    }

    public function testCountsMultiline(): void
    {
        $this->assertEquals(['hello' => 1, 'world' => 1], wordCount("hello\nworld"));
    }

    public function testCountsTabs(): void
    {
        $this->assertEquals(['hello' => 1, 'world' => 1], wordCount("hello\tworld"));
    }

    public function testCountsMultipleSpacesAsOne(): void
    {
        $this->assertEquals(['hello' => 1, 'world' => 1], wordCount('hello  world'));
    }

    public function testDoesNotCountLeadingOrTrailingWhitespace(): void
    {
        $this->assertEquals(['introductory' => 1, 'course' => 1], wordCount("\t\tIntroductory Course      "));
    }
}
