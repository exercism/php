<?php

class NthPrimeTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require 'nth-prime.php';
    }

    public function testFirstPrime()
    {
        $this->assertEquals(2, prime(1));
    }
    public function testSecondPrime()
    {
        $this->assertEquals(3, prime(2));
    }
    public function testSixthPrime()
    {
        $this->assertEquals(13, prime(6));
    }
    public function testBigPrime()
    {
        $this->assertEquals(104743, prime(10001));
    }
    public function testZeroPrime()
    {
        $this->assertEquals(false, prime(0));
    }
}
