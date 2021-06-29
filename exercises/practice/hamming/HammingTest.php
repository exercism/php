<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class HammingTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Hamming.php';
    }

    public function testNoDifferenceBetweenIdenticalStrands(): void
    {
        $this->assertEquals(0, distance('A', 'A'));
    }

    public function testCompleteHammingDistanceOfForSingleNucleotideStrand(): void
    {
        $this->assertEquals(1, distance('A', 'G'));
    }

    public function testCompleteHammingDistanceForSmallStrand(): void
    {
        $this->assertEquals(2, distance('AG', 'CT'));
    }

    public function testSmallHammingDistance(): void
    {
        $this->assertEquals(1, distance('AT', 'CT'));
    }

    public function testSmallHammingDistanceInLongerStrand(): void
    {
        $this->assertEquals(1, distance('GGACG', 'GGTCG'));
    }

    public function testLargeHammingDistance(): void
    {
        $this->assertEquals(4, distance('GATACA', 'GCATAA'));
    }

    public function testHammingDistanceInVeryLongStrand(): void
    {
        $this->assertEquals(9, distance('GGACGGATTCTG', 'AGGACGGATTCT'));
    }

    public function testExceptionThrownWhenStrandsAreDifferentLength(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('DNA strands must be of equal length.');
        distance('GGACG', 'AGGACGTGG');
    }
}
