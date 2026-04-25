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

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class MatrixTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Matrix.php';
    }

    /** uuid: ca733dab-9d85-4065-9ef6-a880a951dafd */
    #[TestDox('extract row from one number matrix')]
    public function testExtractRowFromOneNumberMatrix(): void
    {
        $matrix = new Matrix("1");

        $this->assertEquals([1], $matrix->getRow(1));
    }

    /** uuid: 5c93ec93-80e1-4268-9fc2-63bc7d23385c */
    #[TestDox('can extract row')]
    public function testExtractRow(): void
    {
        $matrix = new Matrix("1 2\n3 4");

        $this->assertEquals([3, 4], $matrix->getRow(2));
    }

    /** uuid: 2f1aad89-ad0f-4bd2-9919-99a8bff0305a */
    #[TestDox('extract row where numbers have different widths')]
    public function testExtractRowWhereNumbersHaveDifferentWidths(): void
    {
        $matrix = new Matrix("1, 2\n10 20");

        $this->assertEquals([10, 20], $matrix->getRow(2));
    }

    /** uuid: 68f7f6ba-57e2-4e87-82d0-ad09889b5204 */
    #[TestDox('can extract row from non-square matrix with no corresponding column')]
    public function testExtractRowFromNonSquareMatrixWithNoMatchingColumn(): void
    {
        $matrix = new Matrix("1 2 3\n4 5 6\n7 8 9\n8 7 6");

        $this->assertEquals([8, 7, 6], $matrix->getRow(4));
    }

    /** uuid: e8c74391-c93b-4aed-8bfe-f3c9beb89ebb */
    #[TestDox('extract column from one number matrix')]
    public function testExtractColumnFromOneNumberMatrix(): void
    {
        $matrix = new Matrix("1");

        $this->assertEquals([1], $matrix->getColumn(1));
    }

    /** uuid: 7136bdbd-b3dc-48c4-a10c-8230976d3727 */
    #[TestDox('can extract column')]
    public function testExtractColumn(): void
    {
        $matrix = new Matrix("1 2 3\n4 5 6\n7 8 9");

        $this->assertEquals([3, 6, 9], $matrix->getColumn(3));
    }

    /** uuid: ad64f8d7-bba6-4182-8adf-0c14de3d0eca */
    #[TestDox('can extract column from non-square matrix with no corresponding row')]
    public function testExtractColumnFromNonSquareMatrixWithNoMatchRow(): void
    {
        $matrix = new Matrix("1 2 3 4\n5 6 7 8\n9 8 7 6");

        $this->assertEquals([4, 8, 6], $matrix->getColumn(4));
    }

    /** uuid: 9eddfa5c-8474-440e-ae0a-f018c2a0dd89 */
    #[TestDox('extract column where numbers have different widths')]
    public function testExtractColumnWhenNumbersHaveDifferentWidths(): void
    {
        $matrix = new Matrix("89 1903 3\n18 3 1\n9 41 800");

        $this->assertEquals([1903, 3, 41], $matrix->getColumn(2));
    }
}
