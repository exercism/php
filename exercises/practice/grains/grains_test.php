<?php

class GrainsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'grains.php';
    }

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

    public function testInput1() : void
    {
        $this->assertSame('1', square(1));
    }

    public function testInput2() : void
    {
        $this->assertSame('2', square(2));
    }

    public function testInput3() : void
    {
        $this->assertSame('4', square(3));
    }

    public function testInput4() : void
    {
        $this->assertSame('8', square(4));
    }

    public function testInput16() : void
    {
        $this->assertSame('32768', square(16));
    }

    public function testInput32() : void
    {
        $this->assertSame('2147483648', square(32));
    }

    public function testInput64() : void
    {
        $this->assertSame('9223372036854775808', square(64));
    }

    public function testRejectsZero() : void
    {
        $this->expectException(InvalidArgumentException::class);

        square(0);
    }

    public function testRejectsNegative() : void
    {
        $this->expectException(InvalidArgumentException::class);

        square(-1);
    }

    public function testRejectsGreaterThan64() : void
    {
        $this->expectException(InvalidArgumentException::class);

        square(65);
    }

    public function testTotal() : void
    {
        $this->assertSame('18446744073709551615', total());
    }
}
