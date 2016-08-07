<?php

require "phone-number.php";

class PhoneNumberTest extends \PHPUnit_Framework_TestCase
{
    public function testCleansNumber()
    {
        $number = new phoneNumber('(123) 456-7890');
        $this->assertEquals('1234567890', $number->number());
    }

    /**
     * @depends testCleansNumber
     */
    public function testCleansADifferentNumber()
    {
        $this->markTestSkipped();
        $number = new phoneNumber('(987) 654-3210');
        $this->assertEquals('9876543210', $number->number());
    }

    /**
     * @depends testCleansADifferentNumber
     */
    public function testCleansNumberWithDots()
    {
        $this->markTestSkipped();
        $number = new phoneNumber('456.123.7890');
        $this->assertEquals('4561237890', $number->number());
    }

    /**
     * @depends testCleansNumberWithDots
     *
     * @expectedException InvalidArgumentException
     */
    public function testInvalidWithLettersInPlaceOfNumbers()
    {
        $this->markTestSkipped();
        $number = new phoneNumber('123-abc-1234');
    }

    /**
     * @depends testInvalidWithLettersInPlaceOfNumbers
     *
     * @expectedException InvalidArgumentException
     */
    public function testInvalidWhen9Digits()
    {
        $this->markTestSkipped();
        $number = new phoneNumber('123456789');
    }

    /**
     * @depends testInvalidWhen9Digits
     */
    public function testValidWhen11DigitsAndFirstIs1()
    {
        $this->markTestSkipped();
        $number = new phoneNumber('19876543210');
        $this->assertEquals('9876543210', $number->number());
    }

    /**
     * @depends testValidWhen11DigitsAndFirstIs1
     */
    public function testValidWhen10DigitsAndAreaCodeStartsWith1()
    {
        $this->markTestSkipped();
        $number = new phoneNumber('1234567890');
        $this->assertEquals('1234567890', $number->number());
    }

    /**
     * @depends testValidWhen10DigitsAndAreaCodeStartsWith1
     *
     * @expectedException InvalidArgumentException
     */
    public function testInvalidWhen11Digits()
    {
        $this->markTestSkipped();
        $number = new phoneNumber('21234567890');
    }

    /**
     * @depends testInvalidWhen11Digits
     *
     * @expectedException InvalidArgumentException
     */
    public function testInvalidWhen12DigitsAndFirstIs1()
    {
        $this->markTestSkipped();
        $number = new phoneNumber('112345678901');
    }

    /**
     * @depends testInvalidWhen12DigitsAndFirstIs1
     *
     * @expectedException InvalidArgumentException
     */
    public function testInvalidWhen10DigitsWithExtraLetters()
    {
        $this->markTestSkipped();
        $number = new phoneNumber('1a2a3a4a5a6a7a8a9a0a');
    }

    /**
     * @depends testInvalidWhen10DigitsWithExtraLetters
     */
    public function testAreaCode()
    {
        $this->markTestSkipped();
        $number = new phoneNumber('1234567890');
        $this->assertEquals('123', $number->areaCode());
    }

    /**
     * @depends testAreaCode
     */
    public function testDifferentAreaCode()
    {
        $this->markTestSkipped();
        $number = new phoneNumber('9876543210');
        $this->assertEquals('987', $number->areaCode());
    }

    /**
     * @depends testDifferentAreaCode
     */
    public function testPrettyPrint()
    {
        $this->markTestSkipped();
        $number = new phoneNumber('5551234567');
        $this->assertEquals('(555) 123-4567', $number->prettyPrint());
    }

    /**
     * @depends testPrettyPrint
     */
    public function testPrettyPrintWithFullUsPhoneNumber()
    {
        $this->markTestSkipped();
        $number = new phoneNumber('11234567890');
        $this->assertEquals('(123) 456-7890', $number->prettyPrint());
    }
}
