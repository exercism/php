<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class SumOfMultiplesTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'SumOfMultiples.php';
    }

    /**
     * uuid: 54aaab5a-ce86-4edc-8b40-d3ab2400a279
     */
    #[TestDox('No multiples within limit')]
    public function testNoMultiplesWithinLimit(): void
    {
        $this->assertEquals(0, sumOfMultiples(1, [3, 5]));
    }

    /**
     * uuid: 361e4e50-c89b-4f60-95ef-5bc5c595490a
     */
    #[TestDox('One factor has multiples within limit')]
    public function testOneFactorHasMultiplesWithinLimit(): void
    {
        $this->assertEquals(3, sumOfMultiples(4, [3, 5]));
    }

    /**
     * uuid: e644e070-040e-4ae0-9910-93c69fc3f7ce
     */
      #[TestDox('More than one multiple within limit')]
    public function testMoreThanOneMultipleWithinLimit(): void
    {
        $this->assertEquals(9, sumOfMultiples(7, [3]));
    }

    /**
     * uuid: 607d6eb9-535c-41ce-91b5-3a61da3fa57f
     */
    #[TestDox('More than one factor with multiples within limit')]
    public function testMoreThanOneFactorWithMultiplesWithinLimit(): void
    {
        $this->assertEquals(23, sumOfMultiples(10, [3, 5]));
    }

    /**
     * uuid: f47e8209-c0c5-4786-b07b-dc273bf86b9b
     */
    #[TestDox('Each multiple is only counted once')]
    public function testEachMultipleIsOnlyCountedOnce(): void
    {
        $this->assertEquals(2318, sumOfMultiples(100, [3, 5]));
    }

    /**
     * uuid: 28c4b267-c980-4054-93e9-07723db615ac
     */
    #[TestDox('A much larger limit')]
    public function testAMuchLargerLimit(): void
    {
        $this->assertEquals(233168, sumOfMultiples(1000, [3, 5]));
    }

    /**
     * uuid: 09c4494d-ff2d-4e0f-8421-f5532821ee12
     */
    #[TestDox('Three factors')]
    public function testThreeFactors(): void
    {
        $this->assertEquals(51, sumOfMultiples(20, [7, 13, 17]));
    }

    /**
     * uuid: 2d0d5faa-f177-4ad6-bde9-ebb865083751
     */
    #[TestDox('Factors not relatively prime')]
    public function testFactorsNotRelativelyPrime(): void
    {
        $this->assertEquals(30, sumOfMultiples(15, [4, 6]));
    }

    /**
     * uuid: ece8f2e8-96aa-4166-bbb7-6ce71261e354
     */
    #[TestDox('Some pairs of factors relatively prime and some not')]
    public function testSomePairsOfFactorsRelativelyPrimeAndSomeNot(): void
    {
        $this->assertEquals(4419, sumOfMultiples(150, [5, 6, 8]));
    }

    /**
     * uuid: 624fdade-6ffb-400e-8472-456a38c171c0
     */
    #[TestDox('One factor is a multiple of another')]
    public function testOneFactorIsAMultipleOfAnother(): void
    {
        $this->assertEquals(275, sumOfMultiples(51, [5, 25]));
    }

    /**
     * uuid: 949ee7eb-db51-479c-b5cb-4a22b40ac057
     */
    #[TestDox('Much larger factors')]
    public function testMuchLargerFactors(): void
    {
        $this->assertEquals(2203160, sumOfMultiples(10000, [43, 47]));
    }

    /**
     * uuid: 41093673-acbd-482c-ab80-d00a0cbedecd
     */
    #[TestDox('All numbers are multiples of 1')]
    public function testAllNumbersAreMultiplesOf1(): void
    {
        $this->assertEquals(4950, sumOfMultiples(100, [1]));
    }

    /**
     * uuid: 1730453b-baaa-438e-a9c2-d754497b2a76
     */
    #[TestDox('No factors means an empty sum')]
    public function testNoFactorsMeansAnEmptySum(): void
    {
        $this->assertEquals(0, sumOfMultiples(10000, []));
    }

    /**
     * uuid: 214a01e9-f4bf-45bb-80f1-1dce9fbb0310
     */
    #[TestDox('The only multiple of 0 is 0')]
    public function testTheOnlyMultipleOf0Is0(): void
    {
        $this->assertEquals(0, sumOfMultiples(1, [0]));
    }

    /**
     * uuid: c423ae21-a0cb-4ec7-aeb1-32971af5b510
     */
    #[TestDox('The factor 0 does not affect the sum of multiples of other factors')]
    public function testTheFactor0DoesNotAffectTheSumOfMultiplesOfOtherFactors(): void
    {
        $this->assertEquals(3, sumOfMultiples(4, [3, 0]));
    }

    /**
     * uuid: 17053ba9-112f-4ac0-aadb-0519dd836342
     */
    #[TestDox('Solutions using include-exclude must extend to cardinality greater than 3')]
    public function testSolutionsUsingIncludeExcludeMustExtendToCardinalityGreaterThan3(): void
    {
        $this->assertEquals(39614537, sumOfMultiples(10000, [2, 3, 5, 7, 11]));
    }
}
