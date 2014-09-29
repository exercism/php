<?php

require "clock.php";

class ClockTest extends \PHPUnit_Framework_TestCase
{
    public function testOnTheHour()
    {
        $clock = new Clock(8);

        $this->assertEquals('08:00', $clock->__toString());
    }

    public function testPastTheHour()
    {
        $clock = new Clock(11, 9);

        $this->assertEquals('11:09', $clock->__toString());
    }

    public function testAddingAFewMinutes()
    {
        $clock = new Clock(10);

        $clock = $clock->add(3);

        $this->assertEquals('10:03', $clock->__toString());
    }

    public function testAddingOverAnHour()
    {
        $clock = new Clock(10);

        $clock = $clock->add(61);

        $this->assertEquals('11:01', $clock->__toString());
    }

    public function testWrapAroundAtMidnight()
    {
        $clock = new Clock(23, 30);

        $clock = $clock->add(60);

        $this->assertEquals('00:30', $clock->__toString());
    }

    public function testSubtractMinutes()
    {
        $clock = new Clock(10);

        $clock = $clock->sub(90);

        $this->assertEquals('08:30', $clock->__toString());
    }

    public function testWrapAroundBackwards()
    {
        $clock = new Clock(0, 30);

        $clock = $clock->sub(60);

        $this->assertEquals('23:30', $clock->__toString());
    }

    public function testWrapAroundDay()
    {
        $clock = new Clock(5, 32);

        $clock = $clock->add(25 * 60);

        $this->assertEquals('06:32', $clock->__toString());
    }

    public function testWrapAroundDayBackwards()
    {
        $clock = new Clock(5, 32);

        $clock = $clock->sub(25 * 60);

        $this->assertEquals('04:32', $clock->__toString());
    }

    public function testEquivalentClocks()
    {
        $this->assertEquals(new Clock(15, 37), new Clock(15, 37));
    }

    public function testInequivalentClocks()
    {
        $this->assertNotEquals(new Clock(01, 01), new Clock(18, 32));
    }
}
