<?php

require "trinary.php";

class TrinaryTest extends \PHPUnit_Framework_TestCase
{
    public function test1IsDecimal1()
    {
        $this->assertEquals(1, toDecimal('1'));
    }

    public function test2IsDecimal2()
    {
        $this->markTestSkipped();
        $this->assertEquals(2, toDecimal('2'));
    }

    public function test10IsDecimal3()
    {
        $this->markTestSkipped();
        $this->assertEquals(3, toDecimal('10'));
    }

    public function test11IsDecimal4()
    {
        $this->markTestSkipped();
        $this->assertEquals(4, toDecimal('11'));
    }

    public function test100IsDecimal9()
    {
        $this->markTestSkipped();
        $this->assertEquals(9, toDecimal('100'));
    }

    public function test112IsDecimal14()
    {
        $this->markTestSkipped();
        $this->assertEquals(14, toDecimal('112'));
    }

    public function test222IsDecimal26()
    {
        $this->markTestSkipped();
        $this->assertEquals(26, toDecimal('222'));
    }

    public function test1122000120IsDecimal32091()
    {
        $this->markTestSkipped();
        $this->assertEquals(32091, toDecimal('1122000120'));
    }

    public function testInvalidTrinaryIsDecimal0()
    {
        $this->markTestSkipped();
        $this->assertSame(0, toDecimal('13201'));
    }
}
