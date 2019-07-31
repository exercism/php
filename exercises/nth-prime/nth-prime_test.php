<?php

class NthPrimeTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'nth-prime.php';
    }

    public function testFirstPrime() : void
    {
        $this->assertEquals(2, prime(1));
    }
    public function testSecondPrime() : void
    {
        $this->assertEquals(3, prime(2));
    }
    public function testSixthPrime() : void
    {
        $this->assertEquals(13, prime(6));
    }
    public function testBigPrime() : void
    {
        $this->assertEquals(104743, prime(10001));
    }
    public function testZeroPrime() : void
    {
        $this->assertEquals(false, prime(0));
    }
}
