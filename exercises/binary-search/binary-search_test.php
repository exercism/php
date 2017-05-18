<?php

require_once 'binary-search.php';

class BinarySearchTest extends PHPUnit\Framework\TestCase
{
    public function testItWorksWithOneElement()
    {
        $this->assertEquals(0, find(6, [6]));
    }

    public function testItFindsValueInMiddle()
    {
        $this->markTestSkipped();
        $this->assertEquals(3, find(6, [1, 3, 4, 6, 8, 9, 11]));
    }

    public function testItFindsValueInBeginning()
    {
        $this->markTestSkipped();
        $this->assertEquals(0, find(1, [1, 3, 4, 6, 8, 9, 11]));
    }

    public function testItFindsValueAtEnd()
    {
        $this->markTestSkipped();
        $this->assertEquals(6, find(11, [1, 3, 4, 6, 8, 9, 11]));
    }

    public function testItFindsValueInOddLengthArray()
    {
        $this->markTestSkipped();
        $this->assertEquals(9, find(144, [1, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 634]));
    }

    public function testItFindsValueInEvenLengthArray()
    {
        $this->markTestSkipped();
        $this->assertEquals(5, find(21, [1, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377]));
    }
    public function testLowerThanLowestValueNotIn()
    {
        $this->markTestSkipped();
        $this->assertEquals(-1, find(0, [1, 3, 4, 6, 8, 9, 11]));
    }

    public function testLargerThanLargestValueNotIn()
    {
        $this->markTestSkipped();
        $this->assertEquals(-1, find(13, [1, 3, 4, 6, 8, 9, 11]));
    }

    public function testNothingInEmptyArray()
    {
        $this->markTestSkipped();
        $this->assertEquals(-1, find(1, []));
    }
}
