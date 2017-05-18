<?php

require 'nth-prime.php';

class NthPrimeTest extends PHPUnit\Framework\TestCase
{
    public function testFirstPrime()
    {
        $this->assertEquals(2, prime(1));
    }
    public function testSecondPrime()
    {
        $this->markTestSkipped();
        $this->assertEquals(3, prime(2));
    }
    public function testSixthPrime()
    {
        $this->markTestSkipped();
        $this->assertEquals(13, prime(6));
    }
    public function testBigPrime()
    {
        $this->markTestSkipped();
        $this->assertEquals(104743, prime(10001));
    }
    public function testZeroPrime()
    {
        $this->markTestSkipped();
        $this->assertEquals(false, prime(0));
    }
}
