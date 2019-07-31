<?php

class FlattenArrayTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'flatten-array.php';
    }

    public function testWithOutNesting() : void
    {
        $input = [0, 1, 2];
        $expected = [0, 1, 2];
        $this->assertEquals($expected, flatten($input));
    }
    public function testArrayWithJustIntegersPresent() : void
    {
        $input = [1, [2, 3, 4, 5, 6, 7], 8];
        $expected = [1, 2, 3, 4, 5, 6, 7, 8];
        $this->assertEquals($expected, flatten($input));
    }

    public function testFiveLevelNesting() : void
    {
        $input = [0, 2, [[2, 3], 8, 100, 4, [[[50]]]], -2];
        $expected = [0, 2, 2, 3, 8, 100, 4, 50, -2];
        $this->assertEquals($expected, flatten($input));
    }

    public function testSixLevelNesting() : void
    {
        $input = [1, [2, [[3]], [4, [[5]]], 6, 7], 8];
        $expected = [1, 2, 3, 4, 5, 6, 7, 8];
        $this->assertEquals($expected, flatten($input));
    }
    public function testSixLevelNestListWithNullValues() : void
    {
        $input = [0, 2, [[2, 3], 8, [[100]], null, [[null]]], -2];
        $expected = [0, 2, 2, 3, 8, 100, -2];
        $this->assertEquals($expected, flatten($input));
    }

    public function testAllValuesInNestedListAreNull() : void
    {
        $input = [null, [[[null]]], null, null, [[null, null], null], null];
        $expected = [];
        $this->assertEquals($expected, flatten($input));
    }
}
