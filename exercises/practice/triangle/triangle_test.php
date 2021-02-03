<?php

class TriangleTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'triangle.php';
    }

    public function testEquilateralTrianglesHaveEqualSides() : void
    {
        $this->assertEquals(
            'equilateral',
            (new Triangle(2, 2, 2))->kind()
        );
    }

    public function testLargerEquilateralTrianglesHaveEqualSides() : void
    {
        $this->assertEquals(
            'equilateral',
            (new Triangle(10, 10, 10))->kind()
        );
    }

    public function testIsoscelesTriangleWhenLastTwoSidesAreEqual() : void
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(3, 4, 4))->kind()
        );
    }

    public function testIsoscelesTriangleWhenFirstAndLastSidesAreEqual() : void
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(4, 3, 4))->kind()
        );
    }

    public function testIsoscelesTriangleWhenFirstTwoSidesAreEqual() : void
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(4, 4, 3))->kind()
        );
    }

    public function testIsoscelesTrianglesWithUnequalSideLargerThanEqualSides() : void
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(4, 4, 7))->kind()
        );
    }

    public function testScaleneTrianglesHaveNoEqualSides() : void
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(3, 4, 5))->kind()
        );
    }

    public function test2aEqualsBPlusCLooksLikeEquilateralButIsNot() : void
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(5, 4, 6))->kind()
        );
    }

    public function testScaleneTrianglesHaveNoEqualSidesAtLargerScale() : void
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(10, 11, 12))->kind()
        );
    }

    public function testScaleneTrianglesHaveNoEqualSidesInDescendingOrder() : void
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(5, 4, 2))->kind()
        );
    }

    public function testVerySmallTrianglesAreLegal() : void
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(0.4, 0.6, 0.3))->kind()
        );
    }

    public function testTrianglesWithNoSizeAreIllegal() : void
    {
        $this->expectException(Exception::class);

        (new Triangle(0, 0, 0))->kind();
    }

    public function testTrianglesViolatingTriangleInequalityAreIllegal() : void
    {
        $this->expectException(Exception::class);

        (new Triangle(1, 1, 3))->kind();
    }

    public function testTrianglesViolatingTriangleInequalityAreIllegal2() : void
    {
        $this->expectException(Exception::class);

        (new Triangle(7, 3, 2))->kind();
    }

    public function testTrianglesViolatingTriangleInequalityAreIllegal3() : void
    {
        $this->expectException(Exception::class);

        (new Triangle(1, 3, 1))->kind();
    }
}
