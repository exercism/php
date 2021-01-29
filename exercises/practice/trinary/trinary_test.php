<?php

class TrinaryTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'trinary.php';
    }

    public function test1IsDecimal1() : void
    {
        $this->assertEquals(1, toDecimal('1'));
    }

    public function test2IsDecimal2() : void
    {
        $this->assertEquals(2, toDecimal('2'));
    }

    public function test10IsDecimal3() : void
    {
        $this->assertEquals(3, toDecimal('10'));
    }

    public function test11IsDecimal4() : void
    {
        $this->assertEquals(4, toDecimal('11'));
    }

    public function test100IsDecimal9() : void
    {
        $this->assertEquals(9, toDecimal('100'));
    }

    public function test112IsDecimal14() : void
    {
        $this->assertEquals(14, toDecimal('112'));
    }

    public function test222IsDecimal26() : void
    {
        $this->assertEquals(26, toDecimal('222'));
    }

    public function test1122000120IsDecimal32091() : void
    {
        $this->assertEquals(32091, toDecimal('1122000120'));
    }

    public function testInvalidTrinaryIsDecimal0() : void
    {
        $this->assertSame(0, toDecimal('13201'));
    }
}
