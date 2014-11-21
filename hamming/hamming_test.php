<?php

require "hamming.php";

class HammingComparatorTest extends PHPUnit_Framework_TestCase
{
    public function testNoDifferenceBetweenIdenticalStrands()
    {
        $this->assertEquals(0, HammingComparator::distance('A', 'A'));
    }

    public function testCompleteHammingDistanceOfForSingleNucleotideStrand()
    {
        $this->assertEquals(1, HammingComparator::distance('A', 'G'));
    }

    public function testCompleteHammingDistanceForSmallStrand()
    {
        $this->assertEquals(2, HammingComparator::distance('AG', 'CT'));
    }

    public function testSmallHammingDistance()
    {
        $this->assertEquals(1, HammingComparator::distance('AT', 'CT'));
    }

    public function testSmallHammingDistanceInLongerStrand()
    {
        $this->assertEquals(1, HammingComparator::distance('GGACG', 'GGTCG'));
    }

    public function testLargeHammingDistance()
    {
        $this->assertEquals(4, HammingComparator::distance('GATACA', 'GCATAA'));
    }

    public function testHammingDistanceInVeryLongStrand()
    {
        $this->assertEquals(9, HammingComparator::distance('GGACGGATTCTG', 'AGGACGGATTCT'));
    }
}
