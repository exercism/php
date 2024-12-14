<?php

declare(strict_types=1);

class EtlTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Etl.php';
    }

    /**
     * uuid 78a7a9f9-4490-4a47-8ee9-5a38bb47d28f
     * @testdox single letter
     */
    public function testTransformOneValue(): void
    {
        $old = ['1' => ['A']];
        $expected = ['a' => 1];
        $this->assertEquals($expected, transform($old));
    }

    /**
     * uuid 60dbd000-451d-44c7-bdbb-97c73ac1f497
     * @testdox single score with multiple letters
     */
    public function testTransformMoreValues(): void
    {
        $old = ['1' => str_split('AEIOU')];
        $expected = ['a' => 1, 'e' => 1, 'i' => 1, 'o' => 1, 'u' => 1];
        $this->assertEquals($expected, transform($old));
    }

    /**
     * uuid f5c5de0c-301f-4fdd-a0e5-df97d4214f54
     * @testdox multiple scores with multiple letters
     */
    public function testTransformMoreKeys(): void
    {
        $old = ['1' => str_split('AE'), '2' => str_split('DG')];
        $expected = ['a' => 1, 'e' => 1, 'd' => 2, 'g' => 2];
        $this->assertEquals($expected, transform($old));
    }

    /**
     * uuid 5db8ea89-ecb4-4dcd-902f-2b418cc87b9d
     * @testdox multiple scores with differing numbers of letters
     */
    public function testTransformFullDataset(): void
    {
        $old = [
            '1' => str_split('AEIOULNRST'),
            '2' => str_split('DG'),
            '3' => str_split('BCMP'),
            '4' => str_split('FHVWY'),
            '5' => str_split('K'),
            '8' => str_split('JX'),
            '10' => str_split('QZ'),
        ];
        $expected = [
            'a' => 1, 'b' => 3, 'c' => 3, 'd' => 2, 'e' => 1,
            'f' => 4, 'g' => 2, 'h' => 4, 'i' => 1, 'j' => 8,
            'k' => 5, 'l' => 1, 'm' => 3, 'n' => 1, 'o' => 1,
            'p' => 3, 'q' => 10, 'r' => 1, 's' => 1, 't' => 1,
            'u' => 1, 'v' => 4, 'w' => 4, 'x' => 8, 'y' => 4,
            'z' => 10,
        ];
        $this->assertEquals($expected, transform($old));
    }
}
