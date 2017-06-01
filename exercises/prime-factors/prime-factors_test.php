<?php
require_once "prime-factors.php";

class PrimeFactorsTest extends PHPUnit\Framework\TestCase
{
    public function testNoFactors()
    {
        $this->assertSame([], factors(1));
    }

    public function testOneFactor()
    {
        $this->markTestSkipped();
        $this->assertSame([2], factors(2));
    }

    public function testSquareOfPrime()
    {
        $this->markTestSkipped();
        $this->assertSame([3, 3], factors(9));
    }

    public function testCubeOfPrime()
    {
        $this->markTestSkipped();
        $this->assertSame([2, 2, 2], factors(8));
    }

    public function testProductOfPrimesAndNon()
    {
        $this->markTestSkipped();
        $this->assertEquals([2, 2, 3], factors(12));
    }

    public function testProductOfPrimes()
    {
        $this->markTestSkipped();
        $this->assertEquals([5, 17, 23, 461], factors(901255));
    }

    public function testFactorsIncludeLargePrime()
    {
        $this->markTestSkipped();
        $this->assertEquals([11, 9539, 894119], factors(93819012551));
    }
}
