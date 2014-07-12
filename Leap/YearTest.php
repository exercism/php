<?php
namespace Exercism\Leap;

class YearTest extends \PHPUnit_Framework_TestCase
{
    public function testLeapYear()
    {
        $this->assertTrue((new Year(1996))->isLeap());
    }

    /** @group skipped */
    public function testNonLeapYear()
    {
        $this->assertFalse((new Year(1997))->isLeap());
    }

    /** @group skipped */
    public function testNonLeapEvenYear()
    {
        $this->assertFalse((new Year(1998))->isLeap());
    }

    /** @group skipped */
    public function testCentury()
    {
        $this->assertFalse((new Year(1900))->isLeap());
    }

    /** @group skipped */
    public function testFourthCentury()
    {
        $this->assertTrue((new Year(2400))->isLeap());
    }
}
