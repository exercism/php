<?php

require "clock.php";

class ClockTest extends PHPUnit\Framework\TestCase
{
    public function testOnTheHour()
    {
        $clock = new Clock(8);

        $this->assertEquals('08:00', $clock->__toString());
    }

    public function testPastTheHour()
    {
        $this->markTestSkipped();
        $clock = new Clock(11, 9);

        $this->assertEquals('11:09', $clock->__toString());
    }

    public function testAddingAFewMinutes()
    {
        $this->markTestSkipped();
        $clock = new Clock(10);

        $clock = $clock->add(3);

        $this->assertEquals('10:03', $clock->__toString());
    }

    public function testAddingZeroMinutes()
    {
        $this->markTestSkipped();
        $clock = new Clock(6, 41);

        $clock = $clock->add(0);

        $this->assertEquals('06:41', $clock->__toString());
    }

    public function testAddingOverAnHour()
    {
        $this->markTestSkipped();
        $clock = new Clock(10);

        $clock = $clock->add(61);

        $this->assertEquals('11:01', $clock->__toString());
    }

    public function testAddingMoreThanTwoHoursWithCarry()
    {
        $this->markTestSkipped();
        $clock = new Clock(0, 45);

        $clock = $clock->add(160);

        $this->assertEquals('03:25', $clock->__toString());
    }

    public function testAddingMoreThanTwoDays()
    {
        $this->markTestSkipped();
        $clock = new Clock(1, 1);

        $clock = $clock->add(3500);

        $this->assertEquals('11:21', $clock->__toString());
    }

    public function testWrapAroundAtMidnight()
    {
        $this->markTestSkipped();
        $clock = new Clock(23, 30);

        $clock = $clock->add(60);

        $this->assertEquals('00:30', $clock->__toString());
    }

    public function testSubtractMinutes()
    {
        $this->markTestSkipped();
        $clock = new Clock(10);

        $clock = $clock->sub(90);

        $this->assertEquals('08:30', $clock->__toString());
    }

    public function testSubtractMoreThanTwoHours()
    {
        $this->markTestSkipped();
        $clock = new Clock(6, 15);

        $clock = $clock->sub(160);

        $this->assertEquals('03:35', $clock->__toString());
    }

    public function testSubtractMoreThanTwoHoursWithNegativeAdd()
    {
        $this->markTestSkipped();
        $clock = new Clock(6, 15);

        $clock = $clock->add(-160);

        $this->assertEquals('03:35', $clock->__toString());
    }

    public function testSubtractMoreThanTwoDays()
    {
        $this->markTestSkipped();
        $clock = new Clock(2, 20);

        $clock = $clock->sub(3000);

        $this->assertEquals('00:20', $clock->__toString());
    }

    public function testWrapAroundBackwards()
    {
        $this->markTestSkipped();
        $clock = new Clock(0, 30);

        $clock = $clock->sub(60);

        $this->assertEquals('23:30', $clock->__toString());
    }

    public function testWrapAroundDay()
    {
        $this->markTestSkipped();
        $clock = new Clock(5, 32);

        $clock = $clock->add(25 * 60);

        $this->assertEquals('06:32', $clock->__toString());
    }

    public function testWrapAroundDayBackwards()
    {
        $this->markTestSkipped();
        $clock = new Clock(5, 32);

        $clock = $clock->sub(25 * 60);

        $this->assertEquals('04:32', $clock->__toString());
    }

    public function testEquivalentClocks()
    {
        $this->markTestSkipped();
        $this->assertEquals(new Clock(15, 37), new Clock(15, 37));
    }

    public function testInequivalentClocks()
    {
        $this->markTestSkipped();
        $this->assertNotEquals(new Clock(01, 01), new Clock(18, 32));
    }

    public function testEquivalentClocksWithHourOverflowBySeveralDays()
    {
        $this->markTestSkipped();
        $this->assertEquals(new Clock(3, 11), new Clock(99, 11));
    }

    public function testEquivalentClocksWithNegativeHour()
    {
        $this->markTestSkipped();
        $this->assertEquals(new Clock(22, 40), new Clock(-2, 40));
    }

    public function testEquivalentClocksWithNegativeHourThatWraps()
    {
        $this->markTestSkipped();
        $this->assertEquals(new Clock(17, 3), new Clock(-31, 3));
    }

    public function testEquivalentClocksWithMinuteOverflowBySeveralDays()
    {
        $this->markTestSkipped();
        $this->assertEquals(new Clock(2, 2), new Clock(2, 4322));
    }

    public function testEquivalentClocksWithNegativeMinuteOverflow()
    {
        $this->markTestSkipped();
        $this->assertEquals(new Clock(2, 40), new Clock(3, -20));
    }

    public function testEquivalentClocksWithNegativeHoursAndMinutes()
    {
        $this->markTestSkipped();
        $this->assertEquals(new Clock(7, 32), new Clock(-12, -268));
    }

    public function testHoursRollOver()
    {
        $this->markTestSkipped();
        $this->assertEquals('04:00', (new Clock(100))->__toString());
    }

    public function testMinutesRollOver()
    {
        $this->markTestSkipped();
        $this->assertEquals('04:43', (new Clock(0, 1723))->__toString());
    }

    public function testHoursAndMinutesRollOver()
    {
        $this->markTestSkipped();
        $this->assertEquals('00:00', (new Clock(72, 8640))->__toString());
    }

    public function testNegativeHoursRollOver()
    {
        $this->markTestSkipped();
        $this->assertEquals('05:00', (new Clock(-91))->__toString());
    }

    public function testNegativeMinutesRollOver()
    {
        $this->markTestSkipped();
        $this->assertEquals('16:40', (new Clock(1, -4820))->__toString());
    }

    public function testNegativeHoursAndMinutesRollOver()
    {
        $this->markTestSkipped();
        $this->assertEquals('22:10', (new Clock(-121, -5810))->__toString());
    }
}
