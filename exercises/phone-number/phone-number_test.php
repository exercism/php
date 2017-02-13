<?php

require "phone-number.php";

class PhoneNumberTest extends PHPUnit\Framework\TestCase
{
    public function testCleansNumber()
    {
        $number = new PhoneNumber('(123) 456-7890');
        $this->assertEquals('1234567890', $number->number());
    }

    public function testCleansNumberWithDots()
    {
        $this->markTestSkipped();
        $number = new PhoneNumber('456.123.7890');
        $this->assertEquals('4561237890', $number->number());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidWithLettersInPlaceOfNumbers()
    {
        $this->markTestSkipped();
        $number = new PhoneNumber('123-abc-1234');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidWhen9Digits()
    {
        $this->markTestSkipped();
        $number = new PhoneNumber('123456789');
    }

    public function testValidWhen11DigitsAndFirstIs1()
    {
        $this->markTestSkipped();
        $number = new PhoneNumber('19876543210');
        $this->assertEquals('9876543210', $number->number());
    }

    public function testValidWhen10DigitsAndAreaCodeStartsWith1()
    {
        $this->markTestSkipped();
        $number = new PhoneNumber('1234567890');
        $this->assertEquals('1234567890', $number->number());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidWhen11Digits()
    {
        $this->markTestSkipped();
        $number = new PhoneNumber('21234567890');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidWhen12DigitsAndFirstIs1()
    {
        $this->markTestSkipped();
        $number = new PhoneNumber('112345678901');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidWhen10DigitsWithExtraLetters()
    {
        $this->markTestSkipped();
        $number = new PhoneNumber('1a2a3a4a5a6a7a8a9a0a');
    }

    public function testAreaCode()
    {
        $this->markTestSkipped();
        $number = new PhoneNumber('1234567890');
        $this->assertEquals('123', $number->areaCode());
    }

    public function testPrettyPrint()
    {
        $this->markTestSkipped();
        $number = new PhoneNumber('5551234567');
        $this->assertEquals('(555) 123-4567', $number->prettyPrint());
    }

    public function testPrettyPrintWithFullUsPhoneNumber()
    {
        $this->markTestSkipped();
        $number = new PhoneNumber('11234567890');
        $this->assertEquals('(123) 456-7890', $number->prettyPrint());
    }
}
