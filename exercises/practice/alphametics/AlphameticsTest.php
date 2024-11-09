<?php

declare(strict_types=1);

class AlphameticsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Alphametics.php';
    }

    /**
     * uuid e0c08b07-9028-4d5f-91e1-d178fead8e1a
     * @testdox puzzle with three letters
     */
    public function testSolveThreeLetterPuzzle(): void
    {
        $alphametics = new Alphametics();
        $this->assertEquals(['I' => 1, 'B' => 9, 'L' => 0], $alphametics->solve('I + BB == ILL'));
    }

    /**
     * uuid a504ee41-cb92-4ec2-9f11-c37e95ab3f25
     * @testdox solution must have unique value for each letter
     */
    public function testSolutionsMustHaveUniqueValuesForLetters(): void
    {
        $alphametics = new Alphametics();
        $this->assertEquals(null, $alphametics->solve('A == B'));
    }

    /**
     * uuid 4e3b81d2-be7b-4c5c-9a80-cd72bc6d465a
     * @testdox leading zero solution is invalid
     */
    public function testLeadingZerosAreInvalid(): void
    {
        $alphametics = new Alphametics();
        $this->assertEquals(null, $alphametics->solve('ACA + DD == BD'));
    }

    /**
     * uuid 8a3e3168-d1ee-4df7-94c7-b9c54845ac3a
     * @testdox puzzle with two digits final carry
     */
    public function testPuzzleWithTwoDigitsFinalCarry(): void
    {
        $alphametics = new Alphametics();
        $result = $alphametics->solve('A + A + A + A + A + A + A + A + A + A + A + B == BCC');
        $this->assertEquals(['A' => 9, 'B' => 1, 'C' => 0], $result);
    }

    /**
     * uuid a9630645-15bd-48b6-a61e-d85c4021cc09
     * @testdox puzzle with four letters
     */
    public function testPuzzleWithFourLetters(): void
    {
        $alphametics = new Alphametics();
        $result = $alphametics->solve('AS + A == MOM');
        $this->assertEquals(['A' => 9, 'S' => 2, 'M' => 1, 'O' => 0], $result);
    }

    /**
     * uuid 3d905a86-5a52-4e4e-bf80-8951535791bd
     * @testdox puzzle with six letters
     */
    public function testPuzzleWithSixLetters(): void
    {
        $alphametics = new Alphametics();
        $result = $alphametics->solve('NO + NO + TOO == LATE');
        $this->assertEquals(['N' => 7, 'O' => 4, 'T' => 9, 'L' => 1, 'A' => 0, 'E' => 2], $result);
    }

    /**
     * uuid 4febca56-e7b7-4789-97b9-530d09ba95f0
     * @testdox puzzle with seven letters
     */
    public function testPuzzleWithSevenLetter(): void
    {
        $alphametics = new Alphametics();
        $result = $alphametics->solve('HE + SEES + THE == LIGHT');
        $this->assertEquals(['E' => 4, 'G' => 2, 'H' => 5, 'I' => 0, 'L' => 1, 'S' => 9, 'T' => 7], $result);
    }

    /**
     * uuid 12125a75-7284-4f9a-a5fa-191471e0d44f
     * @testdox puzzle with eight letters
     */
    public function testPuzzleWithEightLetters(): void
    {
        $alphametics = new Alphametics();
        $result = $alphametics->solve('SEND + MORE == MONEY');
        $this->assertEquals(['S' => 9, 'E' => 5, 'N' => 6, 'D' => 7, 'M' => 1, 'O' => 0, 'R' => 8, 'Y' => 2], $result);
    }

    /**
     * uuid fb05955f-38dc-477a-a0b6-5ef78969fffa
     * @testdox puzzle with ten letters
     */
    public function testPuzzleWithTenLetters(): void
    {
        $alphametics = new Alphametics();
        $result = $alphametics->solve('AND + A + STRONG + OFFENSE + AS + A + GOOD == DEFENSE');
        $this->assertEquals([
            'A' => 5,
            'D' => 3,
            'E' => 4,
            'F' => 7,
            'G' => 8,
            'N' => 0,
            'O' => 2,
            'R' => 1,
            'S' => 6,
            'T' => 9
        ], $result);
    }

    /**
     * uuid 9a101e81-9216-472b-b458-b513a7adacf7
     * @testdox puzzle with ten letters and 199 addends
     */
    public function testPuzzleWithTenLettersAnd199Addends(): void
    {
        $alphametics = new Alphametics();
        $puzzle = 'THIS + A + FIRE + THEREFORE + FOR + ALL + HISTORIES + I + TELL + A + TALE + THAT + FALSIFIES + ITS' .
            ' + TITLE + TIS + A + LIE + THE + TALE + OF + THE + LAST + FIRE + HORSES + LATE + AFTER + THE + FIRST' .
            ' + FATHERS + FORESEE + THE + HORRORS + THE + LAST + FREE + TROLL + TERRIFIES + THE + HORSES + OF + FIRE' .
            ' + THE + TROLL + RESTS + AT + THE + HOLE + OF + LOSSES + IT + IS + THERE + THAT + SHE + STORES + ROLES' .
            ' + OF + LEATHERS + AFTER + SHE + SATISFIES + HER + HATE + OFF + THOSE + FEARS + A + TASTE + RISES + AS' .
            ' + SHE + HEARS + THE + LEAST + FAR + HORSE + THOSE + FAST + HORSES + THAT + FIRST + HEAR + THE + TROLL' .
            ' + FLEE + OFF + TO + THE + FOREST + THE + HORSES + THAT + ALERTS + RAISE + THE + STARES + OF + THE' .
            ' + OTHERS + AS + THE + TROLL + ASSAILS + AT + THE + TOTAL + SHIFT + HER + TEETH + TEAR + HOOF + OFF' .
            ' + TORSO + AS + THE + LAST + HORSE + FORFEITS + ITS + LIFE + THE + FIRST + FATHERS + HEAR + OF + THE' .
            ' + HORRORS + THEIR + FEARS + THAT + THE + FIRES + FOR + THEIR + FEASTS + ARREST + AS + THE + FIRST' .
            ' + FATHERS + RESETTLE + THE + LAST + OF + THE + FIRE + HORSES + THE + LAST + TROLL + HARASSES + THE' .
            ' + FOREST + HEART + FREE + AT + LAST + OF + THE + LAST + TROLL + ALL + OFFER + THEIR + FIRE + HEAT + TO' .
            ' + THE + ASSISTERS + FAR + OFF + THE + TROLL + FASTS + ITS + LIFE + SHORTER + AS + STARS + RISE + THE' .
            ' + HORSES + REST + SAFE + AFTER + ALL + SHARE + HOT + FISH + AS + THEIR + AFFILIATES + TAILOR + A' .
            ' + ROOFS + FOR + THEIR + SAFE == FORTRESSES';
        $result = $alphametics->solve($puzzle);
        $this->assertEquals([
            'A' => 1,
            'E' => 0,
            'F' => 5,
            'H' => 8,
            'I' => 7,
            'L' => 2,
            'O' => 6,
            'R' => 3,
            'S' => 4,
            'T' => 9
        ], $result);
    }
}
