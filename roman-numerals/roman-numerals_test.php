<?php

require_once "roman-numerals.php";

class RomanTest extends PHPUnit_Framework_TestCase
{
    public function test1()
    {
        $this->assertSame('I', Roman::toRoman(1));
    }

    public function test2()
    {
        $this->assertSame('II', Roman::toRoman(2));
    }

    public function test3()
    {
        $this->assertSame('III', Roman::toRoman(3));
    }

    public function test4()
    {
        $this->assertSame('IV', Roman::toRoman(4));
    }

    public function test5()
    {
        $this->assertSame('V', Roman::toRoman(5));
    }

    public function test6()
    {
        $this->assertSame('VI', Roman::toRoman(6));
    }

    public function test9()
    {
        $this->assertSame('IX', Roman::toRoman(9));
    }

    public function test27()
    {
        $this->assertSame('XXVII', Roman::toRoman(27));
    }

    public function test48()
    {
        $this->assertSame('XLVIII', Roman::toRoman(48));
    }

    public function test49()
    {
        $this->assertSame('XLIX', Roman::toRoman(49));
    }

    public function test59()
    {
        $this->assertSame('LIX', Roman::toRoman(59));
    }

    public function test93()
    {
        $this->assertSame('XCIII', Roman::toRoman(93));
    }

    public function test141()
    {
        $this->assertSame('CXLI', Roman::toRoman(141));
    }

    public function test163()
    {
        $this->assertSame('CLXIII', Roman::toRoman(163));
    }

    public function test402()
    {
        $this->assertSame('CDII', Roman::toRoman(402));
    }

    public function test575()
    {
        $this->assertSame('DLXXV', Roman::toRoman(575));
    }

    public function test911()
    {
        $this->assertSame('CMXI', Roman::toRoman(911));
    }

    public function test1024()
    {
        $this->assertSame('MXXIV', Roman::toRoman(1024));
    }

    public function test2014()
    {
        $this->assertSame('MCMXCVIII', Roman::toRoman(1998));
    }

    public function test2999()
    {
        $this->assertSame('MMCMXCIX', Roman::toRoman(2999));
    }

    public function test3000()
    {
        $this->assertSame('MMM', Roman::toRoman(3000));
    }
}
