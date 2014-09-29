<?php

require "leap.php";

class YearTest extends \PHPUnit_Framework_TestCase
{
    public function testLeapYear()
    {
        $this->assertTrue((new Year(1996))->isLeap());
    }

    public function testNonLeapYear()
    {
        $this->assertFalse((new Year(1997))->isLeap());
    }

    public function testNonLeapEvenYear()
    {
        $this->assertFalse((new Year(1998))->isLeap());
    }

    public function testCentury()
    {
        $this->assertFalse((new Year(1900))->isLeap());
    }

    public function testFourthCentury()
    {
        $this->assertTrue((new Year(2400))->isLeap());
    }
}
