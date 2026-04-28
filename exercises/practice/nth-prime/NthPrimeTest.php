<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class NthPrimeTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'NthPrime.php';
    }

    /** uuid: 75c65189-8aef-471a-81de-0a90c728160c */
    #[TestDox('first prime')]
    public function testFirstPrime(): void
    {
        $this->assertEquals(2, prime(1));
    }

    /** uuid: 2c38804c-295f-4701-b728-56dea34fd1a0 */
    #[TestDox('second prime')]
    public function testSecondPrime(): void
    {
        $this->assertEquals(3, prime(2));
    }

    /** uuid: 56692534-781e-4e8c-b1f9-3e82c1640259 */
    #[TestDox('sixth prime')]
    public function testSixthPrime(): void
    {
        $this->assertEquals(13, prime(6));
    }

    /** uuid: fce1e979-0edb-412d-93aa-2c744e8f50ff */
    #[TestDox('big prime')]
    public function testBigPrime(): void
    {
        $this->assertEquals(104743, prime(10001));
    }

    /** uuid: bd0a9eae-6df7-485b-a144-80e13c7d55b2 */
    #[TestDox('there is no zeroth prime')]
    public function testZeroPrime(): void
    {
        $this->assertEquals(false, prime(0));
    }
}
