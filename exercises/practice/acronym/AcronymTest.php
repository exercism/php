<?php

declare(strict_types=1);

class AcronymTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Acronym.php';
    }

    /**
     * uuid: 1e22cceb-c5e4-4562-9afe-aef07ad1eaf4
     * @testdox Basic
     */
    public function testBasicTitleCase(): void
    {
        $this->assertEquals('PNG', acronym('Portable Network Graphics'));
    }

    /**
     * uuid: 79ae3889-a5c0-4b01-baf0-232d31180c08
     * @testdox Lowercase words
     */
    public function testLowerCaseWord(): void
    {
        $this->assertEquals('ROR', acronym('Ruby on Rails'));
    }

    /**
     * uuid: ec7000a7-3931-4a17-890e-33ca2073a548
     * @testdox Punctuation
     */
    public function testPunctuation(): void
    {
        $this->assertEquals('FIFO', acronym('First In, First Out'));
    }

    /**
     * uuid: 32dd261c-0c92-469a-9c5c-b192e94a63b0
     * @testdox All caps word
     */
    public function testAllCapsWords(): void
    {
        $this->assertEquals('GIMP', acronym('GNU Image Manipulation Program'));
    }

    /**
     * uuid: ae2ac9fa-a606-4d05-8244-3bcc4659c1d4
     * @testdox Punctuation without whitespace
     */
    public function testHyphenated(): void
    {
        $this->assertEquals('CMOS', acronym('Complementary metal-oxide semiconductor'));
    }

    /**
     * uuid: 0e4b1e7c-1a6d-48fb-81a7-bf65eb9e69f9
     * @testdox Very long abbreviation
     */
    public function testVeryLongAbbreviation(): void
    {
        $this->assertEquals('ROTFLSHTMDCOALM', acronym('Rolling On The Floor Laughing So Hard That My Dogs Came Over And Licked Me'));
    }

    /**
     * uuid: 6a078f49-c68d-4b7b-89af-33a1a98c28cc
     * @testdox Consecutive delimiters
     */
    public function testConsecutiveDelimiters(): void
    {
        $this->assertEquals('SIMUFTA', acronym('Something - I made up from thin air'));
    }
}
