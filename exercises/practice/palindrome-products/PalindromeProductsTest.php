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

class PalindromeProductsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'PalindromeProducts.php';
    }

    public function testFindsTheSmallestPalindromeFromSingleDigitFactors(): void
    {
        [$value, $factors] = smallest(1, 9);
        $this->assertEquals($value, 1);
        $this->assertEquals($factors, [
            [1, 1],
        ]);
    }

    public function testFindsTheLargestPalindromeFromSingleDigitFactors(): void
    {
        [$value, $factors] = largest(1, 9);
        $this->assertEquals($value, 9);
        $this->assertEquals($factors, [
            [1, 9],
            [3, 3],
        ]);
    }

    public function testFindTheSmallestPalindromeFromDoubleDigitFactors(): void
    {
        [$value, $factors] = smallest(10, 99);
        $this->assertEquals($value, 121);
        $this->assertEquals($factors, [
            [11, 11],
        ]);
    }

    public function testFindTheLargestPalindromeFromDoubleDigitFactors(): void
    {
        [$value, $factors] = largest(10, 99);
        $this->assertEquals($value, 9009);
        $this->assertEquals($factors, [
            [91, 99],
        ]);
    }

    public function testFindSmallestPalindromeFromTripleDigitFactors(): void
    {
        [$value, $factors] = smallest(100, 999);
        $this->assertEquals($value, 10201);
        $this->assertEquals($factors, [
            [101, 101],
        ]);
    }

    public function testFindTheLargestPalindromeFromTripleDigitFactors(): void
    {
        [$value, $factors] = largest(100, 999);
        $this->assertEquals($value, 906609);
        $this->assertEquals($factors, [
            [913, 993],
        ]);
    }

    public function testFindSmallestPalindromeFromFourDigitFactors(): void
    {
        [$value, $factors] = smallest(1000, 9999);
        $this->assertEquals($value, 1002001);
        $this->assertEquals($factors, [
            [1001, 1001],
        ]);
    }

    public function testFindTheLargestPalindromeFromFourDigitFactors(): void
    {
        [$value, $factors] = largest(1000, 9999);
        $this->assertEquals($value, 99000099);
        $this->assertEquals($factors, [
            [9901, 9999],
        ]);
    }

    public function testEmptyResultForSmallestIfNoPalindromeInTheRange(): void
    {
        $this->expectException(Exception::class);
        smallest(1002, 1003);
    }

    public function testEmptyResultForLargestIfNoPalindromeInTheRange(): void
    {
        $this->expectException(Exception::class);
        largest(15, 15);
    }

    public function testErrorResultForSmallestIfMinIsMoreThanMax(): void
    {
        $this->expectException(Exception::class);
        smallest(10000, 1);
    }

    public function testErrorResultForLargestIfMinIsMoreThanMax(): void
    {
        $this->expectException(Exception::class);
        largest(2, 1);
    }
}
