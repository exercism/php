<?php

require "hamming.php";

class HammingComparatorTest extends \PHPUnit_Framework_TestCase
{
    public function testNoDifferenceBetweenIdenticalStrands()
    {
        $this->assertEquals(0, HammingComparator::distance('A', 'A'));
    }

    /** @group skipped */
    public function testCompleteHammingDistanceOfForSingleNucleotideStrand()
    {
        $this->markTestSkipped();

        $this->assertEquals(1, HammingComparator::distance('A', 'G'));
    }

    /** @group skipped */
    public function testCompleteHammingDistanceForSmallStrand()
    {
        $this->markTestSkipped();

        $this->assertEquals(2, HammingComparator::distance('AG', 'CT'));
    }

    /** @group skipped */
    public function testSmallHammingDistance()
    {
        $this->markTestSkipped();

        $this->assertEquals(1, HammingComparator::distance('AT', 'CT'));
    }

    /** @group skipped */
    public function testSmallHammingDistanceInLongerStrand()
    {
        $this->markTestSkipped();

        $this->assertEquals(1, HammingComparator::distance('GGACG', 'GGTCG'));
    }

    /** @group skipped */
    public function testIgnoresExtraLengthOnFirstStrandWhenLonger()
    {
        $this->markTestSkipped();

        $this->assertEquals(1, HammingComparator::distance('AGAGACTTA', 'AAA'));
    }

    /** @group skipped */
    public function testIgnoresExtraLengthOnOtherStrandWhenLonger()
    {
        $this->markTestSkipped();

        $this->assertEquals(2, HammingComparator::distance('AGG', 'AAAACTGACCCACCCCAGG'));
    }

    /** @group skipped */
    public function testLargeHammingDistance()
    {
        $this->markTestSkipped();

        $this->assertEquals(4, HammingComparator::distance('GATACA', 'GCATAA'));
    }

    /** @group skipped */
    public function testHammingDistanceInVeryLongStrand()
    {
        $this->markTestSkipped();
        $this->assertEquals(9, HammingComparator::distance('GGACGGATTCTG', 'AGGACGGATTCT'));
    }
}
