<?php

declare(strict_types=1);

class AcronymTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Acronym.php';
    }

    /**
     * @testdox Basic
     * uuid: 1e22cceb-c5e4-4562-9afe-aef07ad1eaf4
     */
    public function testBasicTitleCase(): void
    {
        $this->assertEquals('PNG', acronym('Portable Network Graphics'));
    }

    /**
     * @testdox Lowercase words
     * uuid: 79ae3889-a5c0-4b01-baf0-232d31180c08
     */
    public function testLowerCaseWord(): void
    {
        $this->assertEquals('ROR', acronym('Ruby on Rails'));
    }

    /**
     * @testdox Punctuation
     * uuid: ec7000a7-3931-4a17-890e-33ca2073a548
     */
    public function testCamelCase(): void
    {
        $this->assertEquals('HTML', acronym('HyperText Markup Language'));
    }

    /**
     * @testdox All caps word
     * uuid: 32dd261c-0c92-469a-9c5c-b192e94a63b0
     */
    public function testAllCapsWords(): void
    {
        $this->assertEquals('PHP', acronym('PHP: Hypertext Preprocessor'));
    }

    /**
     * @testdox Punctuation without whitespace
     * uuid: ae2ac9fa-a606-4d05-8244-3bcc4659c1d4
     */
    public function testHyphenated(): void
    {
        $this->assertEquals('CMOS', acronym('Complementary metal-oxide semiconductor'));
    }

    /**
     * @testdox Very long abbreviation
     * uuid: 0e4b1e7c-1a6d-48fb-81a7-bf65eb9e69f9
     */
    public function testVeryLongAbbreviation(): void
    {
        $this->assertEquals('ROTFLSHTMDCOALM', acronym('Rolling On The Floor Laughing So Hard That My Dogs Came Over And Licked Me'));
    }

    /**
     * @testdox Consecutive delimiters
     * uuid: 6a078f49-c68d-4b7b-89af-33a1a98c28cc
     */
    public function testConsecutiveDelimiters(): void
    {
        $this->assertEquals('SIMUFTA', acronym('Something - I made up from thin air'));
    }

    /**
     * @testdox Apostrophes
     * uuid: 5118b4b1-4572-434c-8d57-5b762e57973e
     */
    public function testApostrophes(): void
    {
        $this->assertEquals('HC', acronym("Halley's Comet"));
    }

    /**
     * @testdox Underscore emphasis
     * uuid: adc12eab-ec2d-414f-b48c-66a4fc06cdef
     */
    public function testUnderscoreEmphasis(): void
    {
        $this->assertEquals('TRNT', acronym('The Road _Not_ Taken'));
    }
}
