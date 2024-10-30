<?php

declare(strict_types=1);

class ArmstrongNumbersTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'ArmstrongNumbers.php';
    }

    /**
     * uuid: c1ed103c-258d-45b2-be73-d8c6d9580c7b
     * @testdox Zero is an Armstrong number
     */
    public function testZero(): void
    {
        $this->assertTrue(isArmstrongNumber(0));
    }

    /**
     * uuid: 579e8f03-9659-4b85-a1a2-d64350f6b17a
     * @testdox Single-digit numbers are Armstrong numbers
     */
    public function testSingleDigit(): void
    {
        $this->assertTrue(isArmstrongNumber(5));
    }

    /**
     * uuid: 2d6db9dc-5bf8-4976-a90b-b2c2b9feba60
     * @testdox There are no two-digit Armstrong numbers
     */
    public function testDoubleDigit(): void
    {
        $this->assertFalse(isArmstrongNumber(10));
    }

    /**
     * uuid: 509c087f-e327-4113-a7d2-26a4e9d18283
     * @testdox Three-digit number that is an Armstrong number
     */
    public function testThreeDigitIsArmstrongNumber(): void
    {
        $this->assertTrue(isArmstrongNumber(153));
    }

    /**
     * uuid: 7154547d-c2ce-468d-b214-4cb953b870cf
     * @testdox Three-digit number that is not an Armstrong number
     */
    public function testThreeDigitIsNotArmstrongNumber(): void
    {
        $this->assertFalse(isArmstrongNumber(100));
    }

    /**
     * uuid: 6bac5b7b-42e9-4ecb-a8b0-4832229aa103
     * @testdox Four-digit number that is an Armstrong number
     */
    public function testFourDigitIsArmstrongNumber(): void
    {
        $this->assertTrue(isArmstrongNumber(9474));
    }

    /**
     * uuid: eed4b331-af80-45b5-a80b-19c9ea444b2e
     * @testdox Four-digit number that is not an Armstrong number
     */
    public function testFourDigitIsNotArmstrongNumber(): void
    {
        $this->assertFalse(isArmstrongNumber(9475));
    }

    /**
     * uuid: f971ced7-8d68-4758-aea1-d4194900b864
     * @testdox Seven-digit number that is an Armstrong number
     */
    public function testSevenDigitIsArmstrongNumber(): void
    {
        $this->assertTrue(isArmstrongNumber(9926315));
    }

    /**
     * uuid: 7ee45d52-5d35-4fbd-b6f1-5c8cd8a67f18
     * @testdox Seven-digit number that is not an Armstrong number
     */
    public function testSevenDigitIsNotArmstrongNumber(): void
    {
        $this->assertFalse(isArmstrongNumber(9926314));
    }
}
