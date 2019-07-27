<?php

class ArmstrongNumbersTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'armstrong-numbers.php';
    }

    public function testZero() : void
    {
        $this->assertTrue(isArmstrongNumber(0));
    }

    public function testSingleDigit() : void
    {
        $this->assertTrue(isArmstrongNumber(5));
    }

    public function testDoubleDigit() : void
    {
        $this->assertFalse(isArmstrongNumber(10));
    }

    public function testThreeDigitIsArmstrongNumber() : void
    {
        $this->assertTrue(isArmstrongNumber(153));
    }

    public function testThreeDigitIsNotArmstrongNumber() : void
    {
        $this->assertFalse(isArmstrongNumber(100));
    }

    public function testFourDigitIsArmstrongNumber() : void
    {
        $this->assertTrue(isArmstrongNumber(9474));
    }

    public function testFourDigitIsNotArmstrongNumber() : void
    {
        $this->assertFalse(isArmstrongNumber(9475));
    }

    public function testSevenDigitIsArmstrongNumber() : void
    {
        $this->assertTrue(isArmstrongNumber(9926315));
    }

    public function testSevenDigitIsNotArmstrongNumber() : void
    {
        $this->assertFalse(isArmstrongNumber(9926314));
    }
}
