<?php

declare(strict_types=1);

class AnagramTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Anagram.php';
    }

    /**
     * @testdox no matches
     * uuid dd40c4d2-3c8b-44e5-992a-f42b393ec373
     */
    public function testNoMatches(): void
    {
        $this->assertEquals([], detectAnagrams('diaper', ['hello', 'world', 'zombies', 'pants']));
    }

    /**
     * @testdox detects two anagrams
     * uuid 03eb9bbe-8906-4ea0-84fa-ffe711b52c8b
     */
    public function testDetectsTwoAnagrams(): void
    {
        $this->assertEquals(
            ["lemons", "melons"],
            detectAnagrams('solemn', ["lemons", "cherry", "melons"])
        );
    }

    /**
     * @testdox does not detect anagram subsets
     * uuid a27558ee-9ba0-4552-96b1-ecf665b06556
     */
    public function testDoesNotDetectAnagramSubsets(): void
    {
        $this->assertEquals([], detectAnagrams('good', ['dog', 'goody']));
    }

    /**
     * @testdox detects anagram
     * uuid 64cd4584-fc15-4781-b633-3d814c4941a4
     */
    public function testDetectsAnagram(): void
    {
        $this->assertEquals(['inlets'], detectAnagrams('listen', ['enlists', 'google', 'inlets', 'banana']));
    }

    /**
     * @testdox detects three anagrams
     * uuid 99c91beb-838f-4ccd-b123-935139917283
     */
    public function testDetectsThreeAnagrams(): void
    {
        $this->assertEquals(
            ['gallery', 'regally', 'largely'],
            detectAnagrams('allergy', ['gallery', 'ballerina', 'regally', 'clergy', 'largely', 'leading'])
        );
    }

    /**
     * @testdox detects multiple anagrams with different case
     * uuid 78487770-e258-4e1f-a646-8ece10950d90
     */
    public function testDetectsMultipleAnagramsWithDifferentCase(): void
    {
        $this->assertEquals(['Eons', 'ONES'], detectAnagrams('nose', ['Eons', 'ONES']));
    }

    /**
     * @testdox does not detect non-anagrams with identical checksum
     * uuid 1d0ab8aa-362f-49b7-9902-3d0c668d557b
     */
    public function testDoesNotDetectNonAnagramsWithIdenticalChecksum(): void
    {
        $this->assertEquals([], detectAnagrams('mass', ['last']));
    }

    /**
     * @testdox detects anagrams case-insensitively
     * uuid 9e632c0b-c0b1-4804-8cc1-e295dea6d8a8
     */
    public function testDetectsAnagramsCaseInsensitively(): void
    {
        $this->assertEquals(['Carthorse'], detectAnagrams('Orchestra', ["cashregister", "Carthorse", "radishes"]));
    }

    /**
     * @testdox detects anagrams using case-insensitive subject
     * uuid b248e49f-0905-48d2-9c8d-bd02d8c3e392
     */
    public function testDetectsAnagramsUsingCaseInsensitiveSubject(): void
    {
        $this->assertEquals(['carthorse'], detectAnagrams('Orchestra', ["cashregister", "carthorse", "radishes"]));
    }

    /**
     * @testdox detects anagrams using case-insensitive possible matches
     * uuid 5c3d6a8d-7e0b-4b9e-9e1e-6c7d7f8b9c0c
     */
    public function testDetectsAnagramsUsingCaseInsensitvePossibleMatches(): void
    {
        $this->assertEquals(['Carthorse'], detectAnagrams('orchestra', ["cashregister", "Carthorse", "radishes"]));
    }

    /**
     * @testdox does not detect an anagram if the original word was not an anagram
     * uuid 630abb71-a94e-4715-8395-179ec1df9f91
     */
    public function testDoesNotDetectAAnagramIfTheOriginalWordIsRepeated(): void
    {
        $this->assertEquals([], detectAnagrams('go', ['goGoGO']));
    }

    /**
     * @testdox anagrams must use all letters exactly once
     * uuid 9878a1c9-d6ea-4235-ae51-3ea2befd6842
     */
    public function testAnagramsMustUseAllLettersExactlyOnce(): void
    {
        $this->assertEquals([], detectAnagrams('tapper', ['patter']));
    }

    /**
     * @testdox words are not anagrams of themselves
     * uuid 68934ed0-010b-4ef9-857a-20c9012d1ebf
     */
    public function testWordsAreNotAnagramsOfThemselves(): void
    {
        $this->assertEquals([], detectAnagrams('BANANA', ['BANANA']));
    }

    /**
     * @testdox words are not anagrams of themselves even if letter case is partially different
     * uuid 589384f3-4c8a-4e7d-9edc-51c3e5f0c90e
     */
    public function testWordsAreNotAnagramsOfThemselvesEvenIfLetterCaseIsPartiallyDifferent(): void
    {
        $this->assertEquals([], detectAnagrams('BANANA', ['Banana']));
    }

    /**
     * @testdox words are not anagrams of themselves even if letter case is completely different
     * uuid ba53e423-7e02-41ee-9ae2-71f91e6d18e6
     */
    public function testWordsAreNotAnagramsOfThemselvesEvenIfLetterCaseIsCompletelyDifferent(): void
    {
        $this->assertEquals([], detectAnagrams('BANANA', ['banana']));
    }

    /**
     * @testdox words other than themselves can be anagrams
     * uuid 33d3f67e-fbb9-49d3-a90e-0beb00861da7
     */
    public function testWordsOtherThanThemselvesCanBeAnagrams(): void
    {
        $this->assertEquals(['Silent'], detectAnagrams('LISTEN', ["LISTEN", "Silent"]));
    }

    /**
     * @testdox handles case of greek letters
     * uuid a6854f66-eec1-4afd-a137-62ef2870c051
     */
    public function testHandlesCaseOfGreekLetters(): void
    {
        $this->assertEquals(["ΒΓΑ", "γβα"], detectAnagrams('ΑΒΓ', ["ΒΓΑ", "ΒΓΔ", "γβα", "αβγ"]));
    }

    /**
     * @testdox different characters may have the same bytes
     * uuid fd3509e5-e3ba-409d-ac3d-a9ac84d13296
     */
    public function testDifferentCharactersMayHaveTheSameBytes(): void
    {
        $this->assertEquals([], detectAnagrams('a⬂', ["€a"]));
    }
}
