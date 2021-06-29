<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class LuhnTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Luhn.php';
    }

    public function testSingleDigitInvalid(): void
    {
        $this->assertFalse(isValid("1"));
    }

    public function testSingleZeroInvalid(): void
    {
        $this->assertFalse(isValid("0"));
    }

    public function testSimpleValidNumber(): void
    {
        $this->assertTrue(isValid("59"));
    }

    public function testSpaceHandling(): void
    {
        $this->assertTrue(isValid(" 5 9 "));
    }

    public function testValidCanadianSocialInsuranceNumber(): void
    {
        $this->assertTrue(isValid("046 454 286"));
    }

    public function testInvalidCanadianSocialInsuranceNumber(): void
    {
        $this->assertFalse(isValid("046 454 287"));
    }

    public function testInvalidCreditCard(): void
    {
        $this->assertFalse(isValid("8273 1232 7352 0569"));
    }

    public function testNonDigitCharacterInValidStringInvalidatesTheString(): void
    {
        $this->assertFalse(isValid("046a 454 286"));
    }

    public function testThatStringContainingSymbolsIsInvalid(): void
    {
        $this->assertFalse(isValid("055£ 444$ 285"));
    }

    public function testThatStringContainingPunctuationIsInvalid(): void
    {
        $this->assertFalse(isValid("055-444-285"));
    }

    public function testSpaceAndSingleZeroIsInvalid(): void
    {
        $this->assertFalse(isValid(" 0"));
    }

    public function testMultipleZerosIsValid(): void
    {
        $this->assertTrue(isValid(" 00000"));
    }

    public function testThatDoublingNineIsHandledCorrectly(): void
    {
        $this->assertTrue(isValid("091"));
    }

    public function testThatStringContainingSymbolsWhichCouldBeZeroIsInvalid(): void
    {
        $this->assertFalse(isValid(" ABCDEF"));
    }
}
