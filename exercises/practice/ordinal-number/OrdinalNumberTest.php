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

class OrdinalNumberTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'OrdinalNumber.php';
    }

    public function testZero(): void
    {
        $this->assertEquals('0', toOrdinal(0));
    }

    public function testFirst(): void
    {
        $this->assertEquals('1st', toOrdinal(1));
    }

    public function testSecond(): void
    {
        $this->assertEquals('2nd', toOrdinal(2));
    }

    public function testThird(): void
    {
        $this->assertEquals('3rd', toOrdinal(3));
    }

    public function testFourth(): void
    {
        $this->assertEquals('4th', toOrdinal(4));
    }

    public function testTenth(): void
    {
        $this->assertEquals('10th', toOrdinal(10));
    }

    public function testEleventh(): void
    {
        $this->assertEquals('11th', toOrdinal(11));
    }

    public function testTwelfth(): void
    {
        $this->assertEquals('12th', toOrdinal(12));
    }

    public function testThirteenth(): void
    {
        $this->assertEquals('13th', toOrdinal(13));
    }

    public function testRandomNumber(): void
    {
        $this->assertEquals('62nd', toOrdinal(62));
    }
}
