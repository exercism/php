<?php

declare(strict_types=1);

class LeapTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Leap.php';
    }

    /**
     * uuid 6466b30d-519c-438e-935d-388224ab5223
     * @testdox Year not divisible by 4 in common year
     */
    public function testCommonYearNotDivisibleBy4(): void
    {
        $this->assertFalse(isLeap(2015));
    }

    /**
     * uuid ac227e82-ee82-4a09-9eb6-4f84331ffdb0
     * @testdox Year divisible by 2, not divisible by 4 in common year
     */
    public function testCommonYearDivisibleBy2Not4(): void
    {
        $this->assertFalse(isLeap(1970));
    }

    /**
     * uuid 4fe9b84c-8e65-489e-970b-856d60b8b78e
     * @testdox Year divisible by 4, not divisible by 100 in leap year
     */
    public function testLeapYearDivisibleBy4Not100(): void
    {
        $this->assertTrue(isLeap(1996));
    }

    /**
     * uuid 7fc6aed7-e63c-48f5-ae05-5fe182f60a5d
     * @testdox Year divisible by 4 and 5 is still a leap year
     */
    public function testLeapYearDivisibleBy4And5(): void
    {
        $this->assertTrue(isLeap(1960));
    }

    /**
     * uuid 78a7848f-9667-4192-ae53-87b30c9a02dd
     * @testdox Year divisible by 100, not divisible by 400 in common year
     */
    public function testCommonYearDivisibleBy100Not400(): void
    {
        $this->assertFalse(isLeap(2100));
    }

    /**
     * uuid 9d70f938-537c-40a6-ba19-f50739ce8bac
     * @testdox Year divisible by 100 but not by 3 is still not a leap year
     */
    public function testCommonYearDivisibleBy100Not3(): void
    {
        $this->assertFalse(isLeap(1900));
    }

    /**
     * uuid 42ee56ad-d3e6-48f1-8e3f-c84078d916fc
     * @testdox Year divisible by 400 is leap year
     */
    public function testLeapYearDivisibleBy400(): void
    {
        $this->assertTrue(isLeap(2000));
    }

    /**
     * uuid 57902c77-6fe9-40de-8302-587b5c27121e
     * @testdox Year divisible by 400 but not by 125 is still a leap year
     */
    public function testLeapYearDivisibleBy400Not125(): void
    {
        $this->assertTrue(isLeap(2400));
    }

    /**
     * uuid c30331f6-f9f6-4881-ad38-8ca8c12520c1
     * @testdox Year divisible by 200, not divisible by 400 in common year
     */
    public function testCommonYearDivisibleBy200Not400(): void
    {
        $this->assertFalse(isLeap(1800));
    }
}
