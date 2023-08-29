<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class SayTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Say.php';
    }

    public function testZero(): void
    {
        $this->assertEquals('zero', say(0));
    }

    public function testOne(): void
    {
        $this->assertEquals('one', say(1));
    }

    public function testFourteen(): void
    {
        $this->assertEquals('fourteen', say(14));
    }

    public function testTwenty(): void
    {
        $this->assertEquals('twenty', say(20));
    }

    public function testTwentyTwo(): void
    {
        $this->assertEquals('twenty-two', say(22));
    }

    public function testThirty(): void
    {
        $this->assertEquals('thirty', say(30));
    }

    public function testNinetyNine(): void
    {
        $this->assertEquals('ninety-nine', say(99));
    }

    public function testOneHundred(): void
    {
        $this->assertEquals('one hundred', say(100));
    }

    public function testOneHundredTwentyThree(): void
    {
        $this->assertEquals('one hundred twenty-three', say(123));
    }

    public function testTwoHundred(): void
    {
        $this->assertEquals('two hundred', say(200));
    }

    public function testNineHundredNinetyNine(): void
    {
        $this->assertEquals('nine hundred ninety-nine', say(999));
    }

    public function testOneThousand(): void
    {
        $this->assertEquals('one thousand', say(1000));
    }

    public function testOneThousandTwoHundredThirtyFour(): void
    {
        $this->assertEquals('one thousand two hundred thirty-four', say(1234));
    }

    public function testOneMillion(): void
    {
        $this->assertEquals('one million', say(1_000_000));
    }

    public function testOneMillionTwoThousandThreeHundredFortyFive(): void
    {
        $this->assertEquals(
            'one million two thousand three hundred forty-five',
            say(1_002_345),
        );
    }

    public function testOneBillion(): void
    {
        $this->assertEquals('one billion', say(1_000_000_000));
    }

    public function testABigNumber(): void
    {
        $this->assertEquals(
            'nine hundred eighty-seven billion six hundred fifty-four million '
            . 'three hundred twenty-one thousand one hundred twenty-three',
            say(987_654_321_123),
        );
    }

    public function testNumbersBelowZeroAreOutOfRange(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Input out of range');

        say(-1);
    }

    public function testNumbersAbove999999999999AreOutOfRange(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Input out of range');

        say(1_000_000_000_000);
    }
}
