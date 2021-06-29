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

class FlattenArrayTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'FlattenArray.php';
    }

    public function testWithOutNesting(): void
    {
        $input = [0, 1, 2];
        $expected = [0, 1, 2];
        $this->assertEquals($expected, flatten($input));
    }
    public function testArrayWithJustIntegersPresent(): void
    {
        $input = [1, [2, 3, 4, 5, 6, 7], 8];
        $expected = [1, 2, 3, 4, 5, 6, 7, 8];
        $this->assertEquals($expected, flatten($input));
    }

    public function testFiveLevelNesting(): void
    {
        $input = [0, 2, [[2, 3], 8, 100, 4, [[[50]]]], -2];
        $expected = [0, 2, 2, 3, 8, 100, 4, 50, -2];
        $this->assertEquals($expected, flatten($input));
    }

    public function testSixLevelNesting(): void
    {
        $input = [1, [2, [[3]], [4, [[5]]], 6, 7], 8];
        $expected = [1, 2, 3, 4, 5, 6, 7, 8];
        $this->assertEquals($expected, flatten($input));
    }
    public function testSixLevelNestListWithNullValues(): void
    {
        $input = [0, 2, [[2, 3], 8, [[100]], null, [[null]]], -2];
        $expected = [0, 2, 2, 3, 8, 100, -2];
        $this->assertEquals($expected, flatten($input));
    }

    public function testAllValuesInNestedListAreNull(): void
    {
        $input = [null, [[[null]]], null, null, [[null, null], null], null];
        $expected = [];
        $this->assertEquals($expected, flatten($input));
    }
}
