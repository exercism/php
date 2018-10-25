<?php

require "palindrome-products.php";

class PalindromeProductsTest extends PHPUnit\Framework\TestCase
{

    public function testFindsTheSmallestPalindromeFromSingleDigitFactors()
    {
        [ $value, $factors ] = smallest(1, 9);
        $this->assertEquals($value, 1);
        $this->assertEquals($factors, [
            [1, 1]
        ]);
    }

    public function testFindsTheLargestPalindromeFromSingleDigitFactors()
    {
        [ $value, $factors ] = largest(1, 9);
        $this->assertEquals($value, 9);
        $this->assertEquals($factors, [
            [1, 9],
            [3, 3]
        ]);
    }

    public function testFindTheSmallestPalindromeFromDoubleDigitFactors()
    {
        [ $value, $factors ] = smallest(10, 99);
        $this->assertEquals($value, 121);
        $this->assertEquals($factors, [
            [11, 11]
        ]);
    }

    public function testFindTheLargestPalindromeFromDoubleDigitFactors()
    {
        [ $value, $factors ] = largest(10, 99);
        $this->assertEquals($value, 9009);
        $this->assertEquals($factors, [
            [91, 99]
        ]);
    }

    public function testFindSmallestPalindromeFromTripleDigitFactors()
    {
        [ $value, $factors ] = smallest(100, 999);
        $this->assertEquals($value, 10201);
        $this->assertEquals($factors, [
            [101, 101]
        ]);
    }

    public function testFindTheLargestPalindromeFromTripleDigitFactors()
    {
        [ $value, $factors ] = largest(100, 999);
        $this->assertEquals($value, 906609);
        $this->assertEquals($factors, [
            [913, 993]
        ]);
    }

    public function testFindSmallestPalindromeFromFourDigitFactors()
    {
        [ $value, $factors ] = smallest(1000, 9999);
        $this->assertEquals($value, 1002001);
        $this->assertEquals($factors, [
            [1001, 1001]
        ]);
    }

    public function testFindTheLargestPalindromeFromFourDigitFactors()
    {
        [ $value, $factors ] = largest(1000, 9999);
        $this->assertEquals($value, 99000099);
        $this->assertEquals($factors, [
            [9901, 9999]
        ]);
    }

    public function testEmptyResultForSmallestIfNoPalindromeInTheRange()
    {
        $this->expectException(\Exception::class);
        smallest(1002, 1003);
    }

    public function testEmptyResultForLargestIfNoPalindromeInTheRange()
    {
        $this->expectException(\Exception::class);
        largest(15, 15);
    }

    public function testErrorResultForSmallestIfMinIsMoreThanMax()
    {
        $this->expectException(\Exception::class);
        smallest(10000, 1);
    }

    public function testErrorResultForLargestIfMinIsMoreThanMax()
    {
        $this->expectException(\Exception::class);
        largest(2, 1);
    }
}
