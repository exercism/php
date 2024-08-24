<?php

declare(strict_types=1);

class LuhnTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Luhn.php';
    }

    /**
     * uuid: 792a7082-feb7-48c7-b88b-bbfec160865e
     * @testdox Single digit strings can not be valid
     */
    public function testSingleDigitStringsCanNotBeValid(): void
    {
        $this->assertFalse(isValid("1"));
    }

    /**
     * uuid: 698a7924-64d4-4d89-8daa-32e1aadc271e
     * @testdox A single zero is invalid
     */
    public function testASingleZeroIsInvalid(): void
    {
        $this->assertFalse(isValid("0"));
    }

    /**
     * uuid: 73c2f62b-9b10-4c9f-9a04-83cee7367965
     * @testdox A simple valid SIN that remains valid if reversed
     */
    public function testASimpleValidSINThatRemainsValidIfReversed(): void
    {
        $this->assertTrue(isValid("059"));
    }

    /**
     * uuid: 9369092e-b095-439f-948d-498bd076be11
     * @testdox A simple valid SIN that becomes invalid if reversed
     */
    public function testASimpleValidSINThatBecomesInvalidIfReversed(): void
    {
        $this->assertTrue(isValid("59"));
    }

    /**
     * uuid: 8f9f2350-1faf-4008-ba84-85cbb93ffeca
     * @testdox A valid Canadian SIN
     */
    public function testAValidCanadianSIN(): void
    {
        $this->assertTrue(isValid("055 444 285"));
    }

    /**
     * uuid: 1cdcf269-6560-44fc-91f6-5819a7548737
     * @testdox Invalid Canadian SIN
     */
    public function testInvalidCanadianSIN(): void
    {
        $this->assertFalse(isValid("055 444 286"));
    }

    /**
     * uuid: 656c48c1-34e8-4e60-9a5a-aad8a367810a
     * @testdox Invalid credit card
     */
    public function testInvalidCreditCard(): void
    {
        $this->assertFalse(isValid("8273 1232 7352 0569"));
    }

    /**
     * uuid: 20e67fad-2121-43ed-99a8-14b5b856adb9
     * @testdox Invalid long number with an even remainder
     */
    public function testInvalidLongNumberWithAnEvenRemainder(): void
    {
        $this->assertFalse(isValid("1 2345 6789 1234 5678 9012"));
    }

    /**
     * uuid: 7e7c9fc1-d994-457c-811e-d390d52fba5e
     * @testdox Invalid long number with a remainder divisible by 5
     */
    public function testInvalidLongNumberWithARemainderDivisibleBy5(): void
    {
        $this->assertFalse(isValid("1 2345 6789 1234 5678 9013"));
    }

    /**
     * uuid: ad2a0c5f-84ed-4e5b-95da-6011d6f4f0aa
     * @testdox Valid number with an even amount of digits
     */
    public function testValidNumberWithAnEvenAmountOfDigits(): void
    {
        $this->assertTrue(isValid("095 245 88"));
    }

    /**
     * uuid: ef081c06-a41f-4761-8492-385e13c8202d
     * @testdox Valid number with an odd amount of spaces
     */
    public function testValidNumberWithAnOddAmountOfSpaces(): void
    {
        $this->assertTrue(isValid("234 567 891 234"));
    }

    /**
     * uuid: bef66f64-6100-4cbb-8f94-4c9713c5e5b2
     * @testdox Valid strings with a non-digit added at the end become invalid
     */
    public function testValidStringsWithANonDigitAddedAtTheEndBecomeInvalid(): void
    {
        $this->assertFalse(isValid("059a"));
    }

    /**
     * uuid: 2177e225-9ce7-40f6-b55d-fa420e62938e
     * @testdox Valid strings with punctuation included become invalid
     */
    public function testValidStringsWithPunctuationIncludedBecomeInvalid(): void
    {
        $this->assertFalse(isValid("055-444-285"));
    }

    /**
     * uuid: ebf04f27-9698-45e1-9afe-7e0851d0fe8d
     * @testdox Valid strings with symbols included become invalid
     */
    public function testValidStringsWithSymbolsIncludedBecomeInvalid(): void
    {
        $this->assertFalse(isValid("055# 444$ 285"));
    }

    /**
     * uuid: 08195c5e-ce7f-422c-a5eb-3e45fece68ba
     * @testdox Single zero with space is invalid
     */
    public function testSingleZeroWithSpaceIsInvalid(): void
    {
        $this->assertFalse(isValid(" 0"));
    }

    /**
     * uuid: 12e63a3c-f866-4a79-8c14-b359fc386091
     * @testdox More than a single zero is valid
     */
    public function testMoreThanASingleZeroIsValid(): void
    {
        $this->assertTrue(isValid("0000 0"));
    }

    /**
     * uuid: ab56fa80-5de8-4735-8a4a-14dae588663e
     * @testdox Input digit 9 is correctly converted to output digit 9
     */
    public function testInputDigit9IsCorrectlyConvertedToOutputDigit9(): void
    {
        $this->assertTrue(isValid("091"));
    }

    /**
     * uuid: b9887ee8-8337-46c5-bc45-3bcab51bc36f
     * @testdox Very long input is valid
     */
    public function testVeryLongInputIsValid(): void
    {
        $this->assertTrue(isValid("9999999999 9999999999 9999999999 9999999999"));
    }

    /**
     * uuid: 8a7c0e24-85ea-4154-9cf1-c2db90eabc08
     * @testdox valid luhn with an odd number of digits and non zero first digit
     */
    public function testValidLuhnWithAnOddNumberOfDigitsAndNonZeroFirstDigit(): void
    {
        $this->assertTrue(isValid("109"));
    }

    /**
     * uuid: 39a06a5a-5bad-4e0f-b215-b042d46209b1
     * @testdox using ascii value for non-doubled non-digit isn't allowed
     */
    public function testUsingAsciiValueForNonDoubledNonDigitIsntAllowed(): void
    {
        $this->assertFalse(isValid("055b 444 285"));
    }

    /**
     * uuid: f94cf191-a62f-4868-bc72-7253114aa157
     * @testdox using ascii value for doubled non-digit isn't allowed
     */
    public function testUsingAsciiValueForDoubledNonDigitIsntAllowed(): void
    {
        $this->assertFalse(isValid(":9"));
    }

    /**
     * uuid: 8b72ad26-c8be-49a2-b99c-bcc3bf631b33
     * @testdox non-numeric, non-space char in the middle with a sum that's divisible by 10 isn't allowed
     */
    public function testNonNumericNonSpaceCharInMiddleWithSumDivisibleBy10IsntAllowed(): void
    {
        $this->assertFalse(isValid("59%59"));
    }
}
