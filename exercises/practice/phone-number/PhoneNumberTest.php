<?php

declare(strict_types=1);

class PhoneNumberTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'PhoneNumber.php';
    }

    /**
     * uuid 79666dce-e0f1-46de-95a1-563802913c35
     * @testdox cleans the number
     */
    public function testCleansTheNumber(): void
    {
        $number = new PhoneNumber('(223) 456-7890');
        $this->assertEquals('2234567890', $number->number());
    }

    /**
     * uuid c360451f-549f-43e4-8aba-fdf6cb0bf83f
     * @testdox cleans numbers with dots
     */
    public function testCleansTheNumberWithDots(): void
    {
        $number = new PhoneNumber('223.456.7890');
        $this->assertEquals('2234567890', $number->number());
    }

    /**
     * uuid 08f94c34-9a37-46a2-a123-2a8e9727395d
     * @testdox cleans numbers with multiple spaces
     */
    public function testCleansTheNumberWithMultipleSpaces(): void
    {
        $number = new PhoneNumber('223 456   7890   ');
        $this->assertEquals('2234567890', $number->number());
    }

    /**
     * uuid 2de74156-f646-42b5-8638-0ef1d8b58bc2
     * @testdox invalid when 9 digits
     */
    public function testInvalidWhen9Digits(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new PhoneNumber('123456789');
    }

    /**
     * uuid 57061c72-07b5-431f-9766-d97da7c4399d
     * @testdox invalid when 11 digits does not start with a 1
     */
    public function testInvalidWhen11DigitsDoesNotStartWithA1(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('11 digits must start with 1');

        new PhoneNumber('22234567890');
    }

    /**
     * uuid 9962cbf3-97bb-4118-ba9b-38ff49c64430
     * @testdox valid when 11 digits and starting with 1
     */
    public function testValidWhen11DigitsAndStartingWith1(): void
    {
        $number = new PhoneNumber('12234567890');
        $this->assertEquals('2234567890', $number->number());
    }

    /**
     * uuid fa724fbf-054c-4d91-95da-f65ab5b6dbca
     * @testdox valid when 11 digits and starting with 1 even with punctuation
     */
    public function testValidWhen11DigitsAndStartingWith1EvenWithPunctuation(): void
    {
        $number = new PhoneNumber('+1 (223) 456-7890');
        $this->assertEquals('2234567890', $number->number());
    }

    /**
     * uuid 4a1509b7-8953-4eec-981b-c483358ff531
     * @testdox invalid when more than 11 digits
     */
    public function testInvalidWhenMoreThan11Digits(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessageMatches('.* than 11 digits');

        new PhoneNumber('321234567890');
    }

    /**
     * uuid eb8a1fc0-64e5-46d3-b0c6-33184208e28a
     * @testdox invalid with letters
     */
    public function testInvalidWithLetters(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('letters not permitted');

        new PhoneNumber('523-abc-7890');
    }

    /**
     * uuid 065f6363-8394-4759-b080-e6c8c351dd1f
     * @testdox invalid with punctuations
     */
    public function testInvalidWithPunctuation(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('punctuations not permitted');

        new PhoneNumber('523-@:!-7890');
    }

    /**
     * uuid d77d07f8-873c-4b17-8978-5f66139bf7d7
     * @testdox invalid if area code starts with 0
     */
    public function testInvalidIfAreaCodeStartsWith0(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with zero');

        new PhoneNumber('(023) 456-7890');
    }

    /**
     * uuid c7485cfb-1e7b-4081-8e96-8cdb3b77f15e
     * @testdox invalid if area code starts with 1
     */
    public function testInvalidIfAreaCodeStartsWith1(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with one');

        new PhoneNumber('(123) 456-7890');
    }

    /**
     * uuid 4d622293-6976-413d-b8bf-dd8a94d4e2ac
     * @testdox invalid if exchange code starts with 0
     */
    public function testInvalidIfExchangeCodeStartsWith0(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with zero');

        new PhoneNumber('(223) 056-7890');
    }

    /**
     * uuid 4cef57b4-7d8e-43aa-8328-1e1b89001262
     * @testdox invalid if exchange code starts with 1
     */
    public function testInvalidIfExchangeCodeStartsWith1(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with one');

        new PhoneNumber('(223) 156-7890');
    }

    /**
     * uuid 9925b09c-1a0d-4960-a197-5d163cbe308c
     * @testdox invalid if area code starts with 0 on valid 11-digit number
     */
    public function testInvalidIfAreaCodeStartsWith0OnValid11DigitNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with zero');

        new PhoneNumber('1 (023) 456-7890');
    }

    /**
     * uuid 3f809d37-40f3-44b5-ad90-535838b1a816
     * @testdox invalid if area code starts with 1 on valid 11-digit number
     */
    public function testInvalidIfAreaCodeStartsWith1OnValid11DigitNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with one');

        new PhoneNumber('1 (123) 456-7890');
    }

    /**
     * uuid e08e5532-d621-40d4-b0cc-96c159276b65
     * @testdox invalid if exchange code starts with 0 on valid 11-digit number
     */
    public function testInvalidIfExchangeCodeStartsWith0OnValid11DigitNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with zero');

        new PhoneNumber('1 (223) 056-7890');
    }

    /**
     * uuid 57b32f3d-696a-455c-8bf1-137b6d171cdf
     * @testdox invalid if exchange code starts with 1 on valid 11-digit number
     */
    public function testInvalidIfExchangeCodeStartsWith1OnValid11DigitNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with one');

        new PhoneNumber('1 (223) 156-7890');
    }
}
