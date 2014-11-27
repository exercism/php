<?php

require "rna-transcription.php";

class ComplementTest extends \PHPUnit_Framework_TestCase
{
    public function testTranscribesGuanineToCytosine()
    {
        $this->assertSame(toRna('C'), 'G');
    }

    public function testTranscribesCytosineToGuanine()
    {
        $this->assertSame(toRna('G'), 'C');
    }

    public function testTranscribesThymineToAdenine()
    {
        $this->assertSame(toRna('T'), 'A');
    }

    public function testTranscribesAdenineToUracil()
    {
        $this->assertSame(toRna('A'), 'U');
    }

    public function testTranscribesAllOccurencesOne()
    {
        $this->assertSame(toRna('ACGTGGTCTTAA'), 'UGCACCAGAAUU');
    }
}
