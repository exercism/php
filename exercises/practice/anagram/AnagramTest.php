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

class AnagramTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Anagram.php';
    }

    public function testNoMatches(): void
    {
        $this->assertEquals([], detectAnagrams('diaper', ['hello', 'world', 'zombies', 'pants']));
    }

    public function testDetectsSimpleAnagram(): void
    {
        $this->assertEquals(['tan'], detectAnagrams('ant', ['tan', 'stand', 'at']));
    }

    public function testDoesNotDetectFalsePositives(): void
    {
        $this->assertEquals([], detectAnagrams('galea', ['eagle']));
    }

    public function testDetectsMultipleAnagrams(): void
    {
        $this->assertEquals(['stream', 'maters'], detectAnagrams('master', ['stream', 'pigeon', 'maters']));
    }

    public function testDoesNotDetectAnagramSubsets(): void
    {
        $this->assertEquals([], detectAnagrams('good', ['dog', 'goody']));
    }

    public function testDetectsAnagram(): void
    {
        $this->assertEquals(['inlets'], detectAnagrams('listen', ['enlists', 'google', 'inlets', 'banana']));
    }

    public function testDetectsMultipleAnagrams2(): void
    {
        $this->assertEquals(
            ['gallery', 'regally', 'largely'],
            detectAnagrams('allergy', ['gallery', 'ballerina', 'regally', 'clergy', 'largely', 'leading'])
        );
    }

    public function testDoesNotDetectIdenticalWords(): void
    {
        $this->assertEquals(['cron'], detectAnagrams('corn', ['corn', 'dark', 'Corn', 'rank', 'CORN', 'cron', 'park']));
    }

    public function testDoesNotDetectNonAnagramsWithIdenticalChecksum(): void
    {
        $this->assertEquals([], detectAnagrams('mass', ['last']));
    }

    public function testDetectsAnagramsCaseInsensitively(): void
    {
        $this->assertEquals(['Carthorse'], detectAnagrams('Orchestra', ['cashregister', 'Carthorse', 'radishes']));
    }

    public function testDetectsAnagramsUsingCaseInsensitiveSubject(): void
    {
        $this->assertEquals(['carthorse'], detectAnagrams('Orchestra', ['cashregister', 'carthorse', 'radishes']));
    }

    public function testDetectsAnagramsUsingCaseInsensitvePossibleMatches(): void
    {
        $this->assertEquals(['Carthorse'], detectAnagrams('orchestra', ['cashregister', 'Carthorse', 'radishes']));
    }

    public function testDoesNotDetectAWordAsItsOwnAnagram(): void
    {
        $this->assertEquals([], detectAnagrams('banana', ['Banana']));
    }

    public function testDoesNotDetectAAnagramIfTheOriginalWordIsRepeated(): void
    {
        $this->assertEquals([], detectAnagrams('go', ['go Go GO']));
    }

    public function testAnagramsMustUseAllLettersExactlyOnce(): void
    {
        $this->assertEquals([], detectAnagrams('tapper', ['patter']));
    }

    public function testEliminatesAnagramsWithTheSameChecksum(): void
    {
        $this->assertEquals([], detectAnagrams('mass', ['last']));
    }

    public function testDetectsUnicodeAnagrams(): void
    {
        $this->markTestSkipped('This requires `mbstring` to be installed and thus is optional.');
        $this->assertEquals(['ΒΓΑ', 'γβα'], detectAnagrams('ΑΒΓ', ['ΒΓΑ', 'ΒΓΔ', 'γβα']));
    }

    public function testEliminatesMisleadingUnicodeAnagrams(): void
    {
        $this->markTestSkipped('This requires `mbstring` to be installed and thus is optional.');
        $this->assertEquals([], detectAnagrams('ΑΒΓ', ['ABΓ']));
    }

    public function testCapitalWordIsNotOwnAnagram(): void
    {
        $this->assertEquals([], detectAnagrams('BANANA', ['Banana']));
    }

    public function testAnagramsMustUseAllLettersExactlyOnce2(): void
    {
        $this->assertEquals([], detectAnagrams('patter', ['tapper']));
    }
}
