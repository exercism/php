<?php

declare(strict_types=1);

class PascalsTriangleTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'PascalsTriangle.php';
    }

    /**
     * uuid: 9920ce55-9629-46d5-85d6-4201f4a4234d
     * @testdox Zero rows
     */
    public function testZeroRows(): void
    {
        $this->assertSame([], pascalsTriangleRows(0));
    }

    /**
     * uuid: 70d643ce-a46d-4e93-af58-12d88dd01f21
     * @testdox Single row
     */
    public function testSingleRow(): void
    {
        $this->assertSame([[1]], pascalsTriangleRows(1));
    }

    /**
     * uuid: a6e5a2a2-fc9a-4b47-9f4f-ed9ad9fbe4bd
     * @testdox Two rows
     */
    public function testTwoRows(): void
    {
        $this->assertSame([[1], [1, 1]], pascalsTriangleRows(2));
    }

    /**
     * uuid: 97206a99-79ba-4b04-b1c5-3c0fa1e16925
     * @testdox Three rows
     */
    public function testThreeRows(): void
    {
        $this->assertSame([[1], [1, 1], [1, 2, 1]], pascalsTriangleRows(3));
    }

    /**
     * uuid: 565a0431-c797-417c-a2c8-2935e01ce306
     * @testdox Four rows
     */
    public function testFourRows(): void
    {
        $this->assertSame([[1], [1, 1], [1, 2, 1], [1, 3, 3, 1]], pascalsTriangleRows(4));
    }

    /**
     * uuid: 06f9ea50-9f51-4eb2-b9a9-c00975686c27
     * @testdox Five rows
     */
    public function testFiveRows(): void
    {
        $this->assertEquals(
            [
                [1],
                [1, 1],
                [1, 2, 1],
                [1, 3, 3, 1],
                [1, 4, 6, 4, 1]
            ],
            pascalsTriangleRows(5)
        );
    }

    /**
     * uuid: c3912965-ddb4-46a9-848e-3363e6b00b13
     * @testdox Six rows
     */
    public function testSixRows(): void
    {
        $this->assertEquals([
            [1],
            [1, 1],
            [1, 2, 1],
            [1, 3, 3, 1],
            [1, 4, 6, 4, 1],
            [1, 5, 10, 10, 5, 1]
        ], pascalsTriangleRows(6));
    }

    /**
     * uuid: 6cb26c66-7b57-4161-962c-81ec8c99f16b
     * @testdox Ten rows
     */
    public function testTenRows(): void
    {
        $this->assertEquals([
            [1],
            [1, 1],
            [1, 2, 1],
            [1, 3, 3, 1],
            [1, 4, 6, 4, 1],
            [1, 5, 10, 10, 5, 1],
            [1, 6, 15, 20, 15, 6, 1],
            [1, 7, 21, 35, 35, 21, 7, 1],
            [1, 8, 28, 56, 70, 56, 28, 8, 1],
            [1, 9, 36, 84, 126, 126, 84, 36, 9, 1]
        ], pascalsTriangleRows(10));
    }
}
