<?php

require_once 'binary.php';

class BinaryTest extends \PHPUnit_Framework_TestCase
{
    public function testBinary1IsDecimal1()
    {
        $this->assertEquals(1, parse_binary('1'));
    }

    public function testBinary10IsDecimal2()
    {
        $this->markTestSkipped();

        $this->assertEquals(2, parse_binary('10'));
    }

    public function testBinary11IsDecimal3()
    {
        $this->markTestSkipped();

        $this->assertEquals(3, parse_binary('11'));
    }

    public function testBinary100IsDecimal4()
    {
        $this->markTestSkipped();

        $this->assertEquals(4, parse_binary('100'));
    }

    public function testBinary1001IsDecimal9()
    {
        $this->markTestSkipped();

        $this->assertEquals(9, parse_binary('1001'));
    }

    public function testBinary11010IsDecimal26()
    {
        $this->markTestSkipped();

        $this->assertEquals(26, parse_binary('11010'));
    }

    public function testBinary10001101000IsDecimal1128()
    {
        $this->markTestSkipped();

        $this->assertEquals(1128, parse_binary('10001101000'));
    }

    public function testItDosentAccept2()
    {
        $this->markTestSkipped();

        $this->setExpectedException(InvalidArgumentException::class);
        parse_binary('2');
    }

    public function testItDosentAccept5()
    {
        $this->markTestSkipped();

        $this->setExpectedException(InvalidArgumentException::class);
        parse_binary('2');
    }

    public function testItDosentAccept9()
    {
        $this->markTestSkipped();

        $this->setExpectedException(InvalidArgumentException::class);
        parse_binary('9');
    }

    public function testItDosentAccept134678()
    {
        $this->markTestSkipped();

        $this->setExpectedException(InvalidArgumentException::class);
        parse_binary('134678');
    }

    public function testItDosentAcceptabc10z()
    {
        $this->markTestSkipped();

        $this->setExpectedException(InvalidArgumentException::class);
        parse_binary('abc10z');
    }

    public function testBinary011WithLeadingZeroIsDecimal3()
    {
        $this->markTestSkipped();

        $this->assertEquals(1, parse_binary('01'));
        $this->assertEquals(2, parse_binary('0010'));
        $this->assertEquals(3, parse_binary('00011'));
    }
}
