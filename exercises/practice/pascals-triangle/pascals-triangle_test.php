<?php

class PascalsTriangleTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'pascals-triangle.php';
    }

    public function testZeroRows() : void
    {
        $this->assertSame([], pascalsTriangleRows(0));
    }

    public function testSingleRow() : void
    {
        $this->assertSame([[1]], pascalsTriangleRows(1));
    }
    public function testTwoRows() : void
    {
        $this->assertSame([[1], [1, 1]], pascalsTriangleRows(2));
    }
    public function testThreeRows() : void
    {
        $this->assertSame([[1], [1, 1], [1, 2, 1]], pascalsTriangleRows(3));
    }
    public function testFourRows() : void
    {
        $this->assertSame([[1], [1, 1], [1, 2, 1], [1, 3, 3, 1]], pascalsTriangleRows(4));
    }
    public function testNegativeRows() : void
    {
        $this->assertEquals(-1, pascalsTriangleRows(-1));
    }
    public function testNullNoRows() : void
    {
        $this->assertEquals(-1, pascalsTriangleRows(null));
    }
}
