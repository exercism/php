<?php

class AnagramTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'anagram.php';
    }

    public function testNoMatches() : void
    {
        $this->assertEquals([], detectAnagrams('diaper', ['hello', 'world', 'zombies', 'pants']));
    }

    public function testDetectsSimpleAnagram() : void
    {
        $this->assertEquals(['tan'], detectAnagrams('ant', ['tan', 'stand', 'at']));
    }

    public function testDoesNotDetectFalsePositives() : void
    {
        $this->assertEquals([], detectAnagrams('galea', ['eagle']));
    }

    public function testDetectsMultipleAnagrams() : void
    {
        $this->assertEquals(['stream', 'maters'], detectAnagrams('master', ['stream', 'pigeon', 'maters']));
    }

    public function testDoesNotDetectAnagramSubsets() : void
    {
        $this->assertEquals([], detectAnagrams('good', ['dog', 'goody']));
    }

    public function testDetectsAnagram() : void
    {
        $this->assertEquals(['inlets'], detectAnagrams('listen', ['enlists', 'google', 'inlets', 'banana']));
    }

    public function testDetectsMultipleAnagrams2() : void
    {
        $this->assertEquals(
            ['gallery', 'regally', 'largely'],
            detectAnagrams('allergy', ['gallery', 'ballerina', 'regally', 'clergy', 'largely', 'leading'])
        );
    }

    public function testDoesNotDetectIdenticalWords() : void
    {
        $this->assertEquals(['cron'], detectAnagrams('corn', ['corn', 'dark', 'Corn', 'rank', 'CORN', 'cron', 'park']));
    }

    public function testDoesNotDetectNonAnagramsWithIdenticalChecksum() : void
    {
        $this->assertEquals([], detectAnagrams('mass', ['last']));
    }

    public function testDetectsAnagramsCaseInsensitively() : void
    {
        $this->assertEquals(['Carthorse'], detectAnagrams('Orchestra', ['cashregister', 'Carthorse', 'radishes']));
    }

    public function testDetectsAnagramsUsingCaseInsensitiveSubject() : void
    {
        $this->assertEquals(['carthorse'], detectAnagrams('Orchestra', ['cashregister', 'carthorse', 'radishes']));
    }

    public function testDetectsAnagramsUsingCaseInsensitvePossibleMatches() : void
    {
        $this->assertEquals(['Carthorse'], detectAnagrams('orchestra', ['cashregister', 'Carthorse', 'radishes']));
    }

    public function testDoesNotDetectAWordAsItsOwnAnagram() : void
    {
        $this->assertEquals([], detectAnagrams('banana', ['Banana']));
    }

    public function testDoesNotDetectAAnagramIfTheOriginalWordIsRepeated() : void
    {
        $this->assertEquals([], detectAnagrams('go', ['go Go GO']));
    }

    public function testAnagramsMustUseAllLettersExactlyOnce() : void
    {
        $this->assertEquals([], detectAnagrams('tapper', ['patter']));
    }

    public function testEliminatesAnagramsWithTheSameChecksum() : void
    {
        $this->assertEquals([], detectAnagrams('mass', ['last']));
    }

    public function testDetectsUnicodeAnagrams() : void
    {
        $this->markTestSkipped('This requires `mbstring` to be installed and thus is optional.');
        $this->assertEquals(['ΒΓΑ', 'γβα'], detectAnagrams('ΑΒΓ', ['ΒΓΑ', 'ΒΓΔ', 'γβα']));
    }

    public function testEliminatesMisleadingUnicodeAnagrams() : void
    {
        $this->markTestSkipped('This requires `mbstring` to be installed and thus is optional.');
        $this->assertEquals([], detectAnagrams('ΑΒΓ', ['ABΓ']));
    }

    public function testCapitalWordIsNotOwnAnagram() : void
    {
        $this->assertEquals([], detectAnagrams('BANANA', ['Banana']));
    }

    public function testAnagramsMustUseAllLettersExactlyOnce2() : void
    {
        $this->assertEquals([], detectAnagrams('patter', ['tapper']));
    }
}
