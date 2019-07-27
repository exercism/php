<?php

class BinarySearchTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'binary-search.php';
    }

    public function testItWorksWithOneElement() : void
    {
        $this->assertEquals(0, find(6, [6]));
    }

    public function testItFindsValueInMiddle() : void
    {
        $this->assertEquals(3, find(6, [1, 3, 4, 6, 8, 9, 11]));
    }

    public function testItFindsValueInBeginning() : void
    {
        $this->assertEquals(0, find(1, [1, 3, 4, 6, 8, 9, 11]));
    }

    public function testItFindsValueAtEnd() : void
    {
        $this->assertEquals(6, find(11, [1, 3, 4, 6, 8, 9, 11]));
    }

    public function testItFindsValueInOddLengthArray() : void
    {
        $this->assertEquals(9, find(144, [1, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 634]));
    }

    public function testItFindsValueInEvenLengthArray() : void
    {
        $this->assertEquals(5, find(21, [1, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377]));
    }
    public function testLowerThanLowestValueNotIn() : void
    {
        $this->assertEquals(-1, find(0, [1, 3, 4, 6, 8, 9, 11]));
    }

    public function testLargerThanLargestValueNotIn() : void
    {
        $this->assertEquals(-1, find(13, [1, 3, 4, 6, 8, 9, 11]));
    }

    public function testNothingInEmptyArray() : void
    {
        $this->assertEquals(-1, find(1, []));
    }
}
