<?php

declare(strict_types=1);

class ProteinTranslationTest extends PHPUnit\Framework\TestCase
{
    private ProteinTranslation $translater;

    public static function setUpBeforeClass(): void
    {
        require_once 'ProteinTranslation.php';
    }

    public function setUp(): void
    {
        $this->translater = new ProteinTranslation();
    }

    /**
     * @testdox Empty RNA sequence results in no proteins
     * uuid 2c44f7bf-ba20-43f7-a3bf-f2219c0c3f98
     */
    public function testEmptyRnaSequence(): void
    {
        $this->assertEquals([], $this->translater->getProteins(''));
    }

    /**
     * @testdox Methionine RNA sequence
     * uuid 96d3d44f-34a2-4db4-84cd-fff523e069be
     */
    public function testMethionineRnaSequence(): void
    {
        $this->assertEquals(['Methionine'], $this->translater->getProteins('AUG'));
    }

    /**
     * @testdox Phenylalanine RNA sequence 1
     * uuid 1b4c56d8-d69f-44eb-be0e-7b17546143d9
     */
    public function testPhenylalanineRnaSequenceOne(): void
    {
        $this->assertEquals(['Phenylalanine'], $this->translater->getProteins('UUU'));
    }

    /**
     * @testdox Phenylalanine RNA sequence 2
     * uuid 81b53646-bd57-4732-b2cb-6b1880e36d11
     */
    public function testPhenylalanineRnaSequenceTwo(): void
    {
        $this->assertEquals(['Phenylalanine'], $this->translater->getProteins('UUC'));
    }

    /**
     * @testdox Leucine RNA sequence 1
     * uuid 42f69d4f-19d2-4d2c-a8b0-f0ae9ee1b6b4
     */
    public function testLeucineRnaSequenceOne(): void
    {
        $this->assertEquals(['Leucine'], $this->translater->getProteins('UUA'));
    }

    /**
     * @testdox Leucine RNA sequence 2
     * uuid ac5edadd-08ed-40a3-b2b9-d82bb50424c4
     */
    public function testLeucineRnaSequenceTwo(): void
    {
        $this->assertEquals(['Leucine'], $this->translater->getProteins('UUG'));
    }

    /**
     * @testdox Serine RNA sequence 1
     * uuid 8bc36e22-f984-44c3-9f6b-ee5d4e73f120
     */
    public function testSerineRnaSequenceOne(): void
    {
        $this->assertEquals(['Serine'], $this->translater->getProteins('UCU'));
    }

    /**
     * @testdox Serine RNA sequence 2
     * uuid 5c3fa5da-4268-44e5-9f4b-f016ccf90131
     */
    public function testSerineRnaSequenceTwo(): void
    {
        $this->assertEquals(['Serine'], $this->translater->getProteins('UCC'));
    }

    /**
     * @testdox Serine RNA sequence 3
     * uuid 00579891-b594-42b4-96dc-7ff8bf519606
     */
    public function testSerineRnaSequenceThree(): void
    {
        $this->assertEquals(['Serine'], $this->translater->getProteins('UCA'));
    }

    /**
     * @testdox Serine RNA sequence 4
     * uuid 08c61c3b-fa34-4950-8c4a-133945570ef6
     */
    public function testSerineRnaSequenceFour(): void
    {
        $this->assertEquals(['Serine'], $this->translater->getProteins('UCG'));
    }

    /**
     * @testdox Tyrosine RNA sequence 1
     * uuid 54e1e7d8-63c0-456d-91d2-062c72f8eef5
     */
    public function testTyrosineRnaSequenceOne(): void
    {
        $this->assertEquals(['Tyrosine'], $this->translater->getProteins('UAU'));
    }

    /**
     * @testdox Tyrosine RNA sequence 2
     * uuid 47bcfba2-9d72-46ad-bbce-22f7666b7eb1
     */
    public function testTyrosineRnaSequenceTwo(): void
    {
        $this->assertEquals(['Tyrosine'], $this->translater->getProteins('UAC'));
    }

    /**
     * @testdoxCysteine RNA sequence 1
     * uuid 3a691829-fe72-43a7-8c8e-1bd083163f72
     */
    public function testCysteineRnaSequenceOne(): void
    {
        $this->assertEquals(['Cysteine'], $this->translater->getProteins('UGU'));
    }

    /**
     * @testdox Cysteine RNA sequence 2
     * uuid 1b6f8a26-ca2f-43b8-8262-3ee446021767
     */
    public function testCysteineRnaSequenceTwo(): void
    {
        $this->assertEquals(['Cysteine'], $this->translater->getProteins('UGC'));
    }

    /**
     * @testdox Tryptophan RNA sequence
     * uuid 1e91c1eb-02c0-48a0-9e35-168ad0cb5f39
     */
    public function testTryptophanRnaSequence(): void
    {
        $this->assertEquals(['Tryptophan'], $this->translater->getProteins('UGG'));
    }

    /**
     * @testdox STOP codon RNA sequence 1
     * uuid e547af0b-aeab-49c7-9f13-801773a73557
     */
    public function testStopCodonRnaSequenceOne(): void
    {
        $this->assertEquals([], $this->translater->getProteins('UAA'));
    }

    /**
     * @testdox STOP codon RNA sequence 2
     * uuid 67640947-ff02-4f23-a2ef-816f8a2ba72e
     */
    public function testStopCodonRnaSequenceTwo(): void
    {
        $this->assertEquals([], $this->translater->getProteins('UAG'));
    }

    /**
     * @testdox STOP codon RNA sequence 3
     * uuid 9c2ad527-ebc9-4ace-808b-2b6447cb54cb
     */
    public function testStopCodonRnaSequenceThree(): void
    {
        $this->assertEquals([], $this->translater->getProteins('UGA'));
    }

    /**
     * @testdox Sequence of two protein codons translates into proteins
     * uuid f4d9d8ee-00a8-47bf-a1e3-1641d4428e54
     */
    public function testToCodonsTranslateToProteins(): void
    {
        $this->assertEquals(['Phenylalanine', 'Phenylalanine'], $this->translater->getProteins('UUUUUU'));
    }

    /**
     * @testdox Sequence of two different protein codons translates into proteins
     * uuid dd22eef3-b4f1-4ad6-bb0b-27093c090a9d
     */
    public function testToDifferentCodonsTranslateToProteins(): void
    {
        $this->assertEquals(['Leucine', 'Leucine'], $this->translater->getProteins('UUAUUG'));
    }

    /**
     * @testdox Translate RNA strand into correct protein list
     * uuid d0f295df-fb70-425c-946c-ec2ec185388e
     */
    public function testTranslateRnaStrandToCorrectProteinList(): void
    {
        $this->assertEquals(
            ['Methionine', 'Phenylalanine', 'Tryptophan'],
            $this->translater->getProteins('AUGUUUUGG')
        );
    }

    /**
     * @testdox Translation stops if STOP codon at beginning of sequence
     * uuid e30e8505-97ec-4e5f-a73e-5726a1faa1f4
     */
    public function testTranslationStopsIfStopCodonAtBeginningOfSequence(): void
    {
        $this->assertEquals([], $this->translater->getProteins('UAGUGG'));
    }

    /**
     * @testdox Translation stops if STOP codon at end of two-codon sequence
     * uuid 5358a20b-6f4c-4893-bce4-f929001710f3
     */
    public function testTranslationStopsIfStopCodonAtEndOfTwoCodonSequence(): void
    {
        $this->assertEquals(['Tryptophan'], $this->translater->getProteins('UGGUAG'));
    }

    /**
     * @testdox Translation stops if STOP codon at end of three-codon sequence
     * uuid ba16703a-1a55-482f-bb07-b21eef5093a3
     */
    public function testTranslationStopsIfStopCodonAtEndOfThreeCodonSequence(): void
    {
        $this->assertEquals(['Methionine', 'Phenylalanine'], $this->translater->getProteins('AUGUUUUAA'));
    }

    /**
     * @testdox Translation stops if STOP codon in middle of three-codon sequence"
     * uuid 4089bb5a-d5b4-4e71-b79e-b8d1f14a2911
     */
    public function testTranslationStopsIfStopCodonInMiddleOfThreeCodonSequence(): void
    {
        $this->assertEquals(['Tryptophan'], $this->translater->getProteins('UGGUAGUGG'));
    }

    /**
     * @testdox Translation stops if STOP codon in middle of six-codon sequence
     * uuid 2c2a2a60-401f-4a80-b977-e0715b23b93d
     */
    public function testTranslationStopsIfStopCodonInMiddleOfSixCodonSequence(): void
    {
        $this->assertEquals(
            ['Tryptophan', 'Cysteine', 'Tyrosine'],
            $this->translater->getProteins('UGGUGUUAUUAAUGGUUU')
        );
    }

    /**
     * @testdox Unknown amino acids, not part of a codon, can't translate
     * uuid 9eac93f3-627a-4c90-8653-6d0a0595bc6f
     */
    public function testUnknownAminoAcidsCantTranslate(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid codon');
        $this->translater->getProteins('XYZ');
    }


    /**
     * @testdox Incomplete RNA sequence can't translate
     * uuid 9d73899f-e68e-4291-b1e2-7bf87c00f024
     */
    public function testIncompleteRnaSequenceCantTranslate(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid codon');
        $this->translater->getProteins('AUGU');
    }

    /**
     * @testdox Incomplete RNA sequence can translate if valid until a STOP codon
     * uuid 43945cf7-9968-402d-ab9f-b8a28750b050
     */
    public function testIncompleteRnaSequenceCanTranslateIfValidUntilStop(): void
    {
        $this->assertEquals(['Phenylalanine', 'Phenylalanine'], $this->translater->getProteins('UUCUUCUAAUGGU'));
    }
}
