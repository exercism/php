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
        $this->markTestSkipped();
        $this->assertEquals(rebase(2, [1, 0, 1], 10), [5]);
    }

    public function testSingleDecimalToBinary()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(10, [5], 2), [1, 0, 1]);
    }

    public function testBinaryToMultipleDecimal()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(2, [1, 0, 1, 0, 1, 0], 10), [4, 2]);
    }

    public function testDecimalToBinary()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(10, [4, 2], 2), [1, 0, 1, 0, 1, 0]);
    }

    public function testTrinaryToHexadecimal()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(3, [1, 1, 2, 0], 16), [2, 10]);
    }

    public function testHexadecimalToTrinary()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(16, [2, 10], 3), [1, 1, 2, 0]);
    }

    public function test15BitIntegers()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(97, [3, 46, 60], 73), [6, 10, 45]);
    }

    public function testEmptyListReturnsNull()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(10, [], 10), null);
    }

    public function testSingleZeroReturnsNull()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(10, [0], 2), null);
    }

    public function testMultipleZerosReturnsNull()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(10, [0, 0, 0], 2), null);
    }

    public function testLeadingZerosReturnsNull()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(10, [0, 6, 0], 2), null);
    }

    public function testFirstBaseIsOne()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(1, [6, 0], 2), null);
    }

    public function testFirstBaseIsZero()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(0, [6, 0], 2), null);
    }

    public function testFirstBaseIsNegative()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(-1, [6, 0], 2), null);
    }

    public function testNegativeDigit()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(10, [1, -1, 0], 2), null);
    }

    public function testInvalidPositiveDigit()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(2, [1, 2, 0], 10), null);
    }

    public function testSecondBaseIsOne()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(2, [1, 1, 0], 1), null);
    }

    public function testSecondBaseIsZero()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(2, [1, 1, 0], 0), null);
    }

    public function testSecondBaseIsNegative()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(2, [1, 1, 0], -1), null);
    }

    public function testBothBasesIsNegative()
    {
        $this->markTestSkipped();
        $this->assertEquals(rebase(-3, [1, 1, 0], -1), null);
    }
}
