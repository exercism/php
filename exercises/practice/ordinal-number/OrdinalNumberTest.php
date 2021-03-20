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

    public function testOthers(): void
    {
        $this->assertEquals('10th', OrdinalNumber(10));
        $this->assertEquals('11th', OrdinalNumber(11));
        $this->assertEquals('12th', OrdinalNumber(12));
        $this->assertEquals('13th', OrdinalNumber(13));
        $this->assertEquals('14th', OrdinalNumber(14));
    }
}
