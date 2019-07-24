<?php

require "rna-transcription.php";

class ComplementTest extends PHPUnit\Framework\TestCase
{
    public function testTranscribesGuanineToCytosine(): void
    {
        $this->assertSame('G', toRna('C'));
    }

    public function testTranscribesCytosineToGuanine(): void
    {
        $this->assertSame('C', toRna('G'));
    }

    public function testTranscribesThymineToAdenine(): void
    {
        $this->assertSame('A', toRna('T'));
    }

    public function testTranscribesAdenineToUracil(): void
    {
        $this->assertSame('U', toRna('A'));
    }

    public function testTranscribesAllOccurencesOne(): void
    {
        $this->assertSame('UGCACCAGAAUU', toRna('ACGTGGTCTTAA'));
    }
}
