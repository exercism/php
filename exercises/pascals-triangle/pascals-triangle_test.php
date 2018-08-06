<?php

require "pascals-triangle.php";

class PascalsTriangleTest extends PHPUnit\Framework\TestCase
{
    public function testZeroRows()
    {
        $this->assertSame([], pascalsTriangleRows(0));
    }

    public function testSingleRow()
    {
        $this->assertSame([[1]], pascalsTriangleRows(1));
    }
    public function testTwoRows()
    {
        $this->assertSame([[1], [1, 1]], pascalsTriangleRows(2));
    }
    public function testThreeRows()
    {
        $this->assertSame([[1], [1, 1], [1, 2, 1]], pascalsTriangleRows(3));
    }
    public function testFourRows()
    {
        $this->assertSame([[1], [1, 1], [1, 2, 1], [1, 3, 3, 1]], pascalsTriangleRows(4));
    }
    public function testNegativeRows()
    {
        $this->assertEquals(-1, pascalsTriangleRows(-1));
    }
    public function testNullNoRows()
    {
        $this->assertEquals(-1, pascalsTriangleRows(null));
    }
}
