<?php

require 'perfect-numbers.php';

class PerfectNumbersTest extends PHPUnit\Framework\TestCase
{
    public function testSmallPerfectNumberIsClassifiedCorrectly()
    {
        $this->assertEquals('perfect', getClassification(6));
    }

    public function testMediumPerfectNumberIsClassifiedCorrectly()
    {
        $this->assertEquals('perfect', getClassification(28));
    }

    public function testLargePerfectNumberIsClassifiedCorrectly()
    {
        $this->assertEquals('perfect', getClassification(33550336));
    }

    public function testSmallAbundantNumberIsClassifiedCorrectly()
    {
        $this->assertEquals('abundant', getClassification(12));
    }

    public function testMediumAbundantNumberIsClassifiedCorrectly()
    {
        $this->assertEquals('abundant', getClassification(30));
    }

    public function testLargeAbundantNumberIsClassifiedCorrectly()
    {
        $this->assertEquals('abundant', getClassification(33550335));
    }

    public function testSmallestPrimeDeficientNumberIsClassifiedCorrectly()
    {
        $this->assertEquals('deficient', getClassification(2));
    }

    public function testSmallestNonPrimeDeficientNumberIsClassifiedCorrectly()
    {
        $this->assertEquals('deficient', getClassification(4));
    }

    public function testMediumDeficientNumberIsClassifiedCorrectly()
    {
        $this->assertEquals('deficient', getClassification(32));
    }

    public function testLargeDeficientNumberIsClassifiedCorrectly()
    {
        $this->assertEquals('deficient', getClassification(33550337));
    }

    public function testThatOneIsCorrectlyClassifiedAsDeficient()
    {
        $this->assertEquals('deficient', getClassification(1));
    }

    public function testThatNonNegativeIntegerIsRejected()
    {
        $this->expectException(InvalidArgumentException::class) ;

        getClassification(0) ;
    }

    public function testThatNegativeIntegerIsRejected()
    {
        $this->expectException(InvalidArgumentException::class) ;

        getClassification(-1) ;
    }
}
