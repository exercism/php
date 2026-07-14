<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class MicroBlogTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'MicroBlog.php';
    }

    /**
     * uuid: b927b57f-7c98-42fd-8f33-fae091dc1efc
     */
    #[TestDox('English language short')]
    public function testEnglishLanguageShort(): void
    {
        $microBlog = new MicroBlog();
        $this->assertEquals('Hi', $microBlog->truncate('Hi'));
    }

    /**
     * uuid: a3fcdc5b-0ed4-4f49-80f5-b1a293eac2a0
     */
    #[TestDox('English language long')]
    public function testEnglishLanguageLong(): void
    {
        $microBlog = new MicroBlog();
        $this->assertEquals('Hello', $microBlog->truncate('Hello there'));
    }

    /**
     * uuid: 01910864-8e15-4007-9c7c-ac956c686e60
     */
    #[TestDox('German language short (broth)')]
    public function testGermanLanguageShortBroth(): void
    {
        $microBlog = new MicroBlog();
        $this->assertEquals('brühe', $microBlog->truncate('brühe'));
    }

    /**
     * uuid: f263e488-aefb-478f-a671-b6ba99722543
     */
    #[TestDox('German language long (bear carpet → beards)')]
    public function testGermanLanguageLongBearCarpetToBeards(): void
    {
        $microBlog = new MicroBlog();
        $this->assertEquals('Bärte', $microBlog->truncate('Bärteppich'));
    }

    /**
     * uuid: 0916e8f1-41d7-4402-a110-b08aa000342c
     */
    #[TestDox('Bulgarian language short (good)')]
    public function testBulgarianLanguageShortGood(): void
    {
        $microBlog = new MicroBlog();
        $this->assertEquals('Добър', $microBlog->truncate('Добър'));
    }

    /**
     * uuid: bed6b89c-03df-4154-98e6-a61a74f61b7d
     */
    #[TestDox('Greek language short (health)')]
    public function testGreekLanguageShortHealth(): void
    {
        $microBlog = new MicroBlog();
        $this->assertEquals('υγειά', $microBlog->truncate('υγειά'));
    }

    /**
     * uuid: 485a6a70-2edb-424d-b999-5529dbc8e002
     */
    #[TestDox('Maths short')]
    public function testMathShort(): void
    {
        $microBlog = new MicroBlog();
        $this->assertEquals('a=πr²', $microBlog->truncate('a=πr²'));
    }

    /**
     * uuid: 8b4b7b51-8f48-4fbe-964e-6e4e6438be28
     */
    #[TestDox('Maths long')]
    public function testMathLong(): void
    {
        $microBlog = new MicroBlog();
        $this->assertEquals('∅⊊ℕ⊊ℤ', $microBlog->truncate('∅⊊ℕ⊊ℤ⊊ℚ⊊ℝ⊊ℂ'));
    }

    /**
     * uuid: 71f4a192-0566-4402-a512-fe12878be523
     */
    #[TestDox('English and emoji short')]
    public function testEnglishAndEmojiShort(): void
    {
        $microBlog = new MicroBlog();
        $this->assertEquals('Fly 🛫', $microBlog->truncate('Fly 🛫'));
    }

    /**
     * uuid: 6f0f71f3-9806-4759-a844-fa182f7bc203
     */
    #[TestDox('Emoji short')]
    public function testEmojiShort(): void
    {
        $microBlog = new MicroBlog();
        $this->assertEquals('💇', $microBlog->truncate('💇'));
    }

    /**
     * uuid: ce71fb92-5214-46d0-a7f8-d5ba56b4cc6e
     */
    #[TestDox('Emoji long')]
    public function testEmojiLong(): void
    {
        $microBlog = new MicroBlog();
        $this->assertEquals('❄🌡🤧🤒🏥', $microBlog->truncate('❄🌡🤧🤒🏥🕰😀'));
    }

    /**
     * uuid: 5dee98d2-d56e-468a-a1f2-121c3f7c5a0b
     */
    #[TestDox('Royal Flush?')]
    public function testRoyalFlush(): void
    {
        $microBlog = new MicroBlog();
        $this->assertEquals('🃎🂸🃅🃋🃍', $microBlog->truncate('🃎🂸🃅🃋🃍🃁🃊'));
    }
}
