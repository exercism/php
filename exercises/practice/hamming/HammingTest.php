<?php

declare(strict_types=1);

class HammingTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Hamming.php';
    }

    /**
     * uuid: f6dcb64f-03b0-4b60-81b1-3c9dbf47e887
     * @testdox Empty strands
     */
    public function testEmptyStrands(): void
    {
        $this->assertEquals(0, distance('', ''));
    }

    /**
     * uuid: 54681314-eee2-439a-9db0-b0636c656156
     * @testdox Single letter identical strands
     */
    public function testSingleLetterIdenticalStrands(): void
    {
        $this->assertEquals(0, distance('A', 'A'));
    }

    /**
     * uuid: 294479a3-a4c8-478f-8d63-6209815a827b
     * @testdox Single letter different strands
     */
    public function testSingleLetterDifferentStrands(): void
    {
        $this->assertEquals(1, distance('G', 'T'));
    }

    /**
     * uuid: 9aed5f34-5693-4344-9b31-40c692fb5592
     * @testdox Long identical strands
     */
    public function testLongIdenticalStrands(): void
    {
        $this->assertEquals(0, distance(
            'GGACTGAAATCTG',
            'GGACTGAAATCTG'
        ));
    }

    /**
     * uuid: cd2273a5-c576-46c8-a52b-dee251c3e6e5
     * @testdox Long different strands
     */
    public function testLongDifferentStrand(): void
    {
        $this->assertEquals(9, distance(
            'GGACGGATTCTG',
            'AGGACGGATTCT'
        ));
    }

    /**
     * uuid: b9228bb1-465f-4141-b40f-1f99812de5a8
     * @testdox Disallow first strand longer
     */
    public function testDisallowFirstStrandLonger(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('strands must be of equal length');
        distance('AATG', 'AAA');
    }

    /**
     * uuid: dab38838-26bb-4fff-acbe-3b0a9bfeba2d
     * @testdox: Disallow second strand longer
     */
    public function testDisallowSecondStrandLonger(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('strands must be of equal length');
        distance('ATA', 'AATG');
    }

    /**
     * uuid: b764d47c-83ff-4de2-ab10-6cfe4b15c0f3
     * @testdox: Disallow empty first strand
     */
    public function testDisallowEmptyFirstStrand(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('strands must be of equal length');
        distance('', 'G');
    }

    /**
     * uuid: 9ab9262f-3521-4191-81f5-0ed184a5aa89
     * @testdox: Disallow empty second strand
     */
    public function testDisallowEmptySecondStrand(): void
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('strands must be of equal length');
        distance('G', '');
    }
}
