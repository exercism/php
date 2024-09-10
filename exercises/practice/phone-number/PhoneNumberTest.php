<?php

declare(strict_types=1);

class PhoneNumberTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'PhoneNumber.php';
    }

    /**
     * @uuid: 79666dce-e0f1-46de-95a1-563802913c35
     */
    public function testCleansTheNumber(): void
    {
        $number = new PhoneNumber('(223) 456-7890');
        $this->assertEquals('2234567890', $number->number());
    }

    /**
     * @uuid: c360451f-549f-43e4-8aba-fdf6cb0bf83f
     */
    public function testCleansTheNumberWithDots(): void
    {
        $number = new PhoneNumber('223.456.7890');
        $this->assertEquals('2234567890', $number->number());
    }

    /**
     * @uuid: 08f94c34-9a37-46a2-a123-2a8e9727395d
     */
    public function testCleansTheNumberWithMultipleSpaces(): void
    {
        $number = new PhoneNumber('223 456   7890   ');
        $this->assertEquals('2234567890', $number->number());
    }

    /**
     * @uuid: 598d8432-0659-4019-a78b-1c6a73691d21
     */
    public function testInvalidWhen9Digits(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('incorrect number of digits');

        new PhoneNumber('123456789');
    }

    /**
     * @uuid: 57061c72-07b5-431f-9766-d97da7c4399d
     */
    public function testInvalidWhen11DigitsDoesNotStartWithA1(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('11 digits must start with 1');

        new PhoneNumber('22234567890');
    }

    /**
     * @uuid: 9962cbf3-97bb-4118-ba9b-38ff49c64430
     */
    public function testValidWhen11DigitsAndStartingWith1(): void
    {
        $number = new PhoneNumber('12234567890');
        $this->assertEquals('2234567890', $number->number());
    }

    /**
     * @uuid: fa724fbf-054c-4d91-95da-f65ab5b6dbca
     */
    public function testValidWhen11DigitsAndStartingWith1EvenWithPunctuation(): void
    {
        $number = new PhoneNumber('+1 (223) 456-7890');
        $this->assertEquals('2234567890', $number->number());
    }

    /**
     * @uuid: c6a5f007-895a-4fc5-90bc-a7e70f9b5cad
     */
    public function testInvalidWhenMoreThan11Digits(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('more than 11 digits');

        new PhoneNumber('321234567890');
    }

    /**
     * @uuid: eb8a1fc0-64e5-46d3-b0c6-33184208e28a
     */
    public function testInvalidWithLetters(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('letters not permitted');

        new PhoneNumber('523-abc-7890');
    }

    /**
     * @uuid: 065f6363-8394-4759-b080-e6c8c351dd1f
     */
    public function testInvalidWithPunctuation(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('punctuations not permitted');

        new PhoneNumber('523-@:!-7890');
    }

    /**
     * @uuid: d77d07f8-873c-4b17-8978-5f66139bf7d7
     */
    public function testInvalidIfAreaCodeStartsWith0(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with zero');

        new PhoneNumber('(023) 456-7890');
    }

    /**
     * @uuid: c7485cfb-1e7b-4081-8e96-8cdb3b77f15e
     */
    public function testInvalidIfAreaCodeStartsWith1(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with one');

        new PhoneNumber('(123) 456-7890');
    }

    /**
     * @uuid: 4d622293-6976-413d-b8bf-dd8a94d4e2ac
     */
    public function testInvalidIfExchangeCodeStartsWith0(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with zero');

        new PhoneNumber('(223) 056-7890');
    }

    /**
     * @uuid: 4cef57b4-7d8e-43aa-8328-1e1b89001262
     */
    public function testInvalidIfExchangeCodeStartsWith1(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with one');

        new PhoneNumber('(223) 156-7890');
    }

    /**
     * @uuid: 9925b09c-1a0d-4960-a197-5d163cbe308c
     */
    public function testInvalidIfAreaCodeStartsWith0OnValid11DigitNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with zero');

        new PhoneNumber('1 (023) 456-7890');
    }

    /**
     * @uuid: 3f809d37-40f3-44b5-ad90-535838b1a816
     */
    public function testInvalidIfAreaCodeStartsWith1OnValid11DigitNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('area code cannot start with one');

        new PhoneNumber('1 (123) 456-7890');
    }

    /**
     * @uuid: e08e5532-d621-40d4-b0cc-96c159276b65
     */
    public function testInvalidIfExchangeCodeStartsWith0OnValid11DigitNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with zero');

        new PhoneNumber('1 (223) 056-7890');
    }

    /**
     * @uuid: 57b32f3d-696a-455c-8bf1-137b6d171cdf
     */
    public function testInvalidIfExchangeCodeStartsWith1OnValid11DigitNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('exchange code cannot start with one');

        new PhoneNumber('1 (223) 156-7890');
    }
}
