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

    public function testEmptyRnaSequence(): void
    {
        $this->assertEquals([], $this->translater->getProteins(''));
    }

    public function testMethionineRnaSequence(): void
    {
        $this->assertEquals(['Methionine'], $this->translater->getProteins('AUG'));
    }

    public function testPhenylalanineRnaSequenceOne(): void
    {
        $this->assertEquals(['Phenylalanine'], $this->translater->getProteins('UUU'));
    }

    public function testPhenylalanineRnaSequenceTwo(): void
    {
        $this->assertEquals(['Phenylalanine'], $this->translater->getProteins('UUC'));
    }

    public function testLeucineRnaSequenceOne(): void
    {
        $this->assertEquals(['Leucine'], $this->translater->getProteins('UUA'));
    }

    public function testLeucineRnaSequenceTwo(): void
    {
        $this->assertEquals(['Leucine'], $this->translater->getProteins('UUG'));
    }

    public function testSerineRnaSequenceOne(): void
    {
        $this->assertEquals(['Serine'], $this->translater->getProteins('UCU'));
    }

    public function testSerineRnaSequenceTwo(): void
    {
        $this->assertEquals(['Serine'], $this->translater->getProteins('UCC'));
    }

    public function testSerineRnaSequenceThree(): void
    {
        $this->assertEquals(['Serine'], $this->translater->getProteins('UCA'));
    }

    public function testSerineRnaSequenceFour(): void
    {
        $this->assertEquals(['Serine'], $this->translater->getProteins('UCG'));
    }

    public function testTyrosineRnaSequenceOne(): void
    {
        $this->assertEquals(['Tyrosine'], $this->translater->getProteins('UAU'));
    }

    public function testTyrosineRnaSequenceTwo(): void
    {
        $this->assertEquals(['Tyrosine'], $this->translater->getProteins('UAC'));
    }

    public function testCysteineRnaSequenceOne(): void
    {
        $this->assertEquals(['Cysteine'], $this->translater->getProteins('UGU'));
    }

    public function testCysteineRnaSequenceTwo(): void
    {
        $this->assertEquals(['Cysteine'], $this->translater->getProteins('UGC'));
    }

    public function testTryptophanRnaSequence(): void
    {
        $this->assertEquals(['Tryptophan'], $this->translater->getProteins('UGG'));
    }

    public function testStopCodonRnaSequenceOne(): void
    {
        $this->assertEquals([], $this->translater->getProteins('UAA'));
    }

    public function testStopCodonRnaSequenceTwo(): void
    {
        $this->assertEquals([], $this->translater->getProteins('UAG'));
    }

    public function testStopCodonRnaSequenceThree(): void
    {
        $this->assertEquals([], $this->translater->getProteins('UGA'));
    }

    public function testToCodonsTranslateToProteins(): void
    {
        $this->assertEquals(['Phenylalanine', 'Phenylalanine'], $this->translater->getProteins('UUUUUU'));
    }

    public function testToDifferentCodonsTranslateToProteins(): void
    {
        $this->assertEquals(['Leucine', 'Leucine'], $this->translater->getProteins('UUAUUG'));
    }

    public function testTranslateRnaStrandToCorrectProteinList(): void
    {
        $this->assertEquals(
            ['Methionine', 'Phenylalanine', 'Tryptophan'],
            $this->translater->getProteins('AUGUUUUGG')
        );
    }

    public function testTranslationStopsIfStopCodonAtBeginningOfSequence(): void
    {
        $this->assertEquals([], $this->translater->getProteins('UAGUGG'));
    }

    public function testTranslationStopsIfStopCodonAtEndOfTwoCodonSequence(): void
    {
        $this->assertEquals(['Tryptophan'], $this->translater->getProteins('UGGUAG'));
    }

    public function testTranslationStopsIfStopCodonAtEndOfThreeCodonSequence(): void
    {
        $this->assertEquals(['Methionine', 'Phenylalanine'], $this->translater->getProteins('AUGUUUUAA'));
    }

    public function testTranslationStopsIfStopCodonInMiddleOfThreeCodonSequence(): void
    {
        $this->assertEquals(['Tryptophan'], $this->translater->getProteins('UGGUAGUGG'));
    }

    public function testTranslationStopsIfStopCodonInMiddleOfSixCodonSequence(): void
    {
        $this->assertEquals(
            ['Tryptophan', 'Cysteine', 'Tyrosine'],
            $this->translater->getProteins('UGGUGUUAUUAAUGGUUU')
        );
    }

    public function invalidCodonDataProvider(): array
    {
        return [
            'Non-existing' => ['AAA'],
            'Unknown' => ['XYZ'],
            'Incomplete' => ['AUGU'],
        ];
    }

    /**
     * @dataProvider invalidCodonDataProvider
     */
    public function testTranslateFailsForInvalidCodons(string $rna): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid codon');
        $this->translater->getProteins($rna);
    }

    public function testTranslatePassesIfStopCodeBeforeIncompleteSequence(): void
    {
        $this->assertEquals(['Phenylalanine', 'Phenylalanine'], $this->translater->getProteins('UUCUUCUAAUGGU'));
    }
}
