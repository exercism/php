<?php

class CollatzConjecture extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'collatz-conjecture.php';
    }

    public function testZeroStepsForOne() : void
    {
        $this->assertEquals(0, steps(1));
    }

    public function testDivideIfEven() : void
    {
        $this->assertEquals(4, steps(16));
    }

    public function testEvenAndOddSteps() : void
    {
        $this->assertEquals(9, steps(12));
    }

    public function testLargeNumberOfEvenAndOddSteps() : void
    {
        $this->assertEquals(152, steps(1000000));
    }

    public function testZeroIsAnError() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Only positive numbers are allowed');

        steps(0);
    }

    public function testNegativeValueIsAnError() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Only positive numbers are allowed');

        steps(-1);
    }
}
