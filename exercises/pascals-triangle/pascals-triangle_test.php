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
        $this->markTestSkipped();
        $this->assertSame([[1]], pascalsTriangleRows(1));
    }
    public function testTwoRows()
    {
        $this->markTestSkipped();
        $this->assertSame([[1], [1, 1]], pascalsTriangleRows(2));
    }
    public function testThreeRows()
    {
        $this->markTestSkipped();
        $this->assertSame([[1], [1, 1], [1, 2, 1]], pascalsTriangleRows(3));
    }
    public function testFourRows()
    {
        $this->markTestSkipped();
        $this->assertSame([[1], [1, 1], [1, 2, 1], [1, 3, 3, 1]], pascalsTriangleRows(4));
    }
    public function testNegativeRows()
    {
        $this->markTestSkipped();
        $this->assertEquals(-1, pascalsTriangleRows(-1));
    }
    public function testNullNoRows()
    {
        $this->markTestSkipped();
        $this->assertEquals(-1, pascalsTriangleRows(null));
    }
}
