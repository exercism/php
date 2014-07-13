<?php

require "wordy.php";

class WordProblemTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd1()
    {
        $problem = new WordProblem('What is 1 plus 1?');
        $this->assertEquals(2, $problem->answer());
    }

    /** @group skipped */
    public function testAdd2()
    {
        $problem = new WordProblem('What is 53 plus 2?');
        $this->assertEquals(55, $problem->answer());
    }

    /** @group skipped */
    public function testAddNegativeNumbers()
    {
        $problem = new WordProblem('What is -1 plus -10?');
        $this->assertEquals(-11, $problem->answer());
    }

    /** @group skipped */
    public function testAddMoreDigits()
    {
        $problem = new WordProblem('What is 123 plus 45678?');
        $this->assertEquals(45801, $problem->answer());
    }

    /** @group skipped */
    public function testSubtract()
    {
        $problem = new WordProblem('What is 4 minus -12?');
        $this->assertEquals(16, $problem->answer());
    }

    /** @group skipped */
    public function testMultiply()
    {
        $problem = new WordProblem('What is -3 multiplied by 25?');
        $this->assertEquals(-75, $problem->answer());
    }

    /** @group skipped */
    public function testDivide()
    {
        $problem = new WordProblem('What is 33 divided by -3?');
        $this->assertEquals(-11, $problem->answer());
    }

    /** @group skipped */
    public function testAddTwice()
    {
        $problem = new WordProblem('What is 1 plus 1 plus 1?');
        $this->assertEquals(3, $problem->answer());
    }

    /** @group skipped */
    public function testAddThenSubtract()
    {
        $problem = new WordProblem('What is 1 plus 5 minus -2?');
        $this->assertEquals(8, $problem->answer());
    }

    /** @group skipped */
    public function testSubtractTwice()
    {
        $problem = new WordProblem('What is 20 minus 4 minus 13?');
        $this->assertEquals(3, $problem->answer());
    }

    /** @group skipped */
    public function testSubtractThenAdd()
    {
        $problem = new WordProblem('What is 17 minus 6 plus 3?');
        $this->assertEquals(14, $problem->answer());
    }

    /** @group skipped */
    public function testMultiplyTwice()
    {
        $problem = new WordProblem('What is 2 multiplied by -2 multiplied by 3?');
        $this->assertEquals(-12, $problem->answer());
    }

    /** @group skipped */
    public function testAddThenMultiply()
    {
        $problem = new WordProblem('What is -3 plus 7 multiplied by -2?');
        $this->assertEquals(-8, $problem->answer());
    }

    /** @group skipped */
    public function testDivideTwice()
    {
        $problem = new WordProblem('What is -12 divided by 2 divided by -3?');
        $this->assertEquals(2, $problem->answer());
    }

    /** @group skipped */
    public function testTooAdvanced()
    {
        $this->setExpectedException('InvalidArgumentException');

        $problem = new WordProblem('What is 53 cubed?');
        $problem->answer();
    }

    /** @group skipped */
    public function testIrrelevant()
    {
        $this->setExpectedException('InvalidArgumentException');

        $problem = new WordProblem('Who is the president of the United States?');
        $problem->answer();
    }
}
