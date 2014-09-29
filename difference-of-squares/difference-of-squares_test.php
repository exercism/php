<?php

require_once "difference-of-squares.php";

class SquaresTest extends PHPUnit_Framework_TestCase
{
    public function testSquareOfSumsTo5()
    {
        $this->assertEquals(225, (new Squares(5))->squareOfSums());
    }

    public function testSumOfSquaresTo5()
    {
        $this->assertEquals(55, (new Squares(5))->sumOfSquares());
    }

    public function testDifferenceOfSumsTo5()
    {
        $this->assertEquals(170, (new Squares(5))->difference());
    }

    public function testSquareOfSumsTo10()
    {
        $this->assertEquals(3025, (new Squares(10))->squareOfSums());
    }

    public function testSumOfSquaresTo10()
    {
        $this->assertEquals(385, (new Squares(10))->sumOfSquares());
    }

    public function testDifferenceOfSumsTo10()
    {
        $this->assertEquals(2640, (new Squares(10))->difference());
    }

    public function testSquareOfSumsTo100()
    {
        $this->assertEquals(25502500, (new Squares(100))->squareOfSums());
    }

    public function testSumOfSquaresTo100()
    {
        $this->assertEquals(338350, (new Squares(100))->sumOfSquares());
    }

    public function testDifferenceOfSumsTo100()
    {
        $this->assertEquals(25164150, (new Squares(100))->difference());
    }
}
