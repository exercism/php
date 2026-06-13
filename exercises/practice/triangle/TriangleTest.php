<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class TriangleTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Triangle.php';
    }

  /**
   * Uuid: 8b2c43ac-7257-43f9-b552-7631a91988af.
   */
    #[TestDox('equilateral triangle -> all sides are equal')]
    public function testEquilateralTrianglesHaveEqualSides(): void
    {
        $this->assertEquals(
            'equilateral',
            (new Triangle(2, 2, 2))->kind()
        );
    }

  /**
   * Uuid: 33eb6f87-0498-4ccf-9573-7f8c3ce92b7b.
   */
    #[TestDox('equilateral triangle -> any side is unequal')]
    public function testAnySideIsUnequal(): void
    {

        $this->expectException(Exception::class);
        (new Triangle(2, 3, 2))->kind();
    }

  /**
   * Uuid: c6585b7d-a8c0-4ad8-8a34-e21d36f7ad87.
   */
    #[TestDox('equilateral triangle -> no sides are equal')]
    public function testNoSidesAreEqual(): void
    {
        $this->expectException(Exception::class);

        (new Triangle(5, 4, 6))->kind();
    }

  /**
   * Uuid: 16e8ceb0-eadb-46d1-b892-c50327479251.
   */
    #[TestDox('equilateral triangle -> all zero sides is not a triangle')]
    public function testEquilateralAllZeroSidesIsNotATriangle(): void
    {
        $this->expectException(Exception::class);

        (new Triangle(0, 0, 0))->kind();
    }

  /**
   * Uuid: 3022f537-b8e5-4cc1-8f12-fd775827a00c.
   */
    #[TestDox('equilateral triangle -> sides may be floats')]
    public function testEquilateralSidesMayBeFloats(): void
    {
        $this->assertEquals(
            'equilateral',
            (new Triangle(0.5, 0.5, 0.5)->kind())
        );
    }

  /**
   * Uuid: cbc612dc-d75a-4c1c-87fc-e2d5edd70b71.
   */
    #[TestDox('isosceles triangle -> last two sides are equal')]
    public function testIsoscelesTriangleWhenLastTwoSidesAreEqual(): void
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(3, 4, 4))->kind()
        );
    }

  /**
   * Uuid: e388ce93-f25e-4daf-b977-4b7ede992217.
   */
    #[TestDox('isosceles triangle -> first two sides are equal')]
    public function testIsoscelesTriangleWhenFirstTwoSidesAreEqual(): void
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(4, 4, 3))->kind()
        );
    }

  /**
   * Uuid: d2080b79-4523-4c3f-9d42-2da6e81ab30f.
   */
    #[TestDox('isosceles triangle -> first and last sides are equal')]
    public function testIsoscelesTriangleWhenFirstAndLastSidesAreEqual(): void
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(4, 3, 4))->kind()
        );
    }

  /**
   * Uuid: 8d71e185-2bd7-4841-b7e1-71689a5491d8.
   */
    #[TestDox('isosceles triangle -> equilateral triangles are also isosceles')]
    public function testIsoscelesTriangleEquilateralTrianglesAreAlsoIsoceles(): void
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(4, 4, 4))->kind()
        );
    }

   /**
   * Uuid: 840ed5f8-366f-43c5-ac69-8f05e6f10bbb.
   */
    #[TestDox('isosceles triangle -> no sides are equal')]
    public function testIsoscelesTriangleNoSidesAreEqual(): void
    {
        $this->expectException(Exception::class);
        (new Triangle(2, 3, 4))->kind();
    }

   /**
   * Uuid: 2eba0cfb-6c65-4c40-8146-30b608905eae.
   */
    #[TestDox('isosceles triangle -> first triangle inequality violation')]
    public function testIsoscelesFirstTriangleInequalityViolation(): void
    {
        $this->expectException(Exception::class);

        (new Triangle(1, 1, 3))->kind();
    }

  /**
   * Uuid: 278469cb-ac6b-41f0-81d4-66d9b828f8ac.
   */
    #[TestDox('isosceles triangle -> second triangle inequality violation')]
    public function testIsoscelesSecondTriangleInequalityViolation(): void
    {
        $this->expectException(Exception::class);

        (new Triangle(1, 3, 1))->kind();
    }

  /**
  * Uuid: 90efb0c7-72bb-4514-b320-3a3892e278ff.
  */
    #[TestDox('isosceles triangle -> third triangle inequality violation')]
    public function testTrianglesThirdTriangleInequalityViolation(): void
    {
        $this->expectException(Exception::class);

        (new Triangle(3, 1, 1))->kind();
    }

  /**
   * Uuid: adb4ee20-532f-43dc-8d31-e9271b7ef2bc.
   */
    #[TestDox('isosceles triangle -> sides may be floats')]
    public function testIsoscelesSidesMayBeFloats(): void
    {
        $this->assertEquals(
            'isosceles',
            (new Triangle(0.5, 0.4, 0.5))->kind()
        );
    }

  /**
   * Uuid: 2510001f-b44d-4d18-9872-2303e7977dc1.
   */
    #[TestDox('scalene triangle -> all sides are equal')]
    public function testScaleneAllSidesAreEqual(): void
    {

        $this->expectException(Exception::class);
        (new Triangle(4, 4, 4))->kind();
    }

  /**
   * Uuid: c6e15a92-90d9-4fb3-90a2-eef64f8d3e1e.
   */
    #[TestDox('scalene triangle -> first and second sides are equal')]
    public function testScaleneFirstAndSecondSidesAreEqual(): void
    {

        $this->expectException(Exception::class);
        (new Triangle(4, 4, 3))->kind();
    }

  /**
   * Uuid: 3da23a91-a166-419a-9abf-baf4868fd985.
   */
    #[TestDox('scalene triangle -> first and third sides are equal')]
    public function testScaleneFirstAndThirdSidesAreEqual(): void
    {
        $this->expectException(Exception::class);
        (new Triangle(3, 4, 3))->kind();
    }

  /**
   * Uuid: b6a75d98-1fef-4c42-8e9a-9db854ba0a4d.
   */
    #[TestDox('scalene triangle -> second and third sides are equal')]
    public function testScaleneSecondAndThirdSidesAreEqual(): void
    {
        $this->expectException(Exception::class);
        (new Triangle(4, 3, 3))->kind();
    }

  /**
   * Uuid: 70ad5154-0033-48b7-af2c-b8d739cd9fdc.
   */
    #[TestDox('scalene triangle -> may not violate triangle inequality')]
    public function testScaleneMayNotViolateTriangleInequality(): void
    {
        $this->expectException(Exception::class);
        (new Triangle(7, 3, 2))->kind();
    }

  /**
   * Uuid: 26d9d59d-f8f1-40d3-ad58-ae4d54123d7d.
   */
    #[TestDox('scalene triangle -> sides may be floats')]
    public function testScaleneSidesMayBeFloats(): void
    {
        $this->assertEquals(
            'scalene',
            (new Triangle(0.5, 0.4, 0.6))->kind()
        );
    }
}
