<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{
   
    public static function setUpBeforeClass(): void
    {
        require_once 'PrimeFactors.php';
    }

    /**
     * uuid: 924fc966-a8f5-4288-82f2-6b9224819ccd
     */
    #[TestDox('no factors')]
    public function testNoFactors(): void
    {
        $this->assertSame([], factors(1));
    }

    /**
     * uuid: 17e30670-b105-4305-af53-ddde182cb6ad
     */
    #[TestDox('prime number')]
    public function testOneFactor(): void
    {
        $this->assertSame([2], factors(2));
    }

    /**
     * uuid: 238d57c8-4c12-42ef-af34-ae4929f94789
     */
    #[TestDox('another prime number')]
    public function testAnotherPrimeNumber(): void 
    {
        $this->assertSame([3], factors(3));
    }

    /**
     * uuid: f59b8350-a180-495a-8fb1-1712fbee1158
     */
    #[TestDox('square of a prime')]
    public function testSquareOfPrime(): void
    {
        $this->assertSame([3, 3], factors(9));
    }

    /**
     * uuid: 756949d3-3158-4e3d-91f2-c4f9f043ee70
     */
    #[TestDox('product of first prime')]
    public function testProductOfFirstPrime(): void 
    {
        $this->assertSame([2,2], factors(4));
    }

    /**
     * uuid: bc8c113f-9580-4516-8669-c5fc29512ceb
     */
    #[TestDox('cube of a prime')]
    public function testCubeOfPrime(): void
    {
        $this->assertSame([2, 2, 2], factors(8));
    }

    /**
     * uuid: 7d6a3300-a4cb-4065-bd33-0ced1de6cb44
     */
    #[TestDox('product of second prime')]
    public function testProductOfSecondPrime(): void  
    {
        $this->assertSame([3,3,3], factors(27));
    }

    /**
     * uuid: 073ac0b2-c915-4362-929d-fc45f7b9a9e4
     */
    #[TestDox('product of third prime')]
    public function testProductOfThirdPrime(): void  
    {
        $this->assertSame([5,5,5,5], factors(625));
    }

    /**
     * uuid: 6e0e4912-7fb6-47f3-a9ad-dbcd79340c75
     */
    #[TestDox('product of first and second prime')]
    public function testProductOfFirstAndSecondPrime(): void  
    {
        $this->assertSame([2,3], factors(6));
    }

    /**
     * uuid: 00485cd3-a3fe-4fbe-a64a-a4308fc1f870
     */
    #[TestDox('product of primes and non-primes')]
    public function testProductOfPrimesAndNonPrime(): void
    {
        $this->assertEquals([2, 2, 3], factors(12));
    }

    /**
     * uuid: 02251d54-3ca1-4a9b-85e1-b38f4b0ccb91
     */
    #[TestDox('product of prime')]
    public function testProductOfPrimes(): void
    {
        $this->assertEquals([5, 17, 23, 461], factors(901255));
    }

    /**
     * uuid: 070cf8dc-e202-4285-aa37-8d775c9cd473
     */
    #[TestDox('factors include a large prime')]

    public function testFactorsIncludeLargePrime(): void
    {
        $this->assertEquals([11, 9539, 894119], factors(93819012551));
    }
}
