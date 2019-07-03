<?php

require "phone-number.php";

class PhoneNumberTest extends PHPUnit\Framework\TestCase
{
    public function testValidNumberWithAreaCodeAndBracketsAndDashes(): void
    {
        $number = new PhoneNumber('+1 (613)-995-0253');
        $this->assertEquals('6139950253', $number->number());
    }

    public function testValidNumberWithAreaCode(): void
    {
        $number = new PhoneNumber('1 613 995 0253');
        $this->assertEquals('6139950253', $number->number());
    }

    public function testValidNumberWithBracketsAndDashes(): void
    {
        $number = new PhoneNumber('(613)-995-0253');
        $this->assertEquals('6139950253', $number->number());
    }

    public function testValidNumberWithDashes(): void
    {
        $number = new PhoneNumber('613-995-0253');
        $this->assertEquals('6139950253', $number->number());
    }

    public function testValidNumberWithDots(): void
    {
        $number = new PhoneNumber('613.995.0253');
        $this->assertEquals('6139950253', $number->number());
    }

    public function testInvalidWithLettersInPlaceOfNumbers(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new PhoneNumber('299-abc-6789');
    }

    public function testInvalidWhen9Digits(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new PhoneNumber('123456789');
    }

    public function testValidWhen11DigitsAndFirstIs1(): void
    {
        $number = new PhoneNumber('19876543210');
        $this->assertEquals('9876543210', $number->number());
    }

    public function testValidWhen10DigitsAndAreaCodeStartsWith2(): void
    {
        $number = new PhoneNumber('2345678901');
        $this->assertEquals('2345678901', $number->number());
    }

    public function testInvalidWhen11Digits(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new PhoneNumber('22992999999');
    }

    public function testInvalidWhen12DigitsAndFirstIs1(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new PhoneNumber('112345678901');
    }

    public function testInvalidWhen10DigitsWithExtraLetters(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new PhoneNumber('1a2a3a4a5a6a7a8a9a0a');
    }

    public function testValidAreaCodeOf10Digits(): void
    {
        $number = new PhoneNumber('2345678901');
        $this->assertEquals('234', $number->areaCode());
    }

    public function testValidAreaCodeOf11Digits(): void
    {
        $number = new PhoneNumber('12345678901');
        $this->assertEquals('234', $number->areaCode());
    }

    public function testInvalidAreaCodeStartingWith0(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new PhoneNumber('0992999999');
    }

    public function testInvalidAreaCodeStartingWith1(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new PhoneNumber('1992999999');
    }

    public function testInvalidPrefixStartingWith0(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new PhoneNumber('2990999999');
    }

    public function testInvalidPrefixStartingWith1(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new PhoneNumber('2991999999');
    }

    public function testPrettyPrintWith10Digits(): void
    {
        $number = new PhoneNumber('5552345678');
        $this->assertEquals('(555) 234-5678', $number->prettyPrint());
    }

    public function testPrettyPrintWith11Digits(): void
    {
        $number = new PhoneNumber('12345678901');
        $this->assertEquals('(234) 567-8901', $number->prettyPrint());
    }
}
