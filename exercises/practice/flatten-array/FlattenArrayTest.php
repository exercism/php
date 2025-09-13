<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class FlattenArrayTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'FlattenArray.php';
    }

    /**
     * uuid 8c71dabd-da60-422d-a290-4a571471fb14
     */
    #[TestDox('empty')]
    public function testEmpty(): void
    {
        $input = [];
        $expected = [];
        $this->assertEquals($expected, flatten($input));
    }

    /**
     * uuid d268b919-963c-442d-9f07-82b93f1b518c
     */
    #[TestDox('no nesting')]
    public function testWithOutNesting(): void
    {
        $input = [0, 1, 2];
        $expected = [0, 1, 2];
        $this->assertEquals($expected, flatten($input));
    }

    /**
     * uuid 3f15bede-c856-479e-bb71-1684b20c6a30
     */
    #[TestDox('flattens a nested array')]
    public function testFlattensANestedArray(): void
    {
        $input = [[[]]];
        $expected = [];
        $this->assertEquals($expected, flatten($input));
    }

    /**
     * uuid c84440cc-bb3a-48a6-862c-94cf23f2815d
     */
    #[TestDox('flattens array with just integers present')]
    public function testArrayWithJustIntegersPresent(): void
    {
        $input = [1, [2, 3, 4, 5, 6, 7], 8];
        $expected = [1, 2, 3, 4, 5, 6, 7, 8];
        $this->assertEquals($expected, flatten($input));
    }

    /**
     * uuid d3d99d39-6be5-44f5-a31d-6037d92ba34f
     */
    #[TestDox('5 level nesting')]
    public function testFiveLevelNesting(): void
    {
        $input = [0, 2, [[2, 3], 8, 100, 4, [[[50]]]], -2];
        $expected = [0, 2, 2, 3, 8, 100, 4, 50, -2];
        $this->assertEquals($expected, flatten($input));
    }

    /**
     * uuid d572bdba-c127-43ed-bdcd-6222ac83d9f7
     */
    #[TestDox('6 level nesting')]
    public function testSixLevelNesting(): void
    {
        $input = [1, [2, [[3]], [4, [[5]]], 6, 7], 8];
        $expected = [1, 2, 3, 4, 5, 6, 7, 8];
        $this->assertEquals($expected, flatten($input));
    }

    /**
     * uuid 0705a8e5-dc86-4cec-8909-150c5e54fa9c
     */
    #[TestDox('null values are omitted from the final result')]
    public function testNullValuesAreOmittedFromTheFinalResult(): void
    {
        $input = [1, 2, null];
        $expected = [1, 2];
        $this->assertEquals($expected, flatten($input));
    }

    /**
     * uuid bc72da10-5f55-4ada-baf3-50e4da02ec8e
     */
    #[TestDox('consecutive null values at the front of the array are omitted from the final result')]
    public function testConsecutiveNullValuesAtTheFrontOfTheArrayAreOmittedFromTheFinalResult(): void
    {
        $input = [null, null, 3];
        $expected = [3];
        $this->assertEquals($expected, flatten($input));
    }

    /**
     * uuid 6991836d-0d9b-4703-80a0-3f1f23eb5981
     */
    #[TestDox('consecutive null values in the middle of the array are omitted from the final result')]
    public function testConsecutiveNullValuesInTheMiddleOfTheArrayAreOmittedFromTheFinalResult(): void
    {
        $input = [1, null, null, 4];
        $expected = [1, 4];
        $this->assertEquals($expected, flatten($input));
    }

    /**
     * uuid dc90a09c-5376-449c-a7b3-c2d20d540069
     */
    #[TestDox('6 level nested array with null values')]
    public function testSixLevelNestedArrayWithNullValues(): void
    {
        $input = [0, 2, [[2, 3], 8, [[100]], null, [[null]]], -2];
        $expected = [0, 2, 2, 3, 8, 100, -2];
        $this->assertEquals($expected, flatten($input));
    }

    /**
     * uuid 51f5d9af-8f7f-4fb5-a156-69e8282cb275
     */
    #[TestDox('all values in nested array are null')]
    public function testAllValuesInNestedListAreNull(): void
    {
        $input = [null, [[[null]]], null, null, [[null, null], null], null];
        $expected = [];
        $this->assertEquals($expected, flatten($input));
    }
}
