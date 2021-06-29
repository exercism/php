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

class RaindropsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Raindrops.php';
    }

    public function test1(): void
    {
        $this->assertSame("1", raindrops(1));
    }

    public function test3(): void
    {
        $this->assertSame("Pling", raindrops(3));
    }

    public function test5(): void
    {
        $this->assertSame("Plang", raindrops(5));
    }

    public function test7(): void
    {
        $this->assertSame("Plong", raindrops(7));
    }

    public function test6(): void
    {
        $this->assertSame("Pling", raindrops(6));
    }

    public function test9(): void
    {
        $this->assertSame("Pling", raindrops(9));
    }

    public function test10(): void
    {
        $this->assertSame("Plang", raindrops(10));
    }

    public function test14(): void
    {
        $this->assertSame("Plong", raindrops(14));
    }

    public function test15(): void
    {
        $this->assertSame("PlingPlang", raindrops(15));
    }

    public function test21(): void
    {
        $this->assertSame("PlingPlong", raindrops(21));
    }

    public function test25(): void
    {
        $this->assertSame("Plang", raindrops(25));
    }

    public function test35(): void
    {
        $this->assertSame("PlangPlong", raindrops(35));
    }

    public function test49(): void
    {
        $this->assertSame("Plong", raindrops(49));
    }

    public function test52(): void
    {
        $this->assertSame("52", raindrops(52));
    }

    public function test105(): void
    {
        $this->assertSame("PlingPlangPlong", raindrops(105));
    }

    public function test12121(): void
    {
        $this->assertSame("12121", raindrops(12121));
    }
}
