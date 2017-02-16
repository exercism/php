<?php

require "queen-attack.php";

class QueenAttackTest extends PHPUnit\Framework\TestCase
{
    /**
     * Test a queen is placed in a valid position.
     */
    public function testCreateQueenWithValidPosition()
    {
        $this->assertTrue(placeQueen(2, 2));
    }

    /**
     * Test the queen is placed on a positive rank.
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The rank and file numbers must be positive.
     */
    public function testQueenHasPositiveRank()
    {
        $this->markTestSkipped();
        placeQueen(-2, 2);
    }

    /**
     * Test the queen has a rank on the board.
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The position must be on a standard size chess board.
     */
    public function testQueenHasRankOnBoard()
    {
        $this->markTestSkipped();
        placeQueen(8, 4);
    }

    /**
     * Test the queen is placed on a positive file.
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The rank and file numbers must be positive.
     */
    public function testQueenHasPositiveFile()
    {
        $this->markTestSkipped();
        placeQueen(2, -2);
    }

    /**
     * Test the queen has a file on the board.
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The position must be on a standard size chess board.
     */
    public function testQueenHasFileOnBoard()
    {
        $this->markTestSkipped();
        placeQueen(4, 8);
    }

    /**
     * Test if queens can attack each other.
     */
    public function testQueensCanAttack()
    {
        $this->markTestSkipped();
        $this->assertFalse(canAttack([2, 4], [6, 6]));
    }

    /**
     * Test if queens can attack each other on the same rank.
     */
    public function testQueensCanAttackOnSameRank()
    {
        $this->markTestSkipped();
        $this->assertTrue(canAttack([2, 4], [2, 6]));
    }

    /**
     * Test if queens can attack each other on the same file.
     */
    public function testQueensCanAttackOnSameFile()
    {
        $this->markTestSkipped();
        $this->assertTrue(canAttack([4, 5], [2, 5]));
    }

    /**
     * Test if queens can attack each other on the first diagonal.
     */
    public function testQueensCanAttackOnFirstDiagonal()
    {
        $this->markTestSkipped();
        $this->assertTrue(canAttack([2, 2], [0, 4]));
    }

    /**
     * Test if queens can attack each other on the second diagonal.
     */
    public function testQueensCanAttackOnSecondDiagonal()
    {
        $this->markTestSkipped();
        $this->assertTrue(canAttack([2, 2], [3, 1]));
    }

    /**
     * Test if queens can attack each other on the third diagonal.
     */
    public function testQueensCanAttackOnThirdDiagonal()
    {
        $this->markTestSkipped();
        $this->assertTrue(canAttack([2, 2], [1, 1]));
    }

    /**
     * Test if queens can attack each other on the fourth diagonal.
     */
    public function testQueensCanAttackOnFourthDiagonal()
    {
        $this->markTestSkipped();
        $this->assertTrue(canAttack([2, 2], [5, 5]));
    }
}
