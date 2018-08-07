<?php
require "series.php";

class SieveTest extends PHPUnit\Framework\TestCase
{
    public function testSlicesOfOne()
    {
        $this->assertEquals(
            slices("01234", 1),
            ["0", "1", "2", "3", "4"]
        );
    }

    public function testSlicesOfTwo()
    {
        $this->assertEquals(
            slices("97867564", 2),
            ["97", "78", "86", "67", "75", "56", "64"]
        );
    }

    public function testSlicesOfThree()
    {
        $this->assertEquals(
            slices("97867564", 3),
            ["978", "786", "867", "675", "756", "564"]
        );
    }

    public function testSlicesOfFour()
    {
        $this->assertEquals(
            slices("01234", 4),
            ["0123", "1234"]
        );
    }

    public function testSlicesOfFive()
    {
        $this->assertEquals(
            slices("01234", 5),
            ["01234"]
        );
    }

    public function testOverlyLongSlice()
    {
        $this->expectException(Exception::class);
        slices("012", 4);
    }

    public function testOverlyShortSlice()
    {
        $this->expectException(Exception::class);
        slices("01234", 0);
    }
}
