<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class PalindromeProductsTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'PalindromeProducts.php';
    }

    /**
     * uuid: 5cff78fe-cf02-459d-85c2-ce584679f887
     */
    #[TestDox('find the smallest palindrome from single digit factors')]
    public function testFindsTheSmallestPalindromeFromSingleDigitFactors(): void
    {
        [$value, $factors] = smallest(1, 9);
        $this->assertEquals($value, 1);
        $this->assertEquals($factors, [
            [1, 1],
        ]);
    }

    /**
     * uuid: 0853f82c-5fc4-44ae-be38-fadb2cced92d
     */
    #[TestDox('find the largest palindrome from single digit factors')]
    public function testFindsTheLargestPalindromeFromSingleDigitFactors(): void
    {
        [$value, $factors] = largest(1, 9);
        $this->assertEquals($value, 9);
        $this->assertEquals($factors, [
            [1, 9],
            [3, 3],
        ]);
    }

    /**
     * uuid: 66c3b496-bdec-4103-9129-3fcb5a9063e1
     */
    #[TestDox('find the smallest palindrome from double digit factors')]
    public function testFindTheSmallestPalindromeFromDoubleDigitFactors(): void
    {
        [$value, $factors] = smallest(10, 99);
        $this->assertEquals($value, 121);
        $this->assertEquals($factors, [
            [11, 11],
        ]);
    }

    /**
     * uuid: a10682ae-530a-4e56-b89d-69664feafe53
     */
    #[TestDox('find the largest palindrome from double digit factors')]
    public function testFindTheLargestPalindromeFromDoubleDigitFactors(): void
    {
        [$value, $factors] = largest(10, 99);
        $this->assertEquals($value, 9009);
        $this->assertEquals($factors, [
            [91, 99],
        ]);
    }

    /**
     * uuid: cecb5a35-46d1-4666-9719-fa2c3af7499d
     */
    #[TestDox('find the smallest palindrome from triple digit factors')]
    public function testFindSmallestPalindromeFromTripleDigitFactors(): void
    {
        [$value, $factors] = smallest(100, 999);
        $this->assertEquals($value, 10201);
        $this->assertEquals($factors, [
            [101, 101],
        ]);
    }

    /**
     * uuid: edab43e1-c35f-4ea3-8c55-2f31dddd92e5
     */
    #[TestDox('find the largest palindrome from triple digit factors')]
    public function testFindTheLargestPalindromeFromTripleDigitFactors(): void
    {
        [$value, $factors] = largest(100, 999);
        $this->assertEquals($value, 906609);
        $this->assertEquals($factors, [
            [913, 993],
        ]);
    }

    /**
     * uuid: 4f802b5a-9d74-4026-a70f-b53ff9234e4e
     */
    #[TestDox('find the smallest palindrome from four digit factors')]
    public function testFindSmallestPalindromeFromFourDigitFactors(): void
    {
        [$value, $factors] = smallest(1000, 9999);
        $this->assertEquals($value, 1002001);
        $this->assertEquals($factors, [
            [1001, 1001],
        ]);
    }

    /**
     * uuid: 787525e0-a5f9-40f3-8cb2-23b52cf5d0be
     */
    #[TestDox('find the largest palindrome from four digit factors')]
    public function testFindTheLargestPalindromeFromFourDigitFactors(): void
    {
        [$value, $factors] = largest(1000, 9999);
        $this->assertEquals($value, 99000099);
        $this->assertEquals($factors, [
            [9901, 9999],
        ]);
    }

    /**
     * uuid: 58fb1d63-fddb-4409-ab84-a7a8e58d9ea0
     */
    #[TestDox('empty result for smallest if no palindrome in the range')]
    public function testEmptyResultForSmallestIfNoPalindromeInTheRange(): void
    {
        $this->expectException(Exception::class);
        smallest(1002, 1003);
    }


    /**
     * uuid: 9de9e9da-f1d9-49a5-8bfc-3d322efbdd02
     */
    #[TestDox('empty result for largest if no palindrome in the range')]
    public function testEmptyResultForLargestIfNoPalindromeInTheRange(): void
    {
        $this->expectException(Exception::class);
        largest(15, 15);
    }


    /**
     * uuid: 12e73aac-d7ee-4877-b8aa-2aa3dcdb9f8a
     */
    #[TestDox('error result for smallest if min is more than max')]
    public function testErrorResultForSmallestIfMinIsMoreThanMax(): void
    {
        $this->expectException(Exception::class);
        smallest(10000, 1);
    }


    /**
     * uuid: eeeb5bff-3f47-4b1e-892f-05829277bd74
     */
    #[TestDox('error result for largest if min is more than max')]
    public function testErrorResultForLargestIfMinIsMoreThanMax(): void
    {
        $this->expectException(Exception::class);
        largest(2, 1);
    }

    /**
     * uuid: 16481711-26c4-42e0-9180-e2e4e8b29c23
     */
    #[TestDox('smallest product does not use the smallest factor')]
    public function testSmallestProductDoesNotUseTheSmallestFactor(): void
    {
        [$value, $factors] = smallest(3215, 4000);
        $this->assertEquals(10988901, $value);
        $this->assertEquals([
            [3297, 3333],
        ], $factors);
    }
}
