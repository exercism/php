<?php

class OrdinalNumberTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'OrdinalNumber.php';
    }

    public function tesZero(): void
    {
        $this->assertEquals('0', OrdinalNumber(0));
    }

    public function testFirst(): void
    {
        $this->assertEquals('1st', OrdinalNumber(1));
    }

    public function testSecond(): void
    {
        $this->assertEquals('2nd', OrdinalNumber(2));
    }

    public function testThird(): void
    {
        $this->assertEquals('3rd', OrdinalNumber(3));
    }

    public function testFourth(): void
    {
        $this->assertEquals('4th', OrdinalNumber(4));
    }

    public function testTenth(): void
    {
        $this->assertEquals('10th', OrdinalNumber(10));
    }

    public function testEleventh(): void
    {
        $this->assertEquals('11th', OrdinalNumber(11));
    }

    public function testTwelfth(): void
    {
        $this->assertEquals('12th', OrdinalNumber(12));
    }

    public function testThirteenth(): void
    {
        $this->assertEquals('13th', OrdinalNumber(13));
    }

    public function testRandomNumber(): void
    {
        $this->assertEquals('62nd', OrdinalNumber(62));
    }
}
