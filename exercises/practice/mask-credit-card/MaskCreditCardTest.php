<?php

class MaskCreditCardTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'MaskCreditCard.php';
    }

    public function testDoNotMaskShorterThan6Chars()
    {
        $this->assertSame('12345', maskify('12345'));
    }

    public function testReturnEmptyStringWhenEmpty()
    {
        $this->assertSame('', maskify(''));
    }

    public function testMaskCcWithDashes()
    {
        $this->assertSame('1###-####-9012', maskify('1234-5678-9012'));
    }

    public function testMaskCcWithoutDashes()
    {
        $this->assertSame('1#######9012', maskify('123456789012'));
    }
}
