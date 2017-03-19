<?php

require "perfect-numbers.php";

class PerfectNumbersTest extends PHPUnit\Framework\TestCase
{
    public function testSmallPerfectNumberIsClassifiedCorrectly()
    {
        $this->assertEquals("perfect",getClassification(6));
    }

    public function testMediumPerfectNumberIsClassifiedCorrectly()
    {
        $this->markTestSkipped();

        $this->assertEquals("perfect",getClassification(28));
    }

    public function testLargePerfectNumberIsClassifiedCorrectly()
    {
        $this->markTestSkipped();

        $this->assertEquals("perfect",getClassification(33550336));
    }

    public function testSmallAbundantNumberIsClassifiedCorrectly()
    {
        $this->markTestSkipped();

        $this->assertEquals("abundant",getClassification(12));
    }

    public function testMediumAbundantNumberIsClassifiedCorrectly()
    {
        $this->markTestSkipped();

        $this->assertEquals("abundant",getClassification(30));
    }

    public function testLargeAbundantNumberIsClassifiedCorrectly()
    {
        $this->markTestSkipped();

        $this->assertEquals("abundant",getClassification(33550335));
    }

    public function testSmallestPrimeDeficientNumberIsClassifiedCorrectly()
    {
        $this->markTestSkipped();

        $this->assertEquals("deficient",getClassification(2));
    }

    public function testSmallestNonPrimeDeficientNumberIsClassifiedCorrectly()
    {
        $this->markTestSkipped();

        $this->assertEquals("deficient",getClassification(4));
    }

    public function testMediumDeficientNumberIsClassifiedCorrectly()
    {
        $this->markTestSkipped();

        $this->assertEquals("deficient",getClassification(32));
    }

    public function testLargeDeficientNumberIsClassifiedCorrectly()
    {
        $this->markTestSkipped();

        $this->assertEquals("deficient",getClassification(33550337));
    }

    public function testThatOneIsCorrectlyClassifiedAsDeficient()
    {
        $this->markTestSkipped();

        $this->assertEquals("deficient",getClassification(1));
    }

    public function testThatNonNegativeIntegerIsRejected()
    {
        $this->markTestSkipped();

        $this->expectException(InvalidArgumentException::class) ;

        getClassification(0) ;
    }

    public function testThatNegativeIntegerIsRejected()
    {
        $this->markTestSkipped();

        $this->expectException(InvalidArgumentException::class) ;

        getClassification(-1) ;
    }
}
