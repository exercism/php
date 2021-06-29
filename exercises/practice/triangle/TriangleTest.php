<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class TriangleTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Triangle.php';
    }

    public function testEquilateralTrianglesHaveEqualSides(): void
    {
        $this->assertEquals(
            'equilateral',
            (new Triangle(2, 2, 2))->kind()
        );
    }

    public function testLargerEquilateralTrianglesHaveEqualSides(): void
    {
        $this->assertEquals(
            'equilateral',
            (new Triangle(10, 10, 10))->kind()
        );
    }

    public function testIsoscelesTriangleWhenLastTwoSidesAreEqual(): void
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(3, 4, 4))->kind()
        );
    }

    public function testIsoscelesTriangleWhenFirstAndLastSidesAreEqual(): void
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(4, 3, 4))->kind()
        );
    }

    public function testIsoscelesTriangleWhenFirstTwoSidesAreEqual(): void
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(4, 4, 3))->kind()
        );
    }

    public function testIsoscelesTrianglesWithUnequalSideLargerThanEqualSides(): void
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(4, 4, 7))->kind()
        );
    }

    public function testScaleneTrianglesHaveNoEqualSides(): void
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(3, 4, 5))->kind()
        );
    }

    public function test2aEqualsBPlusCLooksLikeEquilateralButIsNot(): void
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(5, 4, 6))->kind()
        );
    }

    public function testScaleneTrianglesHaveNoEqualSidesAtLargerScale(): void
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(10, 11, 12))->kind()
        );
    }

    public function testScaleneTrianglesHaveNoEqualSidesInDescendingOrder(): void
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(5, 4, 2))->kind()
        );
    }

    public function testVerySmallTrianglesAreLegal(): void
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(0.4, 0.6, 0.3))->kind()
        );
    }

    public function testTrianglesWithNoSizeAreIllegal(): void
    {
        $this->expectException(Exception::class);

        (new Triangle(0, 0, 0))->kind();
    }

    public function testTrianglesViolatingTriangleInequalityAreIllegal(): void
    {
        $this->expectException(Exception::class);

        (new Triangle(1, 1, 3))->kind();
    }

    public function testTrianglesViolatingTriangleInequalityAreIllegal2(): void
    {
        $this->expectException(Exception::class);

        (new Triangle(7, 3, 2))->kind();
    }

    public function testTrianglesViolatingTriangleInequalityAreIllegal3(): void
    {
        $this->expectException(Exception::class);

        (new Triangle(1, 3, 1))->kind();
    }
}
