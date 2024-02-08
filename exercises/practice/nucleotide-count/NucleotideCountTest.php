<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class NucleotideCountTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'NucleotideCount.php';
    }

    /**
     * uuid: 3e5c30a8-87e2-4845-a815-a49671ade970
     */
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
    public function testDNASequenceWithInvalidNucleotides(): void
    {
        $this->expectException(Exception::class);
        nucleotideCount('AGXXACT');
    }
}
