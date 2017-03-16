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
	$this->markTestSkipped();

        $this->assertFalse(isValid("0"));
    }

    public function testSimpleValidNumber()
    {
	$this->markTestSkipped();

        $this->assertTrue(isValid("59"));
    }

    public function testSpaceHandling()
    {
	$this->markTestSkipped();

        $this->assertTrue(isValid(" 5 9 "));
    }

    public function testValidCanadianSocialInsuranceNumber()
    {
	$this->markTestSkipped();

        $this->assertTrue(isValid("046 454 286"));
    }

    public function testInvalidCanadianSocialInsuranceNumber()
    {
	$this->markTestSkipped();

        $this->assertFalse(isValid("046 454 287"));
    }

    public function testInvalidCreditCard()
    {
	$this->markTestSkipped();

        $this->assertFalse(isValid("8273 1232 7352 0569"));
    }

    public function testNonDigitCharacterInValidStringInvalidatesTheString()
    {
	$this->markTestSkipped();

        $this->assertFalse(isValid("046a 454 286"));
    }

    public function testThatStringContainingSymbolsIsInvalid()
    {
	$this->markTestSkipped();

        $this->assertFalse(isValid("055£ 444$ 285"));
    }

    public function testThatStringContainingPunctuationIsInvalid()
    {
	$this->markTestSkipped();

        $this->assertFalse(isValid("055-444-285"));
    }

    public function testSpaceAndSingleZeroIsInvalid()
    {
	$this->markTestSkipped();

        $this->assertFalse(isValid(" 0"));
    }

    public function testMultipleZerosIsValid()
    {
	$this->markTestSkipped();

        $this->assertTrue(isValid(" 00000"));
    }

    public function testThatDoublingNineIsHandledCorrectly()
    {
	$this->markTestSkipped();

        $this->assertTrue(isValid("091"));
    }
}
