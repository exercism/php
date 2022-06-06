<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class GrainsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Grains.php';
    }

    /**
     * PHP integers greater than 2^31 (32-bit systems)
     * or 2^63 (64-bit) are casted to floats.
     * In some cases it may lead to problems
     * https://php.net/manual/ru/language.types.float.php#warn.float-precision
     *
     * Consider King hates floats and demands solution with
     * precise integer-only calculations. Don't involve any floats.
     * Don't use gmp or any other similar libraries.
     * Try to make the solution for virtually any board size.
     */

    public function testInput1(): void
    {
        $this->assertSame('1', square(1));
    }

    public function testInput2(): void
    {
        $this->assertSame('2', square(2));
    }

    public function testInput3(): void
    {
        $this->assertSame('4', square(3));
    }

    public function testInput4(): void
    {
        $this->assertSame('8', square(4));
    }

    public function testInput16(): void
    {
        $this->assertSame('32768', square(16));
    }

    public function testInput32(): void
    {
        $this->assertSame('2147483648', square(32));
    }

    public function testInput64(): void
    {
        $this->assertSame('9223372036854775808', square(64));
    }

    public function testRejectsZero(): void
    {
        $this->expectException(InvalidArgumentException::class);

        square(0);
    }

    public function testRejectsNegative(): void
    {
        $this->expectException(InvalidArgumentException::class);

        square(-1);
    }

    public function testRejectsGreaterThan64(): void
    {
        $this->expectException(InvalidArgumentException::class);

        square(65);
    }

    public function testTotal(): void
    {
        $this->assertSame('18446744073709551615', total());
    }
}
