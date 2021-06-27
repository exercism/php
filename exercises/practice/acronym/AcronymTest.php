<?php

declare(strict_types=1);

class AcronymTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Acronym.php';
    }

    public function testBasicTitleCase(): void
    {
        $this->assertEquals('PNG', acronym('Portable Network Graphics'));
    }

    public function testLowerCaseWord(): void
    {
        $this->assertEquals('ROR', acronym('Ruby on Rails'));
    }

    public function testCamelCase(): void
    {
        $this->assertEquals('HTML', acronym('HyperText Markup Language'));
    }

    public function testAllCapsWords(): void
    {
        $this->assertEquals('PHP', acronym('PHP: Hypertext Preprocessor'));
    }

    public function testHyphenated(): void
    {
        $this->assertEquals('CMOS', acronym('Complementary metal-oxide semiconductor'));
    }

    // Additional points for making the following tests pass

    public function testOneWordIsNotAbbreviated(): void
    {
        $this->assertEmpty(acronym('Word'));
    }

    public function testUnicode(): void
    {
        $phrase = 'Специализированная процессорная часть';
        $this->assertEquals('СПЧ', acronym($phrase));
    }
}
