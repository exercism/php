<?php

declare(strict_types=1);

class DifferenceOfSquaresTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'DifferenceOfSquares.php';
    }

    /**
     * uuid e46c542b-31fc-4506-bcae-6b62b3268537
     * @testdox Square of sum 1
     */
    public function testSquareOfSumTo1(): void
    {
        $this->assertEquals(1, squareOfSum(1));
    }

    /**
     * uuid 9b3f96cb-638d-41ee-99b7-b4f9c0622948
     * @testdox Square of sum 5
     */
    public function testSquareOfSumTo5(): void
    {
        $this->assertEquals(225, squareOfSum(5));
    }

    /**
     * uuid 54ba043f-3c35-4d43-86ff-3a41625d5e86
     * @testdox Square of sum 100
     */
    public function testSquareOfSumTo100(): void
    {
        $this->assertEquals(25502500, squareOfSum(100));
    }

    /**
     * uuid 01d84507-b03e-4238-9395-dd61d03074b5
     * @testdox Sum of squares 1
     */
    public function testSumOfSquaresTo1(): void
    {
        $this->assertEquals(1, sumOfSquares(1));
    }

    /**
     * uuid c93900cd-8cc2-4ca4-917b-dd3027023499
     * @testdox Sum of squares 5
     */
    public function testSumOfSquaresTo5(): void
    {
        $this->assertEquals(55, sumOfSquares(5));
    }

    /**
     * uuid 94807386-73e4-4d9e-8dec-69eb135b19e4
     * @testdox Sum of squares 100
     */
    public function testSumOfSquaresTo100(): void
    {
        $this->assertEquals(338350, sumOfSquares(100));
    }

    /**
     * uuid 44f72ae6-31a7-437f-858d-2c0837adabb6
     * @testdox Difference of squares 1
     */
    public function testDifferenceOfSumTo1(): void
    {
        $this->assertEquals(0, difference(1));
    }

    /**
     * uuid 005cb2bf-a0c8-46f3-ae25-924029f8b00b
     * @testdox Difference of squares 5
     */
    public function testDifferenceOfSumTo5(): void
    {
        $this->assertEquals(170, difference(5));
    }

    /**
     * uuid b1bf19de-9a16-41c0-a62b-1f02ecc0b036
     * @testdox Difference of squares 100
     */
    public function testDifferenceOfSumTo100(): void
    {
        $this->assertEquals(25164150, difference(100));
    }
}
