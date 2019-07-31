<?php

class RomanTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'roman-numerals.php';
    }

    public function test1() : void
    {
        $this->assertSame('I', toRoman(1));
    }

    public function test2() : void
    {
        $this->assertSame('II', toRoman(2));
    }

    public function test3() : void
    {
        $this->assertSame('III', toRoman(3));
    }

    public function test4() : void
    {
        $this->assertSame('IV', toRoman(4));
    }

    public function test5() : void
    {
        $this->assertSame('V', toRoman(5));
    }

    public function test6() : void
    {
        $this->assertSame('VI', toRoman(6));
    }

    public function test9() : void
    {
        $this->assertSame('IX', toRoman(9));
    }

    public function test27() : void
    {
        $this->assertSame('XXVII', toRoman(27));
    }

    public function test48() : void
    {
        $this->assertSame('XLVIII', toRoman(48));
    }

    public function test49() : void
    {
        $this->assertSame('XLIX', toRoman(49));
    }

    public function test59() : void
    {
        $this->assertSame('LIX', toRoman(59));
    }

    public function test93() : void
    {
        $this->assertSame('XCIII', toRoman(93));
    }

    public function test141() : void
    {
        $this->assertSame('CXLI', toRoman(141));
    }

    public function test163() : void
    {
        $this->assertSame('CLXIII', toRoman(163));
    }

    public function test402() : void
    {
        $this->assertSame('CDII', toRoman(402));
    }

    public function test575() : void
    {
        $this->assertSame('DLXXV', toRoman(575));
    }

    public function test911() : void
    {
        $this->assertSame('CMXI', toRoman(911));
    }

    public function test1024() : void
    {
        $this->assertSame('MXXIV', toRoman(1024));
    }

    public function test1998() : void
    {
        $this->assertSame('MCMXCVIII', toRoman(1998));
    }

    public function test2999() : void
    {
        $this->assertSame('MMCMXCIX', toRoman(2999));
    }

    public function test3000() : void
    {
        $this->assertSame('MMM', toRoman(3000));
    }
}
