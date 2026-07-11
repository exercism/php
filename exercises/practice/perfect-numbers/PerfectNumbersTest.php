<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class PerfectNumbersTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'PerfectNumbers.php';
    }

    /**
     * uuid: 163e8e86-7bfd-4ee2-bd68-d083dc3381a3
     */
    #[TestDox('Perfect numbers -> Smallest perfect number is classified correctly')]
    public function testPerfectNumbersSmallPerfectNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("perfect", getClassification(6));
    }

     /**
     * uuid: 169a7854-0431-4ae0-9815-c3b6d967436d
     */
    #[TestDox('Perfect numbers -> Medium perfect number is classified correctly')]
    public function testPerfectNumbersMediumPerfectNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("perfect", getClassification(28));
    }

      /**
     * uuid: ee3627c4-7b36-4245-ba7c-8727d585f402
     */
    #[TestDox('Perfect numbers -> Large perfect number is classified correctly')]
    public function testPerfectNumbersLargePerfectNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("perfect", getClassification(33550336));
    }


    /**
     * uuid: 80ef7cf8-9ea8-49b9-8b2d-d9cb3db3ed7e
     */
    #[TestDox('Abundant numbers -> Smallest abundant number is classified correctly')]
    public function testAbundantNumbersSmallAbundantNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("abundant", getClassification(12));
    }


    /**
     * uuid: 3e300e0d-1a12-4f11-8c48-d1027165ab60
     */
    #[TestDox('Abundant numbers -> Medium abundant number is classified correctly')]
    public function testAbundantNumbersMediumAbundantNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("abundant", getClassification(30));
    }

     /**
     * uuid: ec7792e6-8786-449c-b005-ce6dd89a772b
     */
    #[TestDox('Abundant numbers -> Large abundant number is classified correctly')]
    public function testAbundantNumbersLargeAbundantNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("abundant", getClassification(33550335));
    }

    /**
     * uuid: 05f15b93-849c-45e9-9c7d-1ea131ef7d10
     */
    #[TestDox('Abundant numbers -> Perfect square abundant number is classified correctly')]
    public function testAbundantNumbersPerfectSquareAbundantNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("abundant", getClassification(196));
    }

    /**
     * uuid: e610fdc7-2b6e-43c3-a51c-b70fb37413ba
     */
    #[TestDox('Deficient numbers -> Smallest prime deficient number is classified correctly')]
    public function testDeficientNumbersSmallestPrimeDeficientNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("deficient", getClassification(2));
    }

     /**
     * uuid: 0beb7f66-753a-443f-8075-ad7fbd9018f3
     */
    #[TestDox('Deficient numbers -> Smallest non-prime deficient number is classified correctly')]
    public function testDeficientNumbersSmallestNonPrimeDeficientNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("deficient", getClassification(4));
    }

     /**
     * uuid: 1c802e45-b4c6-4962-93d7-1cad245821ef
     */
    #[TestDox('Deficient numbers -> Medium deficient number is classified correctly')]
    public function testDeficientNumbersMediumDeficientNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("deficient", getClassification(32));
    }

    /**
     * uuid: 47dd569f-9e5a-4a11-9a47-a4e91c8c28aa
     */
    #[TestDox('Deficient numbers -> Large deficient number is classified correctly')]
    public function testDeficientNumbersLargeDeficientNumberIsClassifiedCorrectly(): void
    {
        $this->assertEquals("deficient", getClassification(33550337));
    }

    /**
     * uuid: a696dec8-6147-4d68-afad-d38de5476a56
     */
    #[TestDox('Deficient numbers -> Edge case (no factors other than itself) is classified correctly')]
    public function testDeficientNumbersThatOneIsCorrectlyClassifiedAsDeficient(): void
    {
        $this->assertEquals("deficient", getClassification(1));
    }

    /**
     * uuid: 72445cee-660c-4d75-8506-6c40089dc302
     */
    #[TestDox('Invalid inputs -> Zero is rejected (as it is not a positive integer)')]
    public function testInvalidInputsThatNonNegativeIntegerIsRejected(): void
    {
        $this->expectException(InvalidArgumentException::class);

        getClassification(0);
    }

    /**
     * uuid: 2d72ce2c-6802-49ac-8ece-c790ba3dae13
     */
    #[TestDox('Invalid inputs -> Negative integer is rejected (as it is not a positive integer)')]
    public function testInvalidInputsThatNegativeIntegerIsRejected(): void
    {
        $this->expectException(InvalidArgumentException::class);

        getClassification(-1);
    }
}
