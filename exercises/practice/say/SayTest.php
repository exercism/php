<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class SayTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Say.php';
    }

    /**
     * uuid 5d22a120-ba0c-428c-bd25-8682235d83e8
     */
    #[TestDox('zero')]
    public function testZero(): void
    {
        $this->assertEquals('zero', say(0));
    }

    /**
     * uuid 9b5eed77-dbf6-439d-b920-3f7eb58928f6
     */
    #[TestDox('one')]
    public function testOne(): void
    {
        $this->assertEquals('one', say(1));
    }

    /**
     * uuid 7c499be1-612e-4096-a5e1-43b2f719406d
     */
    #[TestDox('fourteen')]
    public function testFourteen(): void
    {
        $this->assertEquals('fourteen', say(14));
    }

    /**
     * uuid f541dd8e-f070-4329-92b4-b7ce2fcf06b4
     */
    #[TestDox('twenty')]
    public function testTwenty(): void
    {
        $this->assertEquals('twenty', say(20));
    }

    /**
     * uuid d78601eb-4a84-4bfa-bf0e-665aeb8abe94
     */
    #[TestDox('twenty-two')]
    public function testTwentyTwo(): void
    {
        $this->assertEquals('twenty-two', say(22));
    }

    /**
     * uuid f010d4ca-12c9-44e9-803a-27789841adb1
     */
    #[TestDox('thirty')]
    public function testThirty(): void
    {
        $this->assertEquals('thirty', say(30));
    }

    /**
     * uuid 738ce12d-ee5c-4dfb-ad26-534753a98327
     */
    #[TestDox('ninety-nine')]
    public function testNinetyNine(): void
    {
        $this->assertEquals('ninety-nine', say(99));
    }

    /**
     * uuid e417d452-129e-4056-bd5b-6eb1df334dce
     */
    #[TestDox('one hundred')]
    public function testOneHundred(): void
    {
        $this->assertEquals('one hundred', say(100));
    }

    /**
     * uuid d6924f30-80ba-4597-acf6-ea3f16269da8
     */
    #[TestDox('one hundred twenty-three')]
    public function testOneHundredTwentyThree(): void
    {
        $this->assertEquals('one hundred twenty-three', say(123));
    }

    /**
     * uuid 2f061132-54bc-4fd4-b5df-0a3b778959b9
     */
    #[TestDox('two hundred')]
    public function testTwoHundred(): void
    {
        $this->assertEquals('two hundred', say(200));
    }

    /**
     * uuid feed6627-5387-4d38-9692-87c0dbc55c33
     */
    #[TestDox('nine hundred ninety-nine')]
    public function testNineHundredNinetyNine(): void
    {
        $this->assertEquals('nine hundred ninety-nine', say(999));
    }

    /**
     * uuid 3d83da89-a372-46d3-b10d-de0c792432b3
     */
    #[TestDox('one thousand')]
    public function testOneThousand(): void
    {
        $this->assertEquals('one thousand', say(1000));
    }

    /**
     * uuid 865af898-1d5b-495f-8ff0-2f06d3c73709
     */
    #[TestDox('one thousand two hundred thirty-four')]
    public function testOneThousandTwoHundredThirtyFour(): void
    {
        $this->assertEquals('one thousand two hundred thirty-four', say(1234));
    }

    /**
     * uuid b6a3f442-266e-47a3-835d-7f8a35f6cf7f
     */
    #[TestDox('one million')]
    public function testOneMillion(): void
    {
        $this->assertEquals('one million', say(1_000_000));
    }

    /**
     * uuid 2cea9303-e77e-4212-b8ff-c39f1978fc70
     */
    #[TestDox('one million two thousand three hundred forty-five')]
    public function testOneMillionTwoThousandThreeHundredFortyFive(): void
    {
        $this->assertEquals(
            'one million two thousand three hundred forty-five',
            say(1_002_345),
        );
    }

    /**
     * uuid 3e240eeb-f564-4b80-9421-db123f66a38f
     */
    #[TestDox('one billion')]
    public function testOneBillion(): void
    {
        $this->assertEquals('one billion', say(1_000_000_000));
    }

    /**
     * uuid 9a43fed1-c875-4710-8286-5065d73b8a9e
     */
    #[TestDox('a big number')]
    public function testABigNumber(): void
    {
        $this->assertEquals(
            'nine hundred eighty-seven billion six hundred fifty-four million '
            . 'three hundred twenty-one thousand one hundred twenty-three',
            say(987_654_321_123),
        );
    }

    /**
     * uuid 49a6a17b-084e-423e-994d-a87c0ecc05ef
     */
    #[TestDox('numbers below zero are out of range')]
    public function testNumbersBelowZeroAreOutOfRange(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Input out of range');

        say(-1);
    }

    /**
     * uuid 4d6492eb-5853-4d16-9d34-b0f61b261fd9
     */
    #[TestDox('numbers above 999,999,999,999 are out of range')]
    public function testNumbersAbove999999999999AreOutOfRange(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Input out of range');

        say(1_000_000_000_000);
    }
}
