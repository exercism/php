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
        $this->markTestSkipped();
        $this->assertFalse(isLeap(1997));
    }

    public function testNonLeapEvenYear()
    {
        $this->markTestSkipped();
        $this->assertFalse(isLeap(1998));
    }

    public function testCentury()
    {
        $this->markTestSkipped();
        $this->assertFalse(isLeap(1900));
    }

    public function testFourthCentury()
    {
        $this->markTestSkipped();
        $this->assertTrue(isLeap(2400));
    }
}
