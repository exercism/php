<?php

require "all-your-base.php";

/**
 * These tests are adapted from the canonical data in the
 * `problem-specifications` repository.
 */
class AllYourBaseTest extends PHPUnit\Framework\TestCase
{
    public function testSingleBitOneToDecimal()
    {
        $this->assertEquals(rebase(2, [1], 10), [1]);
    }

    public function testBinaryToSingleDecimal()
    {
        $this->assertEquals(rebase(2, [1, 0, 1], 10), [5]);
    }

    public function testSingleDecimalToBinary()
    {
        $this->assertEquals(rebase(10, [5], 2), [1, 0, 1]);
    }

    public function testBinaryToMultipleDecimal()
    {
        $this->assertEquals(rebase(2, [1, 0, 1, 0, 1, 0], 10), [4, 2]);
    }

    public function testDecimalToBinary()
    {
        $this->assertEquals(rebase(10, [4, 2], 2), [1, 0, 1, 0, 1, 0]);
    }

    public function testTrinaryToHexadecimal()
    {
        $this->assertEquals(rebase(3, [1, 1, 2, 0], 16), [2, 10]);
    }

    public function testHexadecimalToTrinary()
    {
        $this->assertEquals(rebase(16, [2, 10], 3), [1, 1, 2, 0]);
    }

    public function test15BitIntegers()
    {
        $this->assertEquals(rebase(97, [3, 46, 60], 73), [6, 10, 45]);
    }

    public function testEmptyListReturnsNull()
    {
        $this->assertEquals(rebase(10, [], 10), null);
    }

    public function testSingleZeroReturnsNull()
    {
        $this->assertEquals(rebase(10, [0], 2), null);
    }

    public function testMultipleZerosReturnsNull()
    {
        $this->assertEquals(rebase(10, [0, 0, 0], 2), null);
    }

    public function testLeadingZerosReturnsNull()
    {
        $this->assertEquals(rebase(10, [0, 6, 0], 2), null);
    }

    public function testFirstBaseIsOne()
    {
        $this->assertEquals(rebase(1, [6, 0], 2), null);
    }

    public function testFirstBaseIsZero()
    {
        $this->assertEquals(rebase(0, [6, 0], 2), null);
    }

    public function testFirstBaseIsNegative()
    {
        $this->assertEquals(rebase(-1, [6, 0], 2), null);
    }

    public function testNegativeDigit()
    {
        $this->assertEquals(rebase(10, [1, -1, 0], 2), null);
    }

    public function testInvalidPositiveDigit()
    {
        $this->assertEquals(rebase(2, [1, 2, 0], 10), null);
    }

    public function testSecondBaseIsOne()
    {
        $this->assertEquals(rebase(2, [1, 1, 0], 1), null);
    }

    public function testSecondBaseIsZero()
    {
        $this->assertEquals(rebase(2, [1, 1, 0], 0), null);
    }

    public function testSecondBaseIsNegative()
    {
        $this->assertEquals(rebase(2, [1, 1, 0], -1), null);
    }

    public function testBothBasesIsNegative()
    {
        $this->assertEquals(rebase(-3, [1, 1, 0], -1), null);
    }
}
