<?php

class HammingComparatorTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'hamming.php';
    }

    public function testNoDifferenceBetweenIdenticalStrands() : void
    {
        $this->assertEquals(0, distance('A', 'A'));
    }

    public function testCompleteHammingDistanceOfForSingleNucleotideStrand() : void
    {
        $this->assertEquals(1, distance('A', 'G'));
    }

    public function testCompleteHammingDistanceForSmallStrand() : void
    {
        $this->assertEquals(2, distance('AG', 'CT'));
    }

    public function testSmallHammingDistance() : void
    {
        $this->assertEquals(1, distance('AT', 'CT'));
    }

    public function testSmallHammingDistanceInLongerStrand() : void
    {
        $this->assertEquals(1, distance('GGACG', 'GGTCG'));
    }

    public function testLargeHammingDistance() : void
    {
        $this->assertEquals(4, distance('GATACA', 'GCATAA'));
    }

    public function testHammingDistanceInVeryLongStrand() : void
    {
        $this->assertEquals(9, distance('GGACGGATTCTG', 'AGGACGGATTCT'));
    }

    public function testExceptionThrownWhenStrandsAreDifferentLength() : void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('DNA strands must be of equal length.');
        distance('GGACG', 'AGGACGTGG');
    }
}
