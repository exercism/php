<?php

declare(strict_types=1);

class BinarySearchTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'BinarySearch.php';
    }

    /**
     * @testdox It works with one element
     * uuid b55c24a9-a98d-4379-a08c-2adcf8ebeee8
     */
    public function testItWorksWithOneElement(): void
    {
        $this->assertEquals(0, find(6, [6]));
    }

    /**
     * @testdox It finds value in the middle
     * uuid 73469346-b0a0-4011-89bf-989e443d503d
     */
    public function testItFindsValueInMiddle(): void
    {
        $this->assertEquals(3, find(6, [1, 3, 4, 6, 8, 9, 11]));
    }

    /**
     * @testdox It finds value at the beginning
     * uuid 327bc482-ab85-424e-a724-fb4658e66ddb
     */
    public function testItFindsValueInBeginning(): void
    {
        $this->assertEquals(0, find(1, [1, 3, 4, 6, 8, 9, 11]));
    }

    /**
     * @testdox It finds value at the end
     * uuid f9f94b16-fe5e-472c-85ea-c513804c7d59
     */
    public function testItFindsValueAtEnd(): void
    {
        $this->assertEquals(6, find(11, [1, 3, 4, 6, 8, 9, 11]));
    }

    /**
     * @testdox It finds value in an odd-length array
     * uuid f0068905-26e3-4342-856d-ad153cadb338
     */
    public function testItFindsValueInOddLengthArray(): void
    {
        $this->assertEquals(9, find(144, [1, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 634]));
    }

    /**
     * @testdox It finds value in an even-length array
     * uuid fc316b12-c8b3-4f5e-9e89-532b3389de8c
     */
    public function testItFindsValueInEvenLengthArray(): void
    {
        $this->assertEquals(5, find(21, [1, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377]));
    }

    /**
     * @testdox It identifies that value is not in array
     * uuid da7db20a-354f-49f7-a6a1-650a54998aa6
     */
    public function testValueNotIncludedInArray(): void
    {
        $this->assertEquals(-1, find(7, [1, 3, 4, 6, 8, 9, 11]));
    }

    /**
     * @testdox It does not find a value lower than the lowest value
     * uuid 95d869ff-3daf-4c79-b622-6e805c675f97
     */
    public function testLowerThanLowestValueNotIn(): void
    {
        $this->assertEquals(-1, find(0, [1, 3, 4, 6, 8, 9, 11]));
    }

    /**
     * @testdox It does not find a value larger than the largest value
     * uuid 8b24ef45-6e51-4a94-9eac-c2bf38fdb0ba
     */
    public function testLargerThanLargestValueNotIn(): void
    {
        $this->assertEquals(-1, find(13, [1, 3, 4, 6, 8, 9, 11]));
    }

    /**
     * @testdox It does not find any value in an empty array
     * uuid f439a0fa-cf42-4262-8ad1-64bf41ce566a
     */
    public function testNothingInEmptyArray(): void
    {
        $this->assertEquals(-1, find(1, []));
    }

    /**
     * @testdox It does not find any value in left and right of array
     * uuid 2c353967-b56d-40b8-acff-ce43115eed64
     */
    public function testNothingFoundInLeftAndRight()
    {
        $this->assertEquals(-1, find(0, [1, 2]));
    }
}
