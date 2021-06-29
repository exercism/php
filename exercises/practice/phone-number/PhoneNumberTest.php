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

class PhoneNumberTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'PhoneNumber.php';
    }

    public function testCleansTheNumber(): void
    {
        $number = new PhoneNumber('(223) 456-7890');
        $this->assertEquals('2234567890', $number->number());
    }

    public function testCleansTheNumberWithDots(): void
    {
        $number = new PhoneNumber('223.456.7890');
        $this->assertEquals('2234567890', $number->number());
    }

    public function testCleansTheNumberWithMultipleSpaces(): void
    {
        $number = new PhoneNumber('223 456   7890   ');
        $this->assertEquals('2234567890', $number->number());
    }

    public function testInvalidWhen9Digits(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('incorrect number of digits');

        new PhoneNumber('123456789');
    }

    public function testInvalidWhen11DigitsDoesNotStartWithA1(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('11 digits must start with 1');

        new PhoneNumber('22234567890');
    }

    public function testValidWhen11DigitsAndStartingWith1(): void
    {
        $number = new PhoneNumber('12234567890');
        $this->assertEquals('2234567890', $number->number());
    }

    public function testValidWhen11DigitsAndStartingWith1EvenWithPunctuation(): void
    {
        $number = new PhoneNumber('+1 (223) 456-7890');
        $this->assertEquals('2234567890', $number->number());
    }

    public function testInvalidWhenMoreThan11Digits(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('more than 11 digits');

        new PhoneNumber('321234567890');
    }

    public function testInvalidWithLetters(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('letters not permitted');

        new PhoneNumber('123-abc-7890');
    }

    public function testInvalidWithPunctuation(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('punctuations not permitted');

        new PhoneNumber('123-@:!-7890');
    }

    public function testInvalidIfAreaCodeStartsWith0(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with zero');

        new PhoneNumber('(023) 456-7890');
    }

    public function testInvalidIfAreaCodeStartsWith1(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with one');

        new PhoneNumber('(123) 456-7890');
    }

    public function testInvalidIfExchangeCodeStartsWith0(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with zero');

        new PhoneNumber('(223) 056-7890');
    }

    public function testInvalidIfExchangeCodeStartsWith1(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with one');

        new PhoneNumber('(223) 156-7890');
    }

    public function testInvalidIfAreaCodeStartsWith0OnValid11DigitNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with zero');

        new PhoneNumber('1 (023) 456-7890');
    }

    public function testInvalidIfAreaCodeStartsWith1OnValid11DigitNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with one');

        new PhoneNumber('1 (123) 456-7890');
    }

    public function testInvalidIfExchangeCodeStartsWith0OnValid11DigitNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with zero');

        new PhoneNumber('1 (223) 056-7890');
    }

    public function testInvalidIfExchangeCodeStartsWith1OnValid11DigitNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with one');

        new PhoneNumber('1 (223) 156-7890');
    }
}
