<?php

class LuhnValidatorTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'luhn.php';
    }

    public function testSingleDigitInvalid() : void
    {
        $this->assertFalse(isValid("1"));
    }

    public function testSingleZeroInvalid() : void
    {
        $this->assertFalse(isValid("0"));
    }

    public function testSimpleValidNumber() : void
    {
        $this->assertTrue(isValid("59"));
    }

    public function testSpaceHandling() : void
    {
        $this->assertTrue(isValid(" 5 9 "));
    }

    public function testValidCanadianSocialInsuranceNumber() : void
    {
        $this->assertTrue(isValid("046 454 286"));
    }

    public function testInvalidCanadianSocialInsuranceNumber() : void
    {
        $this->assertFalse(isValid("046 454 287"));
    }

    public function testInvalidCreditCard() : void
    {
        $this->assertFalse(isValid("8273 1232 7352 0569"));
    }

    public function testNonDigitCharacterInValidStringInvalidatesTheString() : void
    {
        $this->assertFalse(isValid("046a 454 286"));
    }

    public function testThatStringContainingSymbolsIsInvalid() : void
    {
        $this->assertFalse(isValid("055£ 444$ 285"));
    }

    public function testThatStringContainingPunctuationIsInvalid() : void
    {
        $this->assertFalse(isValid("055-444-285"));
    }

    public function testSpaceAndSingleZeroIsInvalid() : void
    {
        $this->assertFalse(isValid(" 0"));
    }

    public function testMultipleZerosIsValid() : void
    {
        $this->assertTrue(isValid(" 00000"));
    }

    public function testThatDoublingNineIsHandledCorrectly() : void
    {
        $this->assertTrue(isValid("091"));
    }

    public function testThatStringContainingSymbolsWhichCouldBeZeroIsInvalid() : void
    {
        $this->assertFalse(isValid(" ABCDEF"));
    }
}
