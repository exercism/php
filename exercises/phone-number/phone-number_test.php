<?php

class PhoneNumberTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'phone-number.php';
    }

    public function testCleansTheNumber() : void
    {
        $number = new PhoneNumber('(223) 456-7890');
        $this->assertEquals('2234567890', $number->number());
    }

    public function testCleansTheNumberWithDots() : void
    {
        $number = new PhoneNumber('223.456.7890');
        $this->assertEquals('2234567890', $number->number());
    }

    public function testCleansTheNumberWithMultipleSpaces() : void
    {
        $number = new PhoneNumber('223 456   7890   ');
        $this->assertEquals('2234567890', $number->number());
    }

    public function testInvalidWhen9Digits() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('incorrect number of digits');

        new PhoneNumber('123456789');
    }

    public function testInvalidWhen11DigitsDoesNotStartWithA1() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('11 digits must start with 1');

        new PhoneNumber('22234567890');
    }

    public function testValidWhen11DigitsAndStartingWith1() : void
    {
        $number = new PhoneNumber('12234567890');
        $this->assertEquals('2234567890', $number->number());
    }

    public function testValidWhen11DigitsAndStartingWith1EvenWithPunctuation() : void
    {
        $number = new PhoneNumber('+1 (223) 456-7890');
        $this->assertEquals('2234567890', $number->number());
    }

    public function testInvalidWhenMoreThan11Digits() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('more than 11 digits');

        new PhoneNumber('321234567890');
    }

    public function testInvalidWithLetters() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('letters not permitted');

        new PhoneNumber('123-abc-7890');
    }

    public function testInvalidWithPunctuation() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('punctuations not permitted');

        new PhoneNumber('123-@:!-7890');
    }

    public function testInvalidIfAreaCodeStartsWith0() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with zero');

        new PhoneNumber('(023) 456-7890');
    }

    public function testInvalidIfAreaCodeStartsWith1() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with one');

        new PhoneNumber('(123) 456-7890');
    }

    public function testInvalidIfExchangeCodeStartsWith0() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with zero');

        new PhoneNumber('(223) 056-7890');
    }

    public function testInvalidIfExchangeCodeStartsWith1() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with one');

        new PhoneNumber('(223) 156-7890');
    }

    public function testInvalidIfAreaCodeStartsWith0OnValid11DigitNumber() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with zero');

        new PhoneNumber('1 (023) 456-7890');
    }

    public function testInvalidIfAreaCodeStartsWith1OnValid11DigitNumber() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with one');

        new PhoneNumber('1 (123) 456-7890');
    }

    public function testInvalidIfExchangeCodeStartsWith0OnValid11DigitNumber() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with zero');

        new PhoneNumber('1 (223) 056-7890');
    }

    public function testInvalidIfExchangeCodeStartsWith1OnValid11DigitNumber() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with one');

        new PhoneNumber('1 (223) 156-7890');
    }
}
