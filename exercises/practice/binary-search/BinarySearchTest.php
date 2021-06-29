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

class BinarySearchTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'BinarySearch.php';
    }

    public function testItWorksWithOneElement(): void
    {
        $this->assertEquals(0, find(6, [6]));
    }

    public function testItFindsValueInMiddle(): void
    {
        $this->assertEquals(3, find(6, [1, 3, 4, 6, 8, 9, 11]));
    }

    public function testItFindsValueInBeginning(): void
    {
        $this->assertEquals(0, find(1, [1, 3, 4, 6, 8, 9, 11]));
    }

    public function testItFindsValueAtEnd(): void
    {
        $this->assertEquals(6, find(11, [1, 3, 4, 6, 8, 9, 11]));
    }

    public function testItFindsValueInOddLengthArray(): void
    {
        $this->assertEquals(9, find(144, [1, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 634]));
    }

    public function testItFindsValueInEvenLengthArray(): void
    {
        $this->assertEquals(5, find(21, [1, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377]));
    }
    public function testLowerThanLowestValueNotIn(): void
    {
        $this->assertEquals(-1, find(0, [1, 3, 4, 6, 8, 9, 11]));
    }

    public function testLargerThanLargestValueNotIn(): void
    {
        $this->assertEquals(-1, find(13, [1, 3, 4, 6, 8, 9, 11]));
    }

    public function testNothingInEmptyArray(): void
    {
        $this->assertEquals(-1, find(1, []));
    }
}
