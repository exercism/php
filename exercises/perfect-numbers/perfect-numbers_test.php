<?php

class PerfectNumbersTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'perfect-numbers.php';
    }

    public function testSmallPerfectNumberIsClassifiedCorrectly() : void
    {
        $this->assertEquals("perfect", getClassification(6));
    }

    public function testMediumPerfectNumberIsClassifiedCorrectly() : void
    {
        $this->assertEquals("perfect", getClassification(28));
    }

    public function testLargePerfectNumberIsClassifiedCorrectly() : void
    {
        $this->assertEquals("perfect", getClassification(33550336));
    }

    public function testSmallAbundantNumberIsClassifiedCorrectly() : void
    {
        $this->assertEquals("abundant", getClassification(12));
    }

    public function testMediumAbundantNumberIsClassifiedCorrectly() : void
    {
        $this->assertEquals("abundant", getClassification(30));
    }

    public function testLargeAbundantNumberIsClassifiedCorrectly() : void
    {
        $this->assertEquals("abundant", getClassification(33550335));
    }

    public function testSmallestPrimeDeficientNumberIsClassifiedCorrectly() : void
    {
        $this->assertEquals("deficient", getClassification(2));
    }

    public function testSmallestNonPrimeDeficientNumberIsClassifiedCorrectly() : void
    {
        $this->assertEquals("deficient", getClassification(4));
    }

    public function testMediumDeficientNumberIsClassifiedCorrectly() : void
    {
        $this->assertEquals("deficient", getClassification(32));
    }

    public function testLargeDeficientNumberIsClassifiedCorrectly() : void
    {
        $this->assertEquals("deficient", getClassification(33550337));
    }

    public function testThatOneIsCorrectlyClassifiedAsDeficient() : void
    {
        $this->assertEquals("deficient", getClassification(1));
    }

    public function testThatNonNegativeIntegerIsRejected() : void
    {
        $this->expectException(InvalidArgumentException::class) ;

        getClassification(0) ;
    }

    public function testThatNegativeIntegerIsRejected() : void
    {
        $this->expectException(InvalidArgumentException::class) ;

        getClassification(-1) ;
    }
}
