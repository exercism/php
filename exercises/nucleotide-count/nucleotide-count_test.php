<?php

class NucleotideCountTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'nucleotide-count.php';
    }

    public function testEmptyDNASequence() : void
    {
        $this->assertSame([
            'a' => 0,
            'c' => 0,
            't' => 0,
            'g' => 0,
        ], nucleotideCount(''));
    }

    public function testRepetitiveDNASequence() : void
    {
        $this->assertSame([
            'a' => 9,
            'c' => 0,
            't' => 0,
            'g' => 0,
        ], nucleotideCount('AAAAAAAAA'));
    }

    public function testDNASequence() : void
    {
        $this->assertSame([
            'a' => 20,
            'c' => 12,
            't' => 21,
            'g' => 17,
        ], nucleotideCount('AGCTTTTCATTCTGACTGCAACGGGCAATATGTCTCTGTGTGGATTAAAAAAAGAGTGTCTGATAGCAGC'));
    }
}
