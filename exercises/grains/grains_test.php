<?php

include_once 'grains.php';

class GrainsTest extends PHPUnit\Framework\TestCase
{
    /**
     * PHP integers greater than 2^31 (32-bit systems)
     * or 2^63 (64-bit) are casted to floats.
     * In some cases it may lead to problems
     * http://php.net/manual/ru/language.types.float.php#warn.float-precision
     *
     * Consider King hates floats and demands solution with
     * precise integer-only calculations. Don't involve any floats.
     * Don't use gmp or any other similar libraries.
     * Try to make the solution for virtually any board size.
     */

    public function testInput1()
    {
        $this->assertSame('1', square(1));
    }

    public function testInput2()
    {
        $this->assertSame('2', square(2));
    }

    public function testInput3()
    {
        $this->assertSame('4', square(3));
    }

    public function testInput4()
    {
        $this->assertSame('8', square(4));
    }

    public function testInput16()
    {
        $this->assertSame('32768', square(16));
    }

    public function testInput32()
    {
        $this->assertSame('2147483648', square(32));
    }

    public function testInput64()
    {
        $this->assertSame('9223372036854775808', square(64));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testRejectsZero()
    {
        square(0);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testRejectsNegative()
    {
        square(-1);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testRejectsGreaterThan64()
    {
        square(65);
    }

    public function testTotal()
    {
        $this->assertSame('18446744073709551615', total());
    }
}
