<?php

class SquaresTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'difference-of-squares.php';
    }

    public function testSquareOfSumTo5() : void
    {
        $this->assertEquals(225, squareOfSum(5));
    }

    public function testSumOfSquaresTo5() : void
    {
        $this->assertEquals(55, sumOfSquares(5));
    }

    public function testDifferenceOfSumTo5() : void
    {
        $this->assertEquals(170, difference(5));
    }

    public function testSquareOfSumTo10() : void
    {
        $this->assertEquals(3025, squareOfSum(10));
    }

    public function testSumOfSquaresTo10() : void
    {
        $this->assertEquals(385, sumOfSquares(10));
    }

    public function testDifferenceOfSumTo10() : void
    {
        $this->assertEquals(2640, difference(10));
    }

    public function testSquareOfSumTo100() : void
    {
        $this->assertEquals(25502500, squareOfSum(100));
    }

    public function testSumOfSquaresTo100() : void
    {
        $this->assertEquals(338350, sumOfSquares(100));
    }

    public function testDifferenceOfSumTo100() : void
    {
        $this->assertEquals(25164150, difference(100));
    }
}
