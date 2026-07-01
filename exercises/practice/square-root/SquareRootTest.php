<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class SquareRootTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'SquareRoot.php';
    }

    /**
     * uuid: 9b748478-7b0a-490c-b87a-609dacf631fd
     */
    #[TestDox('root of 1')]
    public function testRootOfOne(): void
    {
        $this->assertEquals(1, squareRoot(1));
    }

    /**
     * uuid: 7d3aa9ba-9ac6-4e93-a18b-2e8b477139bb
     */
    #[TestDox('root of 4')]
    public function testRootOfFour(): void
    {
        $this->assertEquals(2, squareRoot(4));
    }

    /**
     * uuid: 6624aabf-3659-4ae0-a1c8-25ae7f33c6ef
     */
    #[TestDox('root of 25')]
    public function testRootOfTwentyFive(): void
    {
        $this->assertEquals(5, squareRoot(25));
    }

    /**
     * uuid: 93beac69-265e-4429-abb1-94506b431f81
     */
    #[TestDox('root of 81')]
    public function testRootOfEightyOne(): void
    {
        $this->assertEquals(9, squareRoot(81));
    }

    /**
     * uuid: fbddfeda-8c4f-4bc4-87ca-6991af35360e
     */
    #[TestDox('root of 196')]
    public function testRootOfOneHundredNinetySix(): void
    {
        $this->assertEquals(14, squareRoot(196));
    }

    /**
     * uuid: c03d0532-8368-4734-a8e0-f96a9eb7fc1d
     */
    #[TestDox('root of 65025')]
    public function testRootOfSixtyFiveThousandTwentyFive(): void
    {
        $this->assertEquals(255, squareRoot(65025));
    }
}
