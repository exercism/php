<?php

require "collatz-conjecture.php";

class CollatzConjecture extends PHPUnit\Framework\TestCase
{

    public function testZeroStepsForOne()
    {
        $this->assertEquals(0, steps(1));
    }

    public function testDivideIfEven()
    {
        $this->markTestSkipped();
        $this->assertEquals(4, steps(16));
    }

    public function testEvenAndOddSteps()
    {
        $this->markTestSkipped();
        $this->assertEquals(9, steps(12));
    }

    public function testLargeNumberOfEvenAndOddSteps()
    {
        $this->markTestSkipped();
        $this->assertEquals(152, steps(1000000));
    }

    public function testZeroIsAnError()
    {
        $this->markTestSkipped();
        $this->expectException('InvalidArgumentException', 'Only positive numbers are allowed');
        steps(0);
    }

    public function testNegativeValueIsAnError()
    {
        $this->markTestSkipped();
        $this->expectException('InvalidArgumentException', 'Only positive numbers are allowed');
        steps(-1);
    }
}
