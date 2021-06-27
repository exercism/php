<?php

declare(strict_types=1);

class OrdinalNumberTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'OrdinalNumber.php';
    }

    public function testZero(): void
    {
        $this->assertEquals('0', toOrdinal(0));
    }

    public function testFirst(): void
    {
        $this->assertEquals('1st', toOrdinal(1));
    }

    public function testSecond(): void
    {
        $this->assertEquals('2nd', toOrdinal(2));
    }

    public function testThird(): void
    {
        $this->assertEquals('3rd', toOrdinal(3));
    }

    public function testFourth(): void
    {
        $this->assertEquals('4th', toOrdinal(4));
    }

    public function testTenth(): void
    {
        $this->assertEquals('10th', toOrdinal(10));
    }

    public function testEleventh(): void
    {
        $this->assertEquals('11th', toOrdinal(11));
    }

    public function testTwelfth(): void
    {
        $this->assertEquals('12th', toOrdinal(12));
    }

    public function testThirteenth(): void
    {
        $this->assertEquals('13th', toOrdinal(13));
    }

    public function testRandomNumber(): void
    {
        $this->assertEquals('62nd', toOrdinal(62));
    }
}
