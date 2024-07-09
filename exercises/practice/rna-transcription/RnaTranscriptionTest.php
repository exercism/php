<?php

declare(strict_types=1);

class RnaTranscriptionTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'RnaTranscription.php';
    }

    /**
     * uuid b4631f82-c98c-4a2f-90b3-c5c2b6c6f661
     * @testdox It handles an empty string
     */
    public function testHandlesEmptyString(): void
    {
        $this->assertSame('', toRna(''));
    }

    /**
     * uuid a9558a3c-318c-4240-9256-5d5ed47005a6
     * @testdox It transcribes guanine to cytosine
     */
    public function testTranscribesGuanineToCytosine(): void
    {
        $this->assertSame('G', toRna('C'));
    }

    /**
     * uuid 6eedbb5c-12cb-4c8b-9f51-f8320b4dc2e7
     * @testdox It transcribes cytosine to guanine
     */
    public function testTranscribesCytosineToGuanine(): void
    {
        $this->assertSame('C', toRna('G'));
    }

    /**
     * uuid 870bd3ec-8487-471d-8d9a-a25046488d3e
     * @testdox It transcribes thymine to adenine
     */
    public function testTranscribesThymineToAdenine(): void
    {
        $this->assertSame('A', toRna('T'));
    }

    /**
     * uuid aade8964-02e1-4073-872f-42d3ffd74c5f
     * @testdox It transcribes adenine to uracil
     */
    public function testTranscribesAdenineToUracil(): void
    {
        $this->assertSame('U', toRna('A'));
    }

    /**
     * uuid 79ed2757-f018-4f47-a1d7-34a559392dbf
     * @testdox RNA complement
     */
    public function testTranscribesAllOccurrencesOne(): void
    {
        $this->assertSame('UGCACCAGAAUU', toRna('ACGTGGTCTTAA'));
    }
}
