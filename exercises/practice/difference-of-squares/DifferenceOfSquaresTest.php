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

class DifferenceOfSquaresTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'DifferenceOfSquares.php';
    }

    public function testSquareOfSumTo5(): void
    {
        $this->assertEquals(225, squareOfSum(5));
    }

    public function testSumOfSquaresTo5(): void
    {
        $this->assertEquals(55, sumOfSquares(5));
    }

    public function testDifferenceOfSumTo5(): void
    {
        $this->assertEquals(170, difference(5));
    }

    public function testSquareOfSumTo10(): void
    {
        $this->assertEquals(3025, squareOfSum(10));
    }

    public function testSumOfSquaresTo10(): void
    {
        $this->assertEquals(385, sumOfSquares(10));
    }

    public function testDifferenceOfSumTo10(): void
    {
        $this->assertEquals(2640, difference(10));
    }

    public function testSquareOfSumTo100(): void
    {
        $this->assertEquals(25502500, squareOfSum(100));
    }

    public function testSumOfSquaresTo100(): void
    {
        $this->assertEquals(338350, sumOfSquares(100));
    }

    public function testDifferenceOfSumTo100(): void
    {
        $this->assertEquals(25164150, difference(100));
    }
}
