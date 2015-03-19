<?php

require "rna-transcription.php";

class ComplementTest extends \PHPUnit_Framework_TestCase
{
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
