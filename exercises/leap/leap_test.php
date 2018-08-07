<?php

require "leap.php";

class YearTest extends PHPUnit\Framework\TestCase
{
    public function testLeapYear()
    {
        $this->assertTrue(isLeap(1996));
    }

    public function testNonLeapYear()
    {
        $this->assertFalse(isLeap(1997));
    }

    public function testNonLeapEvenYear()
    {
        $this->assertFalse(isLeap(1998));
    }

    public function testCentury()
    {
        $this->assertFalse(isLeap(1900));
    }

    public function testFourthCentury()
    {
        $this->assertTrue(isLeap(2400));
    }
}
