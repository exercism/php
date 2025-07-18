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

use PHPUnit\Framework\TestCase;

class SeriesTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Series.php';
    }

    public function testSlicesOfOne(): void
    {
        $this->assertEquals(
            ["0", "1", "2", "3", "4"],
            slices("01234", 1)
        );
    }

    public function testSlicesOfTwo(): void
    {
        $this->assertEquals(
            ["97", "78", "86", "67", "75", "56", "64"],
            slices("97867564", 2)
        );
    }

    public function testSlicesOfThree(): void
    {
        $this->assertEquals(
            ["978", "786", "867", "675", "756", "564"],
            slices("97867564", 3)
        );
    }

    public function testSlicesOfFour(): void
    {
        $this->assertEquals(
            ["0123", "1234"],
            slices("01234", 4)
        );
    }

    public function testSlicesOfFive(): void
    {
        $this->assertEquals(
            ["01234"],
            slices("01234", 5)
        );
    }

    public function testOverlyLongSlice(): void
    {
        $this->expectException(Exception::class);
        slices("012", 4);
    }

    public function testOverlyShortSlice(): void
    {
        $this->expectException(Exception::class);
        slices("01234", 0);
    }
}
