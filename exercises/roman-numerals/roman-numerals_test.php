<?php

require_once "roman-numerals.php";

class RomanTest extends PHPUnit\Framework\TestCase
{
    public function test1()
    {
        $this->assertSame('I', toRoman(1));
    }

    public function test2()
    {
        $this->assertSame('II', toRoman(2));
    }

    public function test3()
    {
        $this->assertSame('III', toRoman(3));
    }

    public function test4()
    {
        $this->assertSame('IV', toRoman(4));
    }

    public function test5()
    {
        $this->assertSame('V', toRoman(5));
    }

    public function test6()
    {
        $this->assertSame('VI', toRoman(6));
    }

    public function test9()
    {
        $this->assertSame('IX', toRoman(9));
    }

    public function test27()
    {
        $this->assertSame('XXVII', toRoman(27));
    }

    public function test48()
    {
        $this->assertSame('XLVIII', toRoman(48));
    }

    public function test49()
    {
        $this->assertSame('XLIX', toRoman(49));
    }

    public function test59()
    {
        $this->assertSame('LIX', toRoman(59));
    }

    public function test93()
    {
        $this->assertSame('XCIII', toRoman(93));
    }

    public function test141()
    {
        $this->assertSame('CXLI', toRoman(141));
    }

    public function test163()
    {
        $this->assertSame('CLXIII', toRoman(163));
    }

    public function test402()
    {
        $this->assertSame('CDII', toRoman(402));
    }

    public function test575()
    {
        $this->assertSame('DLXXV', toRoman(575));
    }

    public function test911()
    {
        $this->assertSame('CMXI', toRoman(911));
    }

    public function test1024()
    {
        $this->assertSame('MXXIV', toRoman(1024));
    }

    public function test1998()
    {
        $this->assertSame('MCMXCVIII', toRoman(1998));
    }

    public function test2999()
    {
        $this->assertSame('MMCMXCIX', toRoman(2999));
    }

    public function test3000()
    {
        $this->assertSame('MMM', toRoman(3000));
    }
}
