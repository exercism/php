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
        $this->markTestSkipped();

        $this->assertFalse((new Year(1997))->isLeap());
    }

    public function testNonLeapEvenYear()
    {
        $this->markTestSkipped();

        $this->assertFalse((new Year(1998))->isLeap());
    }

    public function testCentury()
    {
        $this->markTestSkipped();

        $this->assertFalse((new Year(1900))->isLeap());
    }

    public function testFourthCentury()
    {
        $this->markTestSkipped();

        $this->assertTrue((new Year(2400))->isLeap());
    }
}
