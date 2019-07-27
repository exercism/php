<?php

class PrimeFactorsTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'prime-factors.php';
    }

    public function testNoFactors() : void
    {
        $this->assertSame([], factors(1));
    }

    public function testOneFactor() : void
    {
        $this->assertSame([2], factors(2));
    }

    public function testSquareOfPrime() : void
    {
        $this->assertSame([3, 3], factors(9));
    }

    public function testCubeOfPrime() : void
    {
        $this->assertSame([2, 2, 2], factors(8));
    }

    public function testProductOfPrimesAndNon() : void
    {
        $this->assertEquals([2, 2, 3], factors(12));
    }

    public function testProductOfPrimes() : void
    {
        $this->assertEquals([5, 17, 23, 461], factors(901255));
    }

    public function testFactorsIncludeLargePrime() : void
    {
        $this->assertEquals([11, 9539, 894119], factors(93819012551));
    }
}
