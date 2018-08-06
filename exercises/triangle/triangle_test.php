<?php

require "triangle.php";

class TriangleTest extends PHPUnit\Framework\TestCase
{
    public function testEquilateralTrianglesHaveEqualSides()
    {
        $this->assertEquals(
            'equilateral',
            (new Triangle(2, 2, 2))->kind()
        );
    }

    public function testLargerEquilateralTrianglesHaveEqualSides()
    {
        $this->assertEquals(
            'equilateral',
            (new Triangle(10, 10, 10))->kind()
        );
    }

    public function testIsoscelesTriangleWhenLastTwoSidesAreEqual()
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(3, 4, 4))->kind()
        );
    }

    public function testIsoscelesTriangleWhenFirstAndLastSidesAreEqual()
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(4, 3, 4))->kind()
        );
    }

    public function testIsoscelesTriangleWhenFirstTwoSidesAreEqual()
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(4, 4, 3))->kind()
        );
    }

    public function testIsoscelesTrianglesWithUnequalSideLargerThanEqualSides()
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(4, 4, 7))->kind()
        );
    }

    public function testScaleneTrianglesHaveNoEqualSides()
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(3, 4, 5))->kind()
        );
    }

    public function test2aEqualsBPlusCLooksLikeEquilateralButIsNot()
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(5, 4, 6))->kind()
        );
    }

    public function testScaleneTrianglesHaveNoEqualSidesAtLargerScale()
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(10, 11, 12))->kind()
        );
    }

    public function testScaleneTrianglesHaveNoEqualSidesInDescendingOrder()
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(5, 4, 2))->kind()
        );
    }

    public function testVerySmallTrianglesAreLegal()
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(0.4, 0.6, 0.3))->kind()
        );
    }

    /**
     * @expectedException \Exception
     */
    public function testTrianglesWithNoSizeAreIllegal()
    {
        (new Triangle(0, 0, 0))->kind();
    }

    /**
     * @expectedException \Exception
     */
    public function testTrianglesViolatingTriangleInequalityAreIllegal()
    {
        (new Triangle(1, 1, 3))->kind();
    }

    /**
     * @expectedException \Exception
     */
    public function testTrianglesViolatingTriangleInequalityAreIllegal2()
    {
        (new Triangle(7, 3, 2))->kind();
    }

    /**
     * @expectedException \Exception
     */
    public function testTrianglesViolatingTriangleInequalityAreIllegal3()
    {
        (new Triangle(1, 3, 1))->kind();
    }
}
