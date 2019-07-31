<?php

class SumOfMultiplesTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'sum-of-multiples.php';
    }

    public function testSumToOne() : void
    {
        $this->assertEquals(0, sumOfMultiples(1, [3, 5]));
    }

    public function testSumToThree() : void
    {
        $this->assertEquals(3, sumOfMultiples(4, [3, 5]));
    }

    public function testSumToTen() : void
    {
        $this->assertEquals(23, sumOfMultiples(10, [3, 5]));
    }

    public function testSumToTwenty() : void
    {
        $this->assertEquals(78, sumOfMultiples(20, [3, 5]));
    }

    public function testSumToHundred() : void
    {
        $this->assertEquals(2318, sumOfMultiples(100, [3, 5]));
    }

    public function testSumToThousand() : void
    {
        $this->assertEquals(233168, sumOfMultiples(1000, [3, 5]));
    }

    public function testConfigureToTwenty() : void
    {
        $this->assertEquals(51, sumOfMultiples(20, [7, 13, 17]));
    }

    public function testConfigureToFifteen() : void
    {
        $this->assertEquals(30, sumOfMultiples(15, [4, 6]));
    }

    public function testConfigureToOneFifty() : void
    {
        $this->assertEquals(4419, sumOfMultiples(150, [5, 6, 8]));
    }

    public function testConfigureToFortySeven() : void
    {
        $this->assertEquals(2203160, sumOfMultiples(10000, [43, 47]));
    }

    public function testMultiplesOfOneToHundred() : void
    {
        $this->assertEquals(4950, sumOfMultiples(100, [1]));
    }
    public function testMultiplesOfEmptyList() : void
    {
        $this->assertEquals(0, sumOfMultiples(1000, [0]));
    }
}
