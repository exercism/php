<?php

require_once 'binary.php';

class BinaryTest extends \PHPUnit_Framework_TestCase
{
    public function test_binary_1_is_decimal_1()
    {
        $this->assertEquals(1, parse_binary('1'));
    }

    public function test_binary_10_is_decimal_2()
    {
        $this->markTestSkipped();

        $this->assertEquals(2, parse_binary('10'));
    }

    public function test_binary_11_is_decimal_3()
    {
        $this->markTestSkipped();

        $this->assertEquals(3, parse_binary('11'));
    }

    public function test_binary_100_is_decimal_4()
    {
        $this->markTestSkipped();

        $this->assertEquals(4, parse_binary('100'));
    }

    public function test_binary_1001_is_decimal_9()
    {
        $this->markTestSkipped();

        $this->assertEquals(9, parse_binary('1001'));
    }

    public function test_binary_11010_is_decimal_26()
    {
        $this->markTestSkipped();

        $this->assertEquals(26, parse_binary('11010'));
    }

    public function test_binary_10001101000_is_decimal_1128()
    {
        $this->markTestSkipped();

        $this->assertEquals(1128, parse_binary('10001101000'));
    }

    public function test_id_dosnt_accept_2()
    {
        $this->markTestSkipped();

        $this->setExpectedException(InvalidArgumentException::class);
        parse_binary('2');
    }

    public function test_id_dosnt_accept_5()
    {
        $this->markTestSkipped();

        $this->setExpectedException(InvalidArgumentException::class);
        parse_binary('2');
    }

    public function test_id_dosnt_accept_9()
    {
        $this->markTestSkipped();

        $this->setExpectedException(InvalidArgumentException::class);
        parse_binary('9');
    }

    public function test_id_dosnt_accept_134678()
    {
        $this->markTestSkipped();

        $this->setExpectedException(InvalidArgumentException::class);
        parse_binary('134678');
    }

    public function test_id_dosnt_accept_abc10z()
    {
        $this->markTestSkipped();

        $this->setExpectedException(InvalidArgumentException::class);
        parse_binary('abc10z');
    }

    public function test_binary_011_with_leading_zero_is_decimal_3()
    {
        $this->markTestSkipped();

        $this->assertEquals(1, parse_binary('01'));
        $this->assertEquals(2, parse_binary('0010'));
        $this->assertEquals(3, parse_binary('00011'));
    }
}
