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

class AlphameticsTest extends PHPUnit\Framework\TestCase
{
    private Alphametics $alphametics;

    public static function setUpBeforeClass(): void
    {
        require_once 'Alphametics.php';
    }

    public function setUp(): void
    {
        $this->alphametics = new Alphametics();
    }

    public function testSolveThreeLetterPuzzle(): void
    {
        $this->assertEquals(['I' => 1, 'B' => 9, 'L' => 0], $this->alphametics->solve('I + BB == ILL'));
    }

    public function testSolutionsMustHaveUniqueValuesForLetters(): void
    {
        $this->assertEquals(null, $this->alphametics->solve('A == B'));
    }

    public function testLeadingZerosAreInvalid(): void
    {
        $this->assertEquals(null, $this->alphametics->solve('ACA + DD == BD'));
    }

    public function testPuzzleWithTwoDigitsFinalCarry(): void
    {
        $result = $this->alphametics->solve('A + A + A + A + A + A + A + A + A + A + A + B == BCC');
        $this->assertEquals(['A' => 9, 'B' => 1, 'C' => 0], $result);
    }

    public function testPuzzleWithFourLetters(): void
    {
        $result = $this->alphametics->solve('AS + A == MOM');
        $this->assertEquals(['A' => 9, 'S' => 2, 'M' => 1, 'O' => 0], $result);
    }

    public function testPuzzleWithSixLetters(): void
    {
        $result = $this->alphametics->solve('NO + NO + TOO == LATE');
        $this->assertEquals(['N' => 7, 'O' => 4, 'T' => 9, 'L' => 1, 'A' => 0, 'E' => 2], $result);
    }

    public function testPuzzleWithSevenLetter(): void
    {
        $result = $this->alphametics->solve('HE + SEES + THE == LIGHT');
        $this->assertEquals(['E' => 4, 'G' => 2, 'H' => 5, 'I' => 0, 'L' => 1, 'S' => 9, 'T' => 7], $result);
    }

    public function testPuzzleWithEightLetters(): void
    {
        $result = $this->alphametics->solve('SEND + MORE == MONEY');
        $this->assertEquals(['S' => 9, 'E' => 5, 'N' => 6, 'D' => 7, 'M' => 1, 'O' => 0, 'R' => 8, 'Y' => 2], $result);
    }

    public function testPuzzleWithTenLetters(): void
    {
        $result = $this->alphametics->solve('AND + A + STRONG + OFFENSE + AS + A + GOOD == DEFENSE');
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

    public function testPuzzleWithTenLettersAnd199Addends(): void
    {
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
        $result = $this->alphametics->solve($puzzle);
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
