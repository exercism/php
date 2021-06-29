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

class TrinaryTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Trinary.php';
    }

    public function test1IsDecimal1(): void
    {
        $this->assertEquals(1, toDecimal('1'));
    }

    public function test2IsDecimal2(): void
    {
        $this->assertEquals(2, toDecimal('2'));
    }

    public function test10IsDecimal3(): void
    {
        $this->assertEquals(3, toDecimal('10'));
    }

    public function test11IsDecimal4(): void
    {
        $this->assertEquals(4, toDecimal('11'));
    }

    public function test100IsDecimal9(): void
    {
        $this->assertEquals(9, toDecimal('100'));
    }

    public function test112IsDecimal14(): void
    {
        $this->assertEquals(14, toDecimal('112'));
    }

    public function test222IsDecimal26(): void
    {
        $this->assertEquals(26, toDecimal('222'));
    }

    public function test1122000120IsDecimal32091(): void
    {
        $this->assertEquals(32091, toDecimal('1122000120'));
    }

    public function testInvalidTrinaryIsDecimal0(): void
    {
        $this->assertSame(0, toDecimal('13201'));
    }
}
