<?php

require "luhn.php";

class LuhnValidatorTest extends PHPUnit\Framework\TestCase
{
    public function testSingleDigitInvalid()
    {
        $this->assertFalse(isValid("1"));
    }

    public function testSingleZeroInvalid()
    {
        $this->assertFalse(isValid("0"));
    }

    public function testSimpleValidNumber()
    {
        $this->assertTrue(isValid("59"));
    }

    public function testSpaceHandling()
    {
        $this->assertTrue(isValid(" 5 9 "));
    }

    public function testValidCanadianSocialInsuranceNumber()
    {
        $this->assertTrue(isValid("046 454 286"));
    }

    public function testInvalidCanadianSocialInsuranceNumber()
    {
        $this->assertFalse(isValid("046 454 287"));
    }

    public function testInvalidCreditCard()
    {
        $this->assertFalse(isValid("8273 1232 7352 0569"));
    }

    public function testNonDigitCharacterInValidStringInvalidatesTheString()
    {
        $this->assertFalse(isValid("046a 454 286"));
    }

    public function testThatStringContainingSymbolsIsInvalid()
    {
        $this->assertFalse(isValid("055£ 444$ 285"));
    }

    public function testThatStringContainingPunctuationIsInvalid()
    {
        $this->assertFalse(isValid("055-444-285"));
    }

    public function testSpaceAndSingleZeroIsInvalid()
    {
        $this->assertFalse(isValid(" 0"));
    }

    public function testMultipleZerosIsValid()
    {
        $this->assertTrue(isValid(" 00000"));
    }

    public function testThatDoublingNineIsHandledCorrectly()
    {
        $this->assertTrue(isValid("091"));
    }

    public function testThatStringContainingSymbolsWhichCouldBeZeroIsInvalid()
    {
        $this->assertFalse(isValid(" ABCDEF"));
    }
}
