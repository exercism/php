<?php

class PalindromeProductsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'palindrome-products.php';
    }

    public function testFindsTheSmallestPalindromeFromSingleDigitFactors() : void
    {
        [ $value, $factors ] = smallest(1, 9);
        $this->assertEquals($value, 1);
        $this->assertEquals($factors, [
            [1, 1]
        ]);
    }

    public function testFindsTheLargestPalindromeFromSingleDigitFactors() : void
    {
        [ $value, $factors ] = largest(1, 9);
        $this->assertEquals($value, 9);
        $this->assertEquals($factors, [
            [1, 9],
            [3, 3]
        ]);
    }

    public function testFindTheSmallestPalindromeFromDoubleDigitFactors() : void
    {
        [ $value, $factors ] = smallest(10, 99);
        $this->assertEquals($value, 121);
        $this->assertEquals($factors, [
            [11, 11]
        ]);
    }

    public function testFindTheLargestPalindromeFromDoubleDigitFactors() : void
    {
        [ $value, $factors ] = largest(10, 99);
        $this->assertEquals($value, 9009);
        $this->assertEquals($factors, [
            [91, 99]
        ]);
    }

    public function testFindSmallestPalindromeFromTripleDigitFactors() : void
    {
        [ $value, $factors ] = smallest(100, 999);
        $this->assertEquals($value, 10201);
        $this->assertEquals($factors, [
            [101, 101]
        ]);
    }

    public function testFindTheLargestPalindromeFromTripleDigitFactors() : void
    {
        [ $value, $factors ] = largest(100, 999);
        $this->assertEquals($value, 906609);
        $this->assertEquals($factors, [
            [913, 993]
        ]);
    }

    public function testFindSmallestPalindromeFromFourDigitFactors() : void
    {
        [ $value, $factors ] = smallest(1000, 9999);
        $this->assertEquals($value, 1002001);
        $this->assertEquals($factors, [
            [1001, 1001]
        ]);
    }

    public function testFindTheLargestPalindromeFromFourDigitFactors() : void
    {
        [ $value, $factors ] = largest(1000, 9999);
        $this->assertEquals($value, 99000099);
        $this->assertEquals($factors, [
            [9901, 9999]
        ]);
    }

    public function testEmptyResultForSmallestIfNoPalindromeInTheRange() : void
    {
        $this->expectException(Exception::class);
        smallest(1002, 1003);
    }

    public function testEmptyResultForLargestIfNoPalindromeInTheRange() : void
    {
        $this->expectException(Exception::class);
        largest(15, 15);
    }

    public function testErrorResultForSmallestIfMinIsMoreThanMax() : void
    {
        $this->expectException(Exception::class);
        smallest(10000, 1);
    }

    public function testErrorResultForLargestIfMinIsMoreThanMax() : void
    {
        $this->expectException(Exception::class);
        largest(2, 1);
    }
}
