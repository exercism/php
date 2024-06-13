<?php

declare(strict_types=1);

class ReverseStringTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'ReverseString.php';
    }

    /**
     * @testdox an empty string
     * uuid c3b7d806-dced-49ee-8543-933fd1719b1c
     */
    public function testEmptyString(): void
    {
        $this->assertEquals("", reverseString(""));
    }

    /**
     * @testdox a word
     * uudi 01ebf55b-bebb-414e-9dec-06f7bb0bee3c
     */
    public function testWord(): void
    {
        $this->assertEquals("tobor", reverseString("robot"));
    }

    /**
     * @testdox a capitalized word
     * uuid 0f7c07e4-efd1-4aaa-a07a-90b49ce0b746
     */
    public function testCapitalizedWord(): void
    {
        $this->assertEquals("nemaR", reverseString("Ramen"));
    }

    /**
     * @testdox a sentence with punctuation
     * uuid 71854b9c-f200-4469-9f5c-1e8e5eff5614
     */
    public function testSentenceWithPunctuation(): void
    {
        $this->assertEquals("!yrgnuh m'I", reverseString("I'm hungry!"));
    }

    /**
     * @testdox a palindrome
     * uuid 1f8ed2f3-56f3-459b-8f3e-6d8d654a1f6c
     */
    public function testPalindrome(): void
    {
        $this->assertEquals("racecar", reverseString("racecar"));
    }

    /**
     * @testdox an even-sized word
     * uuid b9e7dec1-c6df-40bd-9fa3-cd7ded010c4c
     */
    public function testEvenSizedWord(): void
    {
        $this->assertEquals("reward", reverseString("drawer"));
    }

    /**
     * @testdox wide characters
     * uuid 1bed0f8a-13b0-4bd3-9d59-3d0593326fa2
     */
    public function testWideCharacters(): void
    {
        $this->assertEquals("猫子", reverseString("子猫"));
    }

    /**
     * @testdox grapheme cluster with pre-combined form
     * uuid 93d7e1b8-f60f-4f3c-9559-4056e10d2ead
     */
    public function testGraphemeClusterWithPreCombinedForm(): void
    {
        $this->assertEquals("dnatsnehctsrüW", reverseString("Würstchenstand"));
    }

    /**
     * @testdox grapheme clusters
     * uuid 1028b2c1-6763-4459-8540-2da47ca512d9
     */
    public function testGraphemeClusters(): void
    {
        $this->assertEquals("มรกแรปโนยขีเผู้", reverseString("ผู้เขียนโปรแกรม"));
    }
}
