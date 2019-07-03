<?php

require "phone-number.php";

class PhoneNumberTest extends PHPUnit\Framework\TestCase
{
    public function testCleansNumber(): void
    {
        $number = new PhoneNumber('(123) 456-7890');
        $this->assertEquals('1234567890', $number->number());
    }

    public function testCleansNumberWithDots(): void
    {
        $number = new PhoneNumber('456.123.7890');
        $this->assertEquals('4561237890', $number->number());
    }

    public function testInvalidWithLettersInPlaceOfNumbers(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new PhoneNumber('123-abc-1234');
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

    public function testValidWhen10DigitsAndAreaCodeStartsWith1(): void
    {
        $number = new PhoneNumber('1234567890');
        $this->assertEquals('1234567890', $number->number());
    }

    public function testInvalidWhen11Digits(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new PhoneNumber('21234567890');
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

    public function testAreaCode(): void
    {
        $number = new PhoneNumber('1234567890');
        $this->assertEquals('123', $number->areaCode());
    }

    public function testPrettyPrint(): void
    {
        $number = new PhoneNumber('5551234567');
        $this->assertEquals('(555) 123-4567', $number->prettyPrint());
    }

    public function testPrettyPrintWithFullUsPhoneNumber(): void
    {
        $number = new PhoneNumber('11234567890');
        $this->assertEquals('(123) 456-7890', $number->prettyPrint());
    }
}
