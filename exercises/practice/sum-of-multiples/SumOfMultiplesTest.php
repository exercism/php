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

class SumOfMultiplesTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'SumOfMultiples.php';
    }

    public function testSumToOne(): void
    {
        $this->assertEquals(0, sumOfMultiples(1, [3, 5]));
    }

    public function testSumToThree(): void
    {
        $this->assertEquals(3, sumOfMultiples(4, [3, 5]));
    }

    public function testSumToTen(): void
    {
        $this->assertEquals(23, sumOfMultiples(10, [3, 5]));
    }

    public function testSumToTwenty(): void
    {
        $this->assertEquals(78, sumOfMultiples(20, [3, 5]));
    }

    public function testSumToHundred(): void
    {
        $this->assertEquals(2318, sumOfMultiples(100, [3, 5]));
    }

    public function testSumToThousand(): void
    {
        $this->assertEquals(233168, sumOfMultiples(1000, [3, 5]));
    }

    public function testConfigureToTwenty(): void
    {
        $this->assertEquals(51, sumOfMultiples(20, [7, 13, 17]));
    }

    public function testConfigureToFifteen(): void
    {
        $this->assertEquals(30, sumOfMultiples(15, [4, 6]));
    }

    public function testConfigureToOneFifty(): void
    {
        $this->assertEquals(4419, sumOfMultiples(150, [5, 6, 8]));
    }

    public function testConfigureToFortySeven(): void
    {
        $this->assertEquals(2203160, sumOfMultiples(10000, [43, 47]));
    }

    public function testMultiplesOfOneToHundred(): void
    {
        $this->assertEquals(4950, sumOfMultiples(100, [1]));
    }

    public function testMultiplesOfEmptyList(): void
    {
        $this->assertEquals(0, sumOfMultiples(1000, [0]));
    }
}
