<?php

/**
 * These tests are adapted from the canonical data in the
 * `problem-specifications` repository.
 */
class AllYourBaseTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'all-your-base.php';
    }

    public function testSingleBitOneToDecimal() : void
    {
        $this->assertEquals(rebase(2, [1], 10), [1]);
    }

    public function testBinaryToSingleDecimal() : void
    {
        $this->assertEquals(rebase(2, [1, 0, 1], 10), [5]);
    }

    public function testSingleDecimalToBinary() : void
    {
        $this->assertEquals(rebase(10, [5], 2), [1, 0, 1]);
    }

    public function testBinaryToMultipleDecimal() : void
    {
        $this->assertEquals(rebase(2, [1, 0, 1, 0, 1, 0], 10), [4, 2]);
    }

    public function testDecimalToBinary() : void
    {
        $this->assertEquals(rebase(10, [4, 2], 2), [1, 0, 1, 0, 1, 0]);
    }

    public function testTrinaryToHexadecimal() : void
    {
        $this->assertEquals(rebase(3, [1, 1, 2, 0], 16), [2, 10]);
    }

    public function testHexadecimalToTrinary() : void
    {
        $this->assertEquals(rebase(16, [2, 10], 3), [1, 1, 2, 0]);
    }

    public function test15BitIntegers() : void
    {
        $this->assertEquals(rebase(97, [3, 46, 60], 73), [6, 10, 45]);
    }

    public function testEmptyListReturnsNull() : void
    {
        $this->assertEquals(rebase(10, [], 10), null);
    }

    public function testSingleZeroReturnsNull() : void
    {
        $this->assertEquals(rebase(10, [0], 2), null);
    }

    public function testMultipleZerosReturnsNull() : void
    {
        $this->assertEquals(rebase(10, [0, 0, 0], 2), null);
    }

    public function testLeadingZerosReturnsNull() : void
    {
        $this->assertEquals(rebase(10, [0, 6, 0], 2), null);
    }

    public function testFirstBaseIsOne() : void
    {
        $this->assertEquals(rebase(1, [6, 0], 2), null);
    }

    public function testFirstBaseIsZero() : void
    {
        $this->assertEquals(rebase(0, [6, 0], 2), null);
    }

    public function testFirstBaseIsNegative() : void
    {
        $this->assertEquals(rebase(-1, [6, 0], 2), null);
    }

    public function testNegativeDigit() : void
    {
        $this->assertEquals(rebase(10, [1, -1, 0], 2), null);
    }

    public function testInvalidPositiveDigit() : void
    {
        $this->assertEquals(rebase(2, [1, 2, 0], 10), null);
    }

    public function testSecondBaseIsOne() : void
    {
        $this->assertEquals(rebase(2, [1, 1, 0], 1), null);
    }

    public function testSecondBaseIsZero() : void
    {
        $this->assertEquals(rebase(2, [1, 1, 0], 0), null);
    }

    public function testSecondBaseIsNegative() : void
    {
        $this->assertEquals(rebase(2, [1, 1, 0], -1), null);
    }

    public function testBothBasesIsNegative() : void
    {
        $this->assertEquals(rebase(-3, [1, 1, 0], -1), null);
    }
}
