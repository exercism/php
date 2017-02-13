<?php

require_once 'acronym.php';

class AcronymTest extends PHPUnit\Framework\TestCase
{
    public function testBasicTitleCase()
    {
        $this->assertEquals('PNG', acronym('Portable Network Graphics'));
    }

    public function testLowerCaseWord()
    {
        $this->markTestSkipped();

        $this->assertEquals('ROR', acronym('Ruby on Rails'));
    }

    public function testCamelCase()
    {
        $this->markTestSkipped();

        $this->assertEquals('HTML', acronym('HyperText Markup Language'));
    }

    public function testAllCapsWords()
    {
        $this->markTestSkipped();

        $this->assertEquals('PHP', acronym('PHP: Hypertext Preprocessor'));
    }

    public function testHyphenated()
    {
        $this->markTestSkipped();

        $this->assertEquals('CMOS', acronym('Complementary metal-oxide semiconductor'));
    }

    // Additional points for making the following tests pass

    public function testOneWordIsNotAbbreviated()
    {
        $this->markTestSkipped();

        $this->assertEmpty(acronym('Word'));
    }

    public function testUnicode()
    {
        $this->markTestSkipped();

        $phrase = 'Специализированная процессорная часть';
        $this->assertEquals('СПЧ', acronym($phrase));
    }
}
