<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class ClockTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Clock.php';
    }

    public function testOnTheHour(): void
    {
        $clock = new Clock(8);

        $this->assertEquals('08:00', $clock->__toString());
    }

    public function testPastTheHour(): void
    {
        $clock = new Clock(11, 9);

        $this->assertEquals('11:09', $clock->__toString());
    }

    public function testAddingAFewMinutes(): void
    {
        $clock = new Clock(10);

        $clock = $clock->add(3);

        $this->assertEquals('10:03', $clock->__toString());
    }

    public function testAddingZeroMinutes(): void
    {
        $clock = new Clock(6, 41);

        $clock = $clock->add(0);

        $this->assertEquals('06:41', $clock->__toString());
    }

    public function testAddingOverAnHour(): void
    {
        $clock = new Clock(10);

        $clock = $clock->add(61);

        $this->assertEquals('11:01', $clock->__toString());
    }

    public function testAddingMoreThanTwoHoursWithCarry(): void
    {
        $clock = new Clock(0, 45);

        $clock = $clock->add(160);

        $this->assertEquals('03:25', $clock->__toString());
    }

    public function testAddingMoreThanTwoDays(): void
    {
        $clock = new Clock(1, 1);

        $clock = $clock->add(3500);

        $this->assertEquals('11:21', $clock->__toString());
    }

    public function testWrapAroundAtMidnight(): void
    {
        $clock = new Clock(23, 30);

        $clock = $clock->add(60);

        $this->assertEquals('00:30', $clock->__toString());
    }

    public function testSubtractMinutes(): void
    {
        $clock = new Clock(10);

        $clock = $clock->sub(90);

        $this->assertEquals('08:30', $clock->__toString());
    }

    public function testSubtractMoreThanTwoHours(): void
    {
        $clock = new Clock(6, 15);

        $clock = $clock->sub(160);

        $this->assertEquals('03:35', $clock->__toString());
    }

    public function testSubtractMoreThanTwoHoursWithNegativeAdd(): void
    {
        $clock = new Clock(6, 15);

        $clock = $clock->add(-160);

        $this->assertEquals('03:35', $clock->__toString());
    }

    public function testSubtractMoreThanTwoDays(): void
    {
        $clock = new Clock(2, 20);

        $clock = $clock->sub(3000);

        $this->assertEquals('00:20', $clock->__toString());
    }

    public function testWrapAroundBackwards(): void
    {
        $clock = new Clock(0, 30);

        $clock = $clock->sub(60);

        $this->assertEquals('23:30', $clock->__toString());
    }

    public function testWrapAroundDay(): void
    {
        $clock = new Clock(5, 32);

        $clock = $clock->add(25 * 60);

        $this->assertEquals('06:32', $clock->__toString());
    }

    public function testWrapAroundDayBackwards(): void
    {
        $clock = new Clock(5, 32);

        $clock = $clock->sub(25 * 60);

        $this->assertEquals('04:32', $clock->__toString());
    }

    public function testEquivalentClocks(): void
    {
        $this->assertEquals(new Clock(15, 37), new Clock(15, 37));
    }

    public function testInequivalentClocks(): void
    {
        $this->assertNotEquals(new Clock(01, 01), new Clock(18, 32));
    }

    public function testEquivalentClocksWithHourOverflowBySeveralDays(): void
    {
        $this->assertEquals(new Clock(3, 11), new Clock(99, 11));
    }

    public function testEquivalentClocksWithNegativeHour(): void
    {
        $this->assertEquals(new Clock(22, 40), new Clock(-2, 40));
    }

    public function testEquivalentClocksWithNegativeHourThatWraps(): void
    {
        $this->assertEquals(new Clock(17, 3), new Clock(-31, 3));
    }

    public function testEquivalentClocksWithMinuteOverflowBySeveralDays(): void
    {
        $this->assertEquals(new Clock(2, 2), new Clock(2, 4322));
    }

    public function testEquivalentClocksWithNegativeMinuteOverflow(): void
    {
        $this->assertEquals(new Clock(2, 40), new Clock(3, -20));
    }

    public function testEquivalentClocksWithNegativeHoursAndMinutes(): void
    {
        $this->assertEquals(new Clock(7, 32), new Clock(-12, -268));
    }

    public function testHoursRollOver(): void
    {
        $this->assertEquals('04:00', (new Clock(100))->__toString());
    }

    public function testMinutesRollOver(): void
    {
        $this->assertEquals('04:43', (new Clock(0, 1723))->__toString());
    }

    public function testHoursAndMinutesRollOver(): void
    {
        $this->assertEquals('00:00', (new Clock(72, 8640))->__toString());
    }

    public function testNegativeHoursRollOver(): void
    {
        $this->assertEquals('05:00', (new Clock(-91))->__toString());
    }

    public function testNegativeMinutesRollOver(): void
    {
        $this->assertEquals('16:40', (new Clock(1, -4820))->__toString());
    }

    public function testNegativeHoursAndMinutesRollOver(): void
    {
        $this->assertEquals('22:10', (new Clock(-121, -5810))->__toString());
    }
}
