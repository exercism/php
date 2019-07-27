<?php

class YearTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'leap.php';
    }

    public function testLeapYear() : void
    {
        $this->assertTrue(isLeap(1996));
    }

    public function testNonLeapYear() : void
    {
        $this->assertFalse(isLeap(1997));
    }

    public function testNonLeapEvenYear() : void
    {
        $this->assertFalse(isLeap(1998));
    }

    public function testCentury() : void
    {
        $this->assertFalse(isLeap(1900));
    }

    public function testFourthCentury() : void
    {
        $this->assertTrue(isLeap(2400));
    }
}
