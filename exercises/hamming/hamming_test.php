<?php

require "hamming.php";

class HammingComparatorTest extends PHPUnit_Framework_TestCase
{

    public function testNoDifferenceBetweenIdenticalStrands()
    {
        $this->assertEquals(0, distance('A', 'A'));
    }

    public function testCompleteHammingDistanceOfForSingleNucleotideStrand()
    {
        $this->markTestSkipped();
        $this->assertEquals(1, distance('A', 'G'));
    }

    public function testCompleteHammingDistanceForSmallStrand()
    {
        $this->markTestSkipped();
        $this->assertEquals(2, distance('AG', 'CT'));
    }

    public function testSmallHammingDistance()
    {
        $this->markTestSkipped();
        $this->assertEquals(1, distance('AT', 'CT'));
    }

    public function testSmallHammingDistanceInLongerStrand()
    {
        $this->markTestSkipped();
        $this->assertEquals(1, distance('GGACG', 'GGTCG'));
    }

    public function testLargeHammingDistance()
    {
        $this->markTestSkipped();
        $this->assertEquals(4, distance('GATACA', 'GCATAA'));
    }

    public function testHammingDistanceInVeryLongStrand()
    {
        $this->markTestSkipped();
        $this->assertEquals(9, distance('GGACGGATTCTG', 'AGGACGGATTCT'));
    }

    public function testExceptionThrownWhenStrandsAreDifferentLength()
    {
        $this->markTestSkipped();
        $this->setExpectedException('InvalidArgumentException', 'DNA strands must be of equal length.');
        distance('GGACG', 'AGGACGTGG');
    }
}
