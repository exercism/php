<?php

class ComplementTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require 'rna-transcription.php';
    }

    public function testTranscribesGuanineToCytosine()
    {
        $this->assertSame('G', toRna('C'));
    }

    public function testTranscribesCytosineToGuanine()
    {
        $this->assertSame('C', toRna('G'));
    }

    public function testTranscribesThymineToAdenine()
    {
        $this->assertSame('A', toRna('T'));
    }

    public function testTranscribesAdenineToUracil()
    {
        $this->assertSame('U', toRna('A'));
    }

    public function testTranscribesAllOccurencesOne()
    {
        $this->assertSame('UGCACCAGAAUU', toRna('ACGTGGTCTTAA'));
    }
}
