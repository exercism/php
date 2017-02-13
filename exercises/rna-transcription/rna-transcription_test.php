<?php

require "rna-transcription.php";

class ComplementTest extends PHPUnit\Framework\TestCase
{
    public function testTranscribesGuanineToCytosine()
    {
        $this->assertSame('G', toRna('C'));
    }

    public function testTranscribesCytosineToGuanine()
    {
        $this->markTestSkipped();
        $this->assertSame('C', toRna('G'));
    }

    public function testTranscribesThymineToAdenine()
    {
        $this->markTestSkipped();
        $this->assertSame('A', toRna('T'));
    }

    public function testTranscribesAdenineToUracil()
    {
        $this->markTestSkipped();
        $this->assertSame('U', toRna('A'));
    }

    public function testTranscribesAllOccurencesOne()
    {
        $this->markTestSkipped();
        $this->assertSame('UGCACCAGAAUU', toRna('ACGTGGTCTTAA'));
    }
}
