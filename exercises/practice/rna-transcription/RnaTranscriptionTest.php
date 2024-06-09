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
     * @uuid 123e4567-e89b-12d3-a456-426614174001
     */
    public function testTranscribesGuanineToCytosine(): void
    {
        $this->assertSame('G', toRna('C'));
    }

    /**
     * @testdox It transcribes cytosine to guanine
     * @uuid 123e4567-e89b-12d3-a456-426614174002
     */
    public function testTranscribesCytosineToGuanine(): void
    {
        $this->assertSame('C', toRna('G'));
    }

    /**
     * @testdox It transcribes thymine to adenine
     * @uuid 123e4567-e89b-12d3-a456-426614174003
     */
    public function testTranscribesThymineToAdenine(): void
    {
        $this->assertSame('A', toRna('T'));
    }

    /**
     * @testdox It transcribes adenine to uracil
     * @uuid 123e4567-e89b-12d3-a456-426614174004
     */
    public function testTranscribesAdenineToUracil(): void
    {
        $this->assertSame('U', toRna('A'));
    }

    /**
     * @testdox It transcribes all occurrences in a given sequence
     * @uuid 123e4567-e89b-12d3-a456-426614174005
     */
    public function testTranscribesAllOccurrencesOne(): void
    {
        $this->assertSame('UGCACCAGAAUU', toRna('ACGTGGTCTTAA'));
    }

    /**
     * @testdox It returns an empty string for invalid input
     * @uuid 123e4567-e89b-12d3-a456-426614174006
     */
    public function testInvalidInputReturnsEmptyString(): void
    {
        $this->assertSame('', toRna('X'));
    }
}
