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

class QueenAttackTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'QueenAttack.php';
    }

    /**
     * Test a queen is placed in a valid position.
     */
    public function testCreateQueenWithValidPosition(): void
    {
        $this->assertTrue(placeQueen(2, 2));
    }

    /**
     * Test the queen is placed on a positive rank.
     */
    public function testQueenHasPositiveRank(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The rank and file numbers must be positive.');

        placeQueen(-2, 2);
    }

    /**
     * Test the queen has a rank on the board.
     */
    public function testQueenHasRankOnBoard(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The position must be on a standard size chess board.');

        placeQueen(8, 4);
    }

    /**
     * Test the queen is placed on a positive file.
     */
    public function testQueenHasPositiveFile(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The rank and file numbers must be positive.');

        placeQueen(2, -2);
    }

    /**
     * Test the queen has a file on the board.
     */
    public function testQueenHasFileOnBoard(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The position must be on a standard size chess board.');

        placeQueen(4, 8);
    }

    /**
     * Test if queens can attack each other.
     */
    public function testQueensCanAttack(): void
    {
        $this->assertFalse(canAttack([2, 4], [6, 6]));
    }

    /**
     * Test if queens can attack each other on the same rank.
     */
    public function testQueensCanAttackOnSameRank(): void
    {
        $this->assertTrue(canAttack([2, 4], [2, 6]));
    }

    /**
     * Test if queens can attack each other on the same file.
     */
    public function testQueensCanAttackOnSameFile(): void
    {
        $this->assertTrue(canAttack([4, 5], [2, 5]));
    }

    /**
     * Test if queens can attack each other on the first diagonal.
     */
    public function testQueensCanAttackOnFirstDiagonal(): void
    {
        $this->assertTrue(canAttack([2, 2], [0, 4]));
    }

    /**
     * Test if queens can attack each other on the second diagonal.
     */
    public function testQueensCanAttackOnSecondDiagonal(): void
    {
        $this->assertTrue(canAttack([2, 2], [3, 1]));
    }

    /**
     * Test if queens can attack each other on the third diagonal.
     */
    public function testQueensCanAttackOnThirdDiagonal(): void
    {
        $this->assertTrue(canAttack([2, 2], [1, 1]));
    }

    /**
     * Test if queens can attack each other on the fourth diagonal.
     */
    public function testQueensCanAttackOnFourthDiagonal(): void
    {
        $this->assertTrue(canAttack([2, 2], [5, 5]));
    }
}
