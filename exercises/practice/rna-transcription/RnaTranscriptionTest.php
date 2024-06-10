<?php

declare(strict_types=1);

class RnaTranscriptionTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'RnaTranscription.php';
    }

    /**
     * @testdox It handles an empty string
     * uuid b4631f82-c98c-4a2f-90b3-c5c2b6c6f661
     */
    public function testHandlesEmptyString(): void
    {
        $this->assertSame('', toRna(''));
    }

    /**
     * @testdox It transcribes guanine to cytosine
     * uuid a9558a3c-318c-4240-9256-5d5ed47005a6
     */
    public function testTranscribesGuanineToCytosine(): void
    {
        $this->assertSame('G', toRna('C'));
    }

    /**
     * @testdox It transcribes cytosine to guanine
     * uuid 6eedbb5c-12cb-4c8b-9f51-f8320b4dc2e7
     */
    public function testTranscribesCytosineToGuanine(): void
    {
        $this->assertSame('C', toRna('G'));
    }

    /**
     * @testdox It transcribes thymine to adenine
     * uuid 870bd3ec-8487-471d-8d9a-a25046488d3e
     */
    public function testTranscribesThymineToAdenine(): void
    {
        $this->assertSame('A', toRna('T'));
    }

    /**
     * @testdox It transcribes adenine to uracil
     * uuid aade8964-02e1-4073-872f-42d3ffd74c5f
     */
    public function testTranscribesAdenineToUracil(): void
    {
        $this->assertSame('U', toRna('A'));
    }

    /**
     * @testdox RNA complement
     * uuid 79ed2757-f018-4f47-a1d7-34a559392dbf
     */
    public function testTranscribesAllOccurrencesOne(): void
    {
        $this->assertSame('UGCACCAGAAUU', toRna('ACGTGGTCTTAA'));
    }
}
