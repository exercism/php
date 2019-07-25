<?php

require_once "armstrong-numbers.php";

class ArmstrongNumbersTest extends PHPUnit\Framework\TestCase
{
    public function testZero()
    {
        $this->assertTrue(isArmstrongNumber(0));
    }

    public function testSingleDigit()
    {
        $this->assertTrue(isArmstrongNumber(5));
    }

    public function testDoubleDigit()
    {
        $this->assertFalse(isArmstrongNumber(10));
    }

    public function testThreeDigitIsArmstrongNumber()
    {
        $this->assertTrue(isArmstrongNumber(153));
    }

    public function testThreeDigitIsNotArmstrongNumber()
    {
        $this->assertFalse(isArmstrongNumber(100));
    }

    public function testFourDigitIsArmstrongNumber()
    {
        $this->assertTrue(isArmstrongNumber(9474));
    }

    public function testFourDigitIsNotArmstrongNumber()
    {
        $this->assertFalse(isArmstrongNumber(9475));
    }

    public function testSevenDigitIsArmstrongNumber()
    {
        $this->assertTrue(isArmstrongNumber(9926315));
    }

    public function testSevenDigitIsNotArmstrongNumber()
    {
        $this->assertFalse(isArmstrongNumber(9926314));
    }
}
