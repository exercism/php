<?php

require "hamming.php";

class HammingComparatorTest extends \PHPUnit_Framework_TestCase
{
    public function testNoDifferenceBetweenIdenticalStrands()
    {
        $this->assertEquals(0, HammingComparator::distance('A', 'A'));
    }

    public function testCompleteHammingDistanceOfForSingleNucleotideStrand()
    {
        $this->markTestSkipped();

        $this->assertEquals(1, HammingComparator::distance('A', 'G'));
    }

    public function testCompleteHammingDistanceForSmallStrand()
    {
        $this->markTestSkipped();

        $this->assertEquals(2, HammingComparator::distance('AG', 'CT'));
    }

    public function testSmallHammingDistance()
    {
        $this->markTestSkipped();

        $this->assertEquals(1, HammingComparator::distance('AT', 'CT'));
    }

    public function testSmallHammingDistanceInLongerStrand()
    {
        $this->markTestSkipped();

        $this->assertEquals(1, HammingComparator::distance('GGACG', 'GGTCG'));
    }

    public function testIgnoresExtraLengthOnFirstStrandWhenLonger()
    {
        $this->markTestSkipped();

        $this->assertEquals(1, HammingComparator::distance('AGAGACTTA', 'AAA'));
    }

    public function testIgnoresExtraLengthOnOtherStrandWhenLonger()
    {
        $this->markTestSkipped();

        $this->assertEquals(2, HammingComparator::distance('AGG', 'AAAACTGACCCACCCCAGG'));
    }

    public function testLargeHammingDistance()
    {
        $this->markTestSkipped();

        $this->assertEquals(4, HammingComparator::distance('GATACA', 'GCATAA'));
    }
    
    public function testHammingDistanceInVeryLongStrand()
    {
        $this->markTestSkipped();
        $this->assertEquals(9, HammingComparator::distance('GGACGGATTCTG', 'AGGACGGATTCT'));
    }
}
