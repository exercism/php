<?php

class WordProblemTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'wordy.php';
    }

    public function testAdd1() : void
    {
        $this->assertEquals(2, calculate('What is 1 plus 1?'));
    }

    public function testAdd2() : void
    {
        $this->assertEquals(55, calculate('What is 53 plus 2?'));
    }

    public function testAddNegativeNumbers() : void
    {
        $this->assertEquals(-11, calculate('What is -1 plus -10?'));
    }

    public function testAddMoreDigits() : void
    {
        $this->assertEquals(45801, calculate('What is 123 plus 45678?'));
    }

    public function testSubtract() : void
    {
        $this->assertEquals(16, calculate('What is 4 minus -12?'));
    }

    public function testMultiply() : void
    {
        $this->assertEquals(-75, calculate('What is -3 multiplied by 25?'));
    }

    public function testDivide() : void
    {
        $this->assertEquals(-11, calculate('What is 33 divided by -3?'));
    }

    public function testAddTwice() : void
    {
        $this->assertEquals(3, calculate('What is 1 plus 1 plus 1?'));
    }

    public function testAddThenSubtract() : void
    {
        $this->assertEquals(8, calculate('What is 1 plus 5 minus -2?'));
    }

    public function testSubtractTwice() : void
    {
        $this->assertEquals(3, calculate('What is 20 minus 4 minus 13?'));
    }

    public function testSubtractThenAdd() : void
    {
        $this->assertEquals(14, calculate('What is 17 minus 6 plus 3?'));
    }

    public function testMultiplyTwice() : void
    {
        $this->assertEquals(-12, calculate('What is 2 multiplied by -2 multiplied by 3?'));
    }

    public function testAddThenMultiply() : void
    {
        $this->assertEquals(-8, calculate('What is -3 plus 7 multiplied by -2?'));
    }

    public function testDivideTwice() : void
    {
        $this->assertEquals(2, calculate('What is -12 divided by 2 divided by -3?'));
    }

    public function testTooAdvanced() : void
    {
        $this->expectException('InvalidArgumentException');

        calculate('What is 53 cubed?');
    }

    public function testIrrelevant() : void
    {
        $this->expectException('InvalidArgumentException');

        calculate('Who is the president of the United States?');
    }
}
