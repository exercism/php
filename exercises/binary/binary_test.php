<?php

require_once 'binary.php';

class BinaryTest extends \PHPUnit_Framework_TestCase
{
    public function testItParsesBinary0ToDecimal0()
    {
        $this->assertEquals(0, parse_binary('0'));
    }

    public function testItParsesBinary1ToDecimal1()
    {
        $this->assertEquals(1, parse_binary('1'));
    }

    public function testItParsesDigits()
    {
        $this->markTestSkipped();

        $this->assertEquals(2, parse_binary('10'));
        $this->assertEquals(3, parse_binary('11'));
        $this->assertEquals(4, parse_binary('100'));
        $this->assertEquals(9, parse_binary('1001'));
    }

    public function testItParsesHundreds()
    {
        $this->markTestSkipped();

        $this->assertEquals(128, parse_binary('10000000'));
        $this->assertEquals(315, parse_binary('100111011'));
        $this->assertEquals(800, parse_binary('1100100000'));
        $this->assertEquals(999, parse_binary('1111100111'));
    }

    public function testItParsesMaxInt()
    {
        $this->markTestSkipped();

        $this->assertEquals(
            9223372036854775807,
            parse_binary('111111111111111111111111111111111111111111111111111111111111111')
        );
    }

    public function testItParsesValuesWithLeadingZeros()
    {
        $this->markTestSkipped();

        $this->assertEquals(1, parse_binary('01'));
        $this->assertEquals(2, parse_binary('0010'));
        $this->assertEquals(3, parse_binary('00011'));
    }

    /**
     * @dataProvider invalidValues
     */
    public function testItOnlyAcceptsStringsContainingZerosAndOnes($value)
    {
        $this->markTestSkipped();

        $this->setExpectedException(InvalidArgumentException::class);

        parse_binary($value);
    }

    public function invalidValues()
    {
        return [
            ['2'], ['12345'], ['a'], ['0abcdef'],
        ];
    }
}
