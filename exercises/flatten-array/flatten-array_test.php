<?php

require 'flatten-array.php';

class FlattenArrayTest extends PHPUnit\Framework\TestCase
{
    public function testWithOutNesting()
    {
        $input = [0, 1, 2];
        $expected = [0, 1, 2];
        $this->assertEquals($expected, flatten($input));
    }
    public function testArrayWithJustIntegersPresent()
    {
        $input = [1, [2, 3, 4, 5, 6, 7], 8];
        $expected = [1, 2, 3, 4, 5, 6, 7, 8];
        $this->assertEquals($expected, flatten($input));
    }

    public function testFiveLevelNesting()
    {
        $input = [0, 2, [[2, 3], 8, 100, 4, [[[50]]]], -2];
        $expected = [0, 2, 2, 3, 8, 100, 4, 50, -2];
        $this->assertEquals($expected, flatten($input));
    }

    public function testSixLevelNesting()
    {
        $input = [1, [2, [[3]], [4, [[5]]], 6, 7], 8];
        $expected = [1, 2, 3, 4, 5, 6, 7, 8];
        $this->assertEquals($expected, flatten($input));
    }
    public function testSixLevelNestListWithNullValues()
    {
        $input = [0, 2, [[2, 3], 8, [[100]], null, [[null]]], -2];
        $expected = [0, 2, 2, 3, 8, 100, -2];
        $this->assertEquals($expected, flatten($input));
    }

    public function testAllValuesInNestedListAreNull()
    {
        $input = [null, [[[null]]], null, null, [[null, null], null], null];
        $expected = [];
        $this->assertEquals($expected, flatten($input));
    }
}
