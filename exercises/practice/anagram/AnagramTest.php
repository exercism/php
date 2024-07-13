<?php

declare(strict_types=1);

class AnagramTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Anagram.php';
    }

    /**
     * uuid dd40c4d2-3c8b-44e5-992a-f42b393ec373
     * @testdox No matches
     */
    public function testNoMatches(): void
    {
        $this->assertEquals([], detectAnagrams('diaper', ['hello', 'world', 'zombies', 'pants']));
    }

    /**
     * uuid 03eb9bbe-8906-4ea0-84fa-ffe711b52c8b
     * @testdox Detects two anagrams
     */
    public function testDetectsTwoAnagrams(): void
    {
        $this->assertEquals(
            ['lemons', 'melons'],
            detectAnagrams('solemn', ['lemons', 'cherry', 'melons'])
        );
    }

    /**
     * uuid a27558ee-9ba0-4552-96b1-ecf665b06556
     * @testdox Does not detect anagram subsets
     */
    public function testDoesNotDetectAnagramSubsets(): void
    {
        $this->assertEquals([], detectAnagrams('good', ['dog', 'goody']));
    }

    /**
     * uuid 64cd4584-fc15-4781-b633-3d814c4941a4
     * @testdox Detects anagram
     */
    public function testDetectsAnagram(): void
    {
        $this->assertEquals(['inlets'], detectAnagrams('listen', ['enlists', 'google', 'inlets', 'banana']));
    }

    /**
     * uuid 99c91beb-838f-4ccd-b123-935139917283
     * @testdox Detects three anagrams
     */
    public function testDetectsThreeAnagrams(): void
    {
        $this->assertEquals(
            ['gallery', 'regally', 'largely'],
            detectAnagrams('allergy', ['gallery', 'ballerina', 'regally', 'clergy', 'largely', 'leading'])
        );
    }

    /**
     * uuid 78487770-e258-4e1f-a646-8ece10950d90
     * @testdox Detects multiple anagrams with different case
     */
    public function testDetectsMultipleAnagramsWithDifferentCase(): void
    {
        $this->assertEquals(['Eons', 'ONES'], detectAnagrams('nose', ['Eons', 'ONES']));
    }

    /**
     * uuid 1d0ab8aa-362f-49b7-9902-3d0c668d557b
     * @testdox Does not detect non-anagrams with identical checksum
     */
    public function testDoesNotDetectNonAnagramsWithIdenticalChecksum(): void
    {
        $this->assertEquals([], detectAnagrams('mass', ['last']));
    }

    /**
     * uuid 9e632c0b-c0b1-4804-8cc1-e295dea6d8a8
     * @testdox Detects anagrams case-insensitively
     */
    public function testDetectsAnagramsCaseInsensitively(): void
    {
        $this->assertEquals(['Carthorse'], detectAnagrams('Orchestra', ['cashregister', 'Carthorse', 'radishes']));
    }

    /**
     * uuid b248e49f-0905-48d2-9c8d-bd02d8c3e392
     * @testdox Detects anagrams using case-insensitive subject
     */
    public function testDetectsAnagramsUsingCaseInsensitiveSubject(): void
    {
        $this->assertEquals(['carthorse'], detectAnagrams('Orchestra', ['cashregister', 'carthorse', 'radishes']));
    }

    /**
     * uuid 5c3d6a8d-7e0b-4b9e-9e1e-6c7d7f8b9c0c
     * @testdox Detects anagrams using case-insensitive possible matches
     */
    public function testDetectsAnagramsUsingCaseInsensitvePossibleMatches(): void
    {
        $this->assertEquals(['Carthorse'], detectAnagrams('orchestra', ['cashregister', 'Carthorse', 'radishes']));
    }

    /**
     * uuid 630abb71-a94e-4715-8395-179ec1df9f91
     * @testdox Does not detect an anagram if the original word is repeated
     */
    public function testDoesNotDetectAAnagramIfTheOriginalWordIsRepeated(): void
    {
        $this->assertEquals([], detectAnagrams('go', ['goGoGO']));
    }

    /**
     * uuid 9878a1c9-d6ea-4235-ae51-3ea2befd6842
     * @testdox Anagrams must use all letters exactly once
     */
    public function testAnagramsMustUseAllLettersExactlyOnce(): void
    {
        $this->assertEquals([], detectAnagrams('tapper', ['patter']));
    }

    /**
     * uuid 68934ed0-010b-4ef9-857a-20c9012d1ebf
     * @testdox Words are not anagrams of themselves
     */
    public function testWordsAreNotAnagramsOfThemselves(): void
    {
        $this->assertEquals([], detectAnagrams('BANANA', ['BANANA']));
    }

    /**
     * uuid 589384f3-4c8a-4e7d-9edc-51c3e5f0c90e
     * @testdox Words are not anagrams of themselves even if letter case is partially different
     */
    public function testWordsAreNotAnagramsOfThemselvesEvenIfLetterCaseIsPartiallyDifferent(): void
    {
        $this->assertEquals([], detectAnagrams('BANANA', ['Banana']));
    }

    /**
     * uuid ba53e423-7e02-41ee-9ae2-71f91e6d18e6
     * @testdox Words are not anagrams of themselves even if letter case is completely different
     */
    public function testWordsAreNotAnagramsOfThemselvesEvenIfLetterCaseIsCompletelyDifferent(): void
    {
        $this->assertEquals([], detectAnagrams('BANANA', ['banana']));
    }

    /**
     * uuid 33d3f67e-fbb9-49d3-a90e-0beb00861da7
     * @testdox Words other than themselves can be anagrams
     */
    public function testWordsOtherThanThemselvesCanBeAnagrams(): void
    {
        $this->assertEquals(['Silent'], detectAnagrams('LISTEN', ['LISTEN', 'Silent']));
    }

    /**
     * uuid a6854f66-eec1-4afd-a137-62ef2870c051
     * @testdox Handles case of greek letters
     */
    public function testHandlesCaseOfGreekLetters(): void
    {
        $this->markTestSkipped('This requires `mbstring` to be installed and thus is optional.');
    }
}
