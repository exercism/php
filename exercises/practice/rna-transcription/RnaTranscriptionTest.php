<?php

declare(strict_types=1);

class RnaTranscriptionTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'RnaTranscription.php';
    }

    /**
     * @testdox It transcribes guanine to cytosine
     * uuid 123e4567-e89b-12d3-a456-426614174001
     */
    public function testTranscribesGuanineToCytosine(): void
    {
        $this->assertSame('G', toRna('C'));
    }

    /**
     * @testdox It transcribes cytosine to guanine
     * uuid 123e4567-e89b-12d3-a456-426614174002
     */
    public function testTranscribesCytosineToGuanine(): void
    {
        $this->assertSame('C', toRna('G'));
    }

    /**
     * @testdox It transcribes thymine to adenine
     * uuid 123e4567-e89b-12d3-a456-426614174003
     */
    public function testTranscribesThymineToAdenine(): void
    {
        $this->assertSame('A', toRna('T'));
    }

    /**
     * @testdox It transcribes adenine to uracil
     * uuid 123e4567-e89b-12d3-a456-426614174004
     */
    public function testTranscribesAdenineToUracil(): void
    {
        $this->assertSame('U', toRna('A'));
    }

    /**
     * @testdox It transcribes all occurrences in a given sequence
     * uuid 123e4567-e89b-12d3-a456-426614174005
     */
    public function testTranscribesAllOccurrencesOne(): void
    {
        $this->assertSame('UGCACCAGAAUU', toRna('ACGTGGTCTTAA'));
    }

    /**
     * @testdox It handles an empty string
     * uuid 123e4567-e89b-12d3-a456-426614174006
     */
    public function testHandlesEmptyString(): void
    {
        $this->assertSame('', toRna(''));
    }

    /**
     * @testdox It transcribes a sequence with only guanine
     * uuid 123e4567-e89b-12d3-a456-426614174007
     */
    public function testTranscribesOnlyGuanine(): void
    {
        $this->assertSame('CCCC', toRna('GGGG'));
    }

    /**
     * @testdox It transcribes a sequence with only cytosine
     * uuid 123e4567-e89b-12d3-a456-426614174008
     */
    public function testTranscribesOnlyCytosine(): void
    {
        $this->assertSame('GGGG', toRna('CCCC'));
    }

    /**
     * @testdox It transcribes a sequence with only thymine
     * uuid 123e4567-e89b-12d3-a456-426614174009
     */
    public function testTranscribesOnlyThymine(): void
    {
        $this->assertSame('AAAA', toRna('TTTT'));
    }

    /**
     * @testdox It transcribes a sequence with only adenine
     * uuid 123e4567-e89b-12d3-a456-426614174010
     */
    public function testTranscribesOnlyAdenine(): void
    {
        $this->assertSame('UUUU', toRna('AAAA'));
    }
}
