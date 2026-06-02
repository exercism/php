<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class SeriesTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Series.php';
    }

    /**
     * uuid 7ae7a46a-d992-4c2a-9c15-a112d125ebad
     */
    #[TestDox('slices of one from one')]
    public function testSlicesOfOneFromOne(): void
    {
        $this->assertEquals(
            ["1"],
            slices("1", 1)
        );
    }

    /**
     * uuid 3143b71d-f6a5-4221-aeae-619f906244d2
     */
    #[TestDox('slices of one from two')]
    public function testSlicesOfOneFromTwo(): void
    {
        $this->assertEquals(
            ["1", "2"],
            slices("12", 1)
        );
    }

    /**
     * uuid dbb68ff5-76c5-4ccd-895a-93dbec6d5805
     */
    #[TestDox('slices of two')]
    public function testSlicesOfTwo(): void
    {
        $this->assertEquals(
            ["35"],
            slices("35", 2)
        );
    }

    /**
     * uuid 19bbea47-c987-4e11-a7d1-e103442adf86
     */
    #[TestDox('slices of two overlap')]
    public function testSlicesOfTwoOverlap(): void
    {
        $this->assertEquals(
            ["91", "14", "42"],
            slices("9142", 2)
        );
    }

    /**
     * uuid 8e17148d-ba0a-4007-a07f-d7f87015d84c
     */
    #[TestDox('slices can include duplicates')]
    public function testSlicesCanIncludeDuplicates(): void
    {
        $this->assertEquals(
            ["777", "777", "777", "777"],
            slices("777777", 3)
        );
    }

    /**
     * uuid bd5b085e-f612-4f81-97a8-6314258278b0
     */
    #[TestDox('slices of a long series')]
    public function testSlicesOfALongSeries(): void
    {
        $this->assertEquals(
            [
                "91849",
                "18493",
                "84939",
                "49390",
                "93904",
                "39042",
                "90424",
                "04243"
            ],
            slices("918493904243", 5)
        );
    }

    /**
     * uuid 6d235d85-46cf-4fae-9955-14b6efef27cd
     */
    #[TestDox('slice length is too large')]
    public function testSliceLengthIsTooLarge(): void
    {
        $this->expectException(Exception::class);
        slices("12345", 6);
    }

    /**
     * uuid d7957455-346d-4e47-8e4b-87ed1564c6d7
     */
    #[TestDox('slice length is way too large')]
    public function testSliceLengthIsWayTooLarge(): void
    {
        $this->expectException(Exception::class);
        slices("12345", 42);
    }

    /**
     * uuid d34004ad-8765-4c09-8ba1-ada8ce776806
     */
    #[TestDox('slice length cannot be zero')]
    public function testSliceLengthCannotBeZero(): void
    {
        $this->expectException(Exception::class);
        slices("12345", 0);
    }

    /**
     * uuid 10ab822d-8410-470a-a85d-23fbeb549e54
     */
    #[TestDox('slice length cannot be negative')]
    public function testSliceLengthCannotBeNegative(): void
    {
        $this->expectException(Exception::class);
        slices("123", -1);
    }

    /**
     * uuid c7ed0812-0e4b-4bf3-99c4-28cbbfc246a2
     */
    #[TestDox('empty series is invalid')]
    public function testEmptySeriesIsInvalid(): void
    {
        $this->expectException(Exception::class);
        slices("", 1);
    }
}
