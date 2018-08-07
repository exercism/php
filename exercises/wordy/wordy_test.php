<?php

require "wordy.php";

class WordProblemTest extends PHPUnit\Framework\TestCase
{
    public function testAdd1()
    {
        $this->assertEquals(2, calculate('What is 1 plus 1?'));
    }

    public function testAdd2()
    {
        $this->assertEquals(55, calculate('What is 53 plus 2?'));
    }

    public function testAddNegativeNumbers()
    {
        $this->assertEquals(-11, calculate('What is -1 plus -10?'));
    }

    public function testAddMoreDigits()
    {
        $this->assertEquals(45801, calculate('What is 123 plus 45678?'));
    }

    public function testSubtract()
    {
        $this->assertEquals(16, calculate('What is 4 minus -12?'));
    }

    public function testMultiply()
    {
        $this->assertEquals(-75, calculate('What is -3 multiplied by 25?'));
    }

    public function testDivide()
    {
        $this->assertEquals(-11, calculate('What is 33 divided by -3?'));
    }

    public function testAddTwice()
    {
        $this->assertEquals(3, calculate('What is 1 plus 1 plus 1?'));
    }

    public function testAddThenSubtract()
    {
        $this->assertEquals(8, calculate('What is 1 plus 5 minus -2?'));
    }

    public function testSubtractTwice()
    {
        $this->assertEquals(3, calculate('What is 20 minus 4 minus 13?'));
    }

    public function testSubtractThenAdd()
    {
        $this->assertEquals(14, calculate('What is 17 minus 6 plus 3?'));
    }

    public function testMultiplyTwice()
    {
        $this->assertEquals(-12, calculate('What is 2 multiplied by -2 multiplied by 3?'));
    }

    public function testAddThenMultiply()
    {
        $this->assertEquals(-8, calculate('What is -3 plus 7 multiplied by -2?'));
    }

    public function testDivideTwice()
    {
        $this->assertEquals(2, calculate('What is -12 divided by 2 divided by -3?'));
    }

    public function testTooAdvanced()
    {
        $this->expectException('InvalidArgumentException');

        calculate('What is 53 cubed?');
    }

    public function testIrrelevant()
    {
        $this->expectException('InvalidArgumentException');

        calculate('Who is the president of the United States?');
    }
}
