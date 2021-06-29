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

/**
 * These tests are adapted from the canonical data in the
 * `problem-specifications` repository.
 */
class AllYourBaseTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'AllYourBase.php';
    }

    public function testSingleBitOneToDecimal(): void
    {
        $this->assertEquals([1], rebase(2, [1], 10));
    }

    public function testBinaryToSingleDecimal(): void
    {
        $this->assertEquals([5], rebase(2, [1, 0, 1], 10));
    }

    public function testSingleDecimalToBinary(): void
    {
        $this->assertEquals([1, 0, 1], rebase(10, [5], 2));
    }

    public function testBinaryToMultipleDecimal(): void
    {
        $this->assertEquals([4, 2], rebase(2, [1, 0, 1, 0, 1, 0], 10));
    }

    public function testDecimalToBinary(): void
    {
        $this->assertEquals([1, 0, 1, 0, 1, 0], rebase(10, [4, 2], 2));
    }

    public function testTrinaryToHexadecimal(): void
    {
        $this->assertEquals([2, 10], rebase(3, [1, 1, 2, 0], 16));
    }

    public function testHexadecimalToTrinary(): void
    {
        $this->assertEquals([1, 1, 2, 0], rebase(16, [2, 10], 3));
    }

    public function test15BitIntegers(): void
    {
        $this->assertEquals([6, 10, 45], rebase(97, [3, 46, 60], 73));
    }

    public function testEmptyListReturnsNull(): void
    {
        $this->assertEquals(null, rebase(10, [], 10));
    }

    public function testSingleZeroReturnsNull(): void
    {
        $this->assertEquals(null, rebase(10, [0], 2));
    }

    public function testMultipleZerosReturnsNull(): void
    {
        $this->assertEquals(null, rebase(10, [0, 0, 0], 2));
    }

    public function testLeadingZerosReturnsNull(): void
    {
        $this->assertEquals(null, rebase(10, [0, 6, 0], 2));
    }

    public function testFirstBaseIsOne(): void
    {
        $this->assertEquals(null, rebase(1, [6, 0], 2));
    }

    public function testFirstBaseIsZero(): void
    {
        $this->assertEquals(null, rebase(0, [6, 0], 2));
    }

    public function testFirstBaseIsNegative(): void
    {
        $this->assertEquals(null, rebase(-1, [6, 0], 2));
    }

    public function testNegativeDigit(): void
    {
        $this->assertEquals(null, rebase(10, [1, -1, 0], 2));
    }

    public function testInvalidPositiveDigit(): void
    {
        $this->assertEquals(null, rebase(2, [1, 2, 0], 10));
    }

    public function testSecondBaseIsOne(): void
    {
        $this->assertEquals(null, rebase(2, [1, 1, 0], 1));
    }

    public function testSecondBaseIsZero(): void
    {
        $this->assertEquals(null, rebase(2, [1, 1, 0], 0));
    }

    public function testSecondBaseIsNegative(): void
    {
        $this->assertEquals(null, rebase(2, [1, 1, 0], -1));
    }

    public function testBothBasesIsNegative(): void
    {
        $this->assertEquals(null, rebase(-3, [1, 1, 0], -1));
    }
}
