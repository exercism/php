<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class SieveTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Sieve.php';
    }

    /**
     * uuid: 88529125-c4ce-43cc-bb36-1eb4ddd7b44f
     */
    #[TestDox('No primes under two')]
    public function testNoPrimesUnderTwo(): void
    {
        $this->assertEquals([], sieve(1));
    }

    /**
     * uuid: 4afe9474-c705-4477-9923-840e1024cc2b
     */
    #[TestDox('Find first prime')]
    public function testFindFirstPrime(): void
    {
        $this->assertEquals([2], sieve(2));
    }

    /**
     * uuid: 974945d8-8cd9-4f00-9463-7d813c7f17b7
     */
    #[TestDox('Find primes up to 10')]
    public function testFindPrimesUpTo10(): void
    {
        $this->assertEquals([2, 3, 5, 7], sieve(10));
    }

    /**
     * uuid: 2e2417b7-3f3a-452a-8594-b9af08af6d82
     */
    #[TestDox('Limit is prime')]
    public function testLimitIsPrime(): void
    {
        $this->assertEquals([2, 3, 5, 7, 11, 13], sieve(13));
    }

    /**
     * uuid: 92102a05-4c7c-47de-9ed0-b7d5fcd00f21
     */
    #[TestDox('Find primes up to 1000')]
    public function testFindPrimesUpTo1000(): void
    {
        $this->assertEquals(
            [
                2,
                3,
                5,
                7,
                11,
                13,
                17,
                19,
                23,
                29,
                31,
                37,
                41,
                43,
                47,
                53,
                59,
                61,
                67,
                71,
                73,
                79,
                83,
                89,
                97,
                101,
                103,
                107,
                109,
                113,
                127,
                131,
                137,
                139,
                149,
                151,
                157,
                163,
                167,
                173,
                179,
                181,
                191,
                193,
                197,
                199,
                211,
                223,
                227,
                229,
                233,
                239,
                241,
                251,
                257,
                263,
                269,
                271,
                277,
                281,
                283,
                293,
                307,
                311,
                313,
                317,
                331,
                337,
                347,
                349,
                353,
                359,
                367,
                373,
                379,
                383,
                389,
                397,
                401,
                409,
                419,
                421,
                431,
                433,
                439,
                443,
                449,
                457,
                461,
                463,
                467,
                479,
                487,
                491,
                499,
                503,
                509,
                521,
                523,
                541,
                547,
                557,
                563,
                569,
                571,
                577,
                587,
                593,
                599,
                601,
                607,
                613,
                617,
                619,
                631,
                641,
                643,
                647,
                653,
                659,
                661,
                673,
                677,
                683,
                691,
                701,
                709,
                719,
                727,
                733,
                739,
                743,
                751,
                757,
                761,
                769,
                773,
                787,
                797,
                809,
                811,
                821,
                823,
                827,
                829,
                839,
                853,
                857,
                859,
                863,
                877,
                881,
                883,
                887,
                907,
                911,
                919,
                929,
                937,
                941,
                947,
                953,
                967,
                971,
                977,
                983,
                991,
                997,
            ],
            sieve(1000)
        );
    }
}
