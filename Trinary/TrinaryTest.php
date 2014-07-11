<?php
namespace Exercism\Trinary;

class TrinaryTest extends \PHPUnit_Framework_TestCase
{
    public function test1IsDecimal1()
    {
        $trinary = new Trinary('1');
        $this->assertEquals(1, $trinary->toDecimal());
    }

    /** @group skipped */
    public function test2IsDecimal2()
    {
        $trinary = new Trinary('2');
        $this->assertEquals(2, $trinary->toDecimal());
    }

    /** @group skipped */
    public function test10IsDecimal3()
    {
        $trinary = new Trinary('10');
        $this->assertEquals(3, $trinary->toDecimal());
    }

    /** @group skipped */
    public function test11IsDecimal4()
    {
        $trinary = new Trinary('11');
        $this->assertEquals(4, $trinary->toDecimal());
    }

    /** @group skipped */
    public function test100IsDecimal9()
    {
        $trinary = new Trinary('100');
        $this->assertEquals(9, $trinary->toDecimal());
    }

    /** @group skipped */
    public function test112IsDecimal14()
    {
        $trinary = new Trinary('112');
        $this->assertEquals(14, $trinary->toDecimal());
    }

    /** @group skipped */
    public function test222IsDecimal26()
    {
        $trinary = new Trinary('222');
        $this->assertEquals(26, $trinary->toDecimal());
    }

    /** @group skipped */
    public function test1122000120IsDecimal32091()
    {
        $trinary = new Trinary('1122000120');
        $this->assertEquals(32091, $trinary->toDecimal());
    }

    /** @group skipped */
    public function testInvalidTrinaryIsDecimal0()
    {
        $trinary = new Trinary('carrot');
        $this->assertEquals(0, $trinary->toDecimal());
    }
}
