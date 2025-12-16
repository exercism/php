<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class NucleotideCountTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'NucleotideCount.php';
    }

    /**
     * uuid: 3e5c30a8-87e2-4845-a815-a49671ade970
     */
    #[TestDox('Empty DNA sequence')]
    public function testEmptyDNASequence(): void
    {
        $this->assertSame([
            'a' => 0,
            'c' => 0,
            't' => 0,
            'g' => 0,
        ], nucleotideCount(''));
    }

    /**
     * uuid: a0ea42a6-06d9-4ac6-828c-7ccaccf98fec
     */
    #[TestDox('DNA sequence with single nucleotide')]
    public function testDNASequenceSingleNucleotide(): void
    {
        $this->assertSame([
            'a' => 0,
            'c' => 0,
            't' => 0,
            'g' => 1,
        ], nucleotideCount('G'));
    }

    /**
     * uuid: eca0d565-ed8c-43e7-9033-6cefbf5115b5
     */
    #[TestDox('Repetitive DNA sequence')]
    public function testRepetitiveDNASequence(): void
    {
        $this->assertSame([
            'a' => 0,
            'c' => 0,
            't' => 0,
            'g' => 7,
        ], nucleotideCount('GGGGGGG'));
    }

    /**
     * uuid: 40a45eac-c83f-4740-901a-20b22d15a39f
     */
    #[TestDox('DNA sequence with multiple nucleotides')]
    public function testDNASequenceWithMultipleNucleotides(): void
    {
        $this->assertSame([
            'a' => 20,
            'c' => 12,
            't' => 21,
            'g' => 17,
        ], nucleotideCount('AGCTTTTCATTCTGACTGCAACGGGCAATATGTCTCTGTGTGGATTAAAAAAAGAGTGTCTGATAGCAGC'));
    }

    /**
     * uuid: b4c47851-ee9e-4b0a-be70-a86e343bd851
     */
    #[TestDox('DNA sequence with invalid nucleotides')]
    public function testDNASequenceWithInvalidNucleotides(): void
    {
        $this->expectException(Exception::class);
        nucleotideCount('AGXXACT');
    }
}
