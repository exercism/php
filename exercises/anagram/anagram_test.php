<?php

require "anagram.php";

class AnagramTest extends PHPUnit\Framework\TestCase
{
    public function testNoMatches()
    {
        $this->assertEquals([], detectAnagrams('diaper', ['hello', 'world', 'zombies', 'pants']));
    }

    public function testDetectsSimpleAnagram()
    {
        $this->markTestSkipped();
        $this->assertEquals(['tan'], detectAnagrams('ant', ['tan', 'stand', 'at']));
    }

    public function testDoesNotDetectFalsePositives()
    {
        $this->markTestSkipped();
        $this->assertEquals([], detectAnagrams('galea', ['eagle']));
    }

    public function testDetectsMultipleAnagrams()
    {
        $this->markTestSkipped();
        $this->assertEquals(['stream', 'maters'], detectAnagrams('master', ['stream', 'pigeon', 'maters']));
    }

    public function testDoesNotDetectAnagramSubsets()
    {
        $this->markTestSkipped();
        $this->assertEquals([], detectAnagrams('good', ['dog', 'goody']));
    }

    public function testDetectsAnagram()
    {
        $this->markTestSkipped();
        $this->assertEquals(['inlets'], detectAnagrams('listen', ['enlists', 'google', 'inlets', 'banana']));
    }

    public function testDetectsMultipleAnagrams2()
    {
        $this->markTestSkipped();
        $this->assertEquals(
            ['gallery', 'regally', 'largely'],
            detectAnagrams('allergy', ['gallery', 'ballerina', 'regally', 'clergy', 'largely', 'leading'])
        );
    }

    public function testDoesNotDetectIdenticalWords()
    {
        $this->markTestSkipped();
        $this->assertEquals(['cron'], detectAnagrams('corn', ['corn', 'dark', 'Corn', 'rank', 'CORN', 'cron', 'park']));
    }

    public function testDoesNotDetectNonAnagramsWithIdenticalChecksum()
    {
        $this->markTestSkipped();
        $this->assertEquals([], detectAnagrams('mass', ['last']));
    }

    public function testDetectsAnagramsCaseInsensitively()
    {
        $this->markTestSkipped();
        $this->assertEquals(['Carthorse'], detectAnagrams('Orchestra', ['cashregister', 'Carthorse', 'radishes']));
    }

    public function testDetectsAnagramsUsingCaseInsensitiveSubject()
    {
        $this->markTestSkipped();
        $this->assertEquals(['carthorse'], detectAnagrams('Orchestra', ['cashregister', 'carthorse', 'radishes']));
    }

    public function testDetectsAnagramsUsingCaseInsensitvePossibleMatches()
    {
        $this->markTestSkipped();
        $this->assertEquals(['Carthorse'], detectAnagrams('orchestra', ['cashregister', 'Carthorse', 'radishes']));
    }

    public function testDoesNotDetectAWordAsItsOwnAnagram()
    {
        $this->markTestSkipped();
        $this->assertEquals([], detectAnagrams('banana', ['Banana']));
    }

    public function testDoesNotDetectAAnagramIfTheOriginalWordIsRepeated()
    {
        $this->markTestSkipped();
        $this->assertEquals([], detectAnagrams('go', ['go Go GO']));
    }

    public function testAnagramsMustUseAllLettersExactlyOnce()
    {
        $this->markTestSkipped();
        $this->assertEquals([], detectAnagrams('tapper', ['patter']));
    }

    public function testEliminatesAnagramsWithTheSameChecksum()
    {
        $this->markTestSkipped();
        $this->assertEquals([], detectAnagrams('mass', ['last']));
    }

    public function testDetectsUnicodeAnagrams()
    {
        $this->markTestSkipped();
        $this->assertEquals(['ΒΓΑ', 'γβα'], detectAnagrams('ΑΒΓ', ['ΒΓΑ', 'ΒΓΔ', 'γβα']));
    }

    public function testEliminatesMisleadingUnicodeAnagrams()
    {
        $this->markTestSkipped();
        $this->assertEquals([], detectAnagrams('ΑΒΓ', ['ABΓ']));
    }

    public function testCapitalWordIsNotOwnAnagram()
    {
        $this->markTestSkipped();
        $this->assertEquals([], detectAnagrams('BANANA', ['Banana']));
    }

    public function testAnagramsMustUseAllLettersExactlyOnce2()
    {
        $this->markTestSkipped();
        $this->assertEquals([], detectAnagrams('patter', ['tapper']));
    }
}
