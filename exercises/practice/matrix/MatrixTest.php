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

class MatrixTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Matrix.php';
    }

    public function testExtractRowFromOneNumberMatrix(): void
    {
        $matrix = new Matrix("1");

        $this->assertEquals([1], $matrix->getRow(1));
    }

    public function testExtractRow(): void
    {
        $matrix = new Matrix("1 2\n3 4");

        $this->assertEquals([3, 4], $matrix->getRow(2));
    }

    public function testExtractRowWhereNumbersHaveDifferentWidths(): void
    {
        $matrix = new Matrix("1, 2\n10 20");

        $this->assertEquals([10, 20], $matrix->getRow(2));
    }

    public function testExtractRowFromNonSquareMatrixWithNoMatchingColumn(): void
    {
        $matrix = new Matrix("1 2 3\n4 5 6\n7 8 9\n8 7 6");

        $this->assertEquals([8, 7, 6], $matrix->getRow(4));
    }

    public function testExtractColumnFromOneNumberMatrix(): void
    {
        $matrix = new Matrix("1");

        $this->assertEquals([1], $matrix->getColumn(1));
    }

    public function testExtractColumn(): void
    {
        $matrix = new Matrix("1 2 3\n4 5 6\n7 8 9");

        $this->assertEquals([3, 6, 9], $matrix->getColumn(3));
    }

    public function testExtractColumnFromNonSquareMatrixWithNoMatchRow(): void
    {
        $matrix = new Matrix("1 2 3 4\n5 6 7 8\n9 8 7 6");

        $this->assertEquals([4, 8, 6], $matrix->getColumn(4));
    }

    public function testExtractColumnWhenNumbersHaveDifferentWidths(): void
    {
        $matrix = new Matrix("89 1903 3\n18 3 1\n9 41 800");

        $this->assertEquals([1903, 3, 41], $matrix->getColumn(2));
    }
}
