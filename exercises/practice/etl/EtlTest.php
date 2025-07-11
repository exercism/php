<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class EtlTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Etl.php';
    }

    /**
     * uuid 78a7a9f9-4490-4a47-8ee9-5a38bb47d28f
     */
    #[TestDox('single letter')]
    public function testTransformOneValue(): void
    {
        $old = ['1' => ['A']];
        $expected = ['a' => 1];
        $this->assertEquals($expected, transform($old));
    }

    /**
     * uuid 60dbd000-451d-44c7-bdbb-97c73ac1f497
     */
    #[TestDox('single score with multiple letters')]
    public function testTransformMoreValues(): void
    {
        $old = [1 => ['A', 'E', 'I', 'O', 'U']];
        $expected = ['a' => 1, 'e' => 1, 'i' => 1, 'o' => 1, 'u' => 1];
        $this->assertEquals($expected, transform($old));
    }

    /**
     * uuid f5c5de0c-301f-4fdd-a0e5-df97d4214f54
     */
    #[TestDox('multiple scores with multiple letters')]
    public function testTransformMoreKeys(): void
    {
        $old = [1 => ['A', 'E'], 2 => ['D', 'G']];
        $expected = ['a' => 1, 'e' => 1, 'd' => 2, 'g' => 2];
        $this->assertEquals($expected, transform($old));
    }

    /**
     * uuid 5db8ea89-ecb4-4dcd-902f-2b418cc87b9d
     */
    #[TestDox('multiple scores with differing numbers of letters')]
    public function testTransformFullDataset(): void
    {
        $old = [
            1 => ['A', 'E', 'I', 'O', 'U', 'L', 'N', 'R', 'S', 'T'],
            2 => ['D', 'G'],
            3 => ['B', 'C', 'M', 'P'],
            4 => ['F', 'H', 'V', 'W', 'Y'],
            5 => ['K'],
            8 => ['J', 'X'],
            10 => ['Q', 'Z'],
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
