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

class WordyTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Wordy.php';
    }

    public function testAdd1(): void
    {
        $this->assertEquals(2, calculate('What is 1 plus 1?'));
    }

    public function testAdd2(): void
    {
        $this->assertEquals(55, calculate('What is 53 plus 2?'));
    }

    public function testAddNegativeNumbers(): void
    {
        $this->assertEquals(-11, calculate('What is -1 plus -10?'));
    }

    public function testAddMoreDigits(): void
    {
        $this->assertEquals(45801, calculate('What is 123 plus 45678?'));
    }

    public function testSubtract(): void
    {
        $this->assertEquals(16, calculate('What is 4 minus -12?'));
    }

    public function testMultiply(): void
    {
        $this->assertEquals(-75, calculate('What is -3 multiplied by 25?'));
    }

    public function testDivide(): void
    {
        $this->assertEquals(-11, calculate('What is 33 divided by -3?'));
    }

    public function testAddTwice(): void
    {
        $this->assertEquals(3, calculate('What is 1 plus 1 plus 1?'));
    }

    public function testAddThenSubtract(): void
    {
        $this->assertEquals(8, calculate('What is 1 plus 5 minus -2?'));
    }

    public function testSubtractTwice(): void
    {
        $this->assertEquals(3, calculate('What is 20 minus 4 minus 13?'));
    }

    public function testSubtractThenAdd(): void
    {
        $this->assertEquals(14, calculate('What is 17 minus 6 plus 3?'));
    }

    public function testMultiplyTwice(): void
    {
        $this->assertEquals(-12, calculate('What is 2 multiplied by -2 multiplied by 3?'));
    }

    public function testAddThenMultiply(): void
    {
        $this->assertEquals(-8, calculate('What is -3 plus 7 multiplied by -2?'));
    }

    public function testDivideTwice(): void
    {
        $this->assertEquals(2, calculate('What is -12 divided by 2 divided by -3?'));
    }

    public function testTooAdvanced(): void
    {
        $this->expectException('InvalidArgumentException');

        calculate('What is 53 cubed?');
    }

    public function testIrrelevant(): void
    {
        $this->expectException('InvalidArgumentException');

        calculate('Who is the president of the United States?');
    }
}
