<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class GameOfLifeTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'GameOfLife.php';
    }

    /**
     * uuid ae86ea7d-bd07-4357-90b3-ac7d256bd5c5
     */
    #[TestDox('empty matrix')]
    public function testEmptyMatrix(): void
    {
        $this->assertEquals([], tick([]));
    }

    /**
     * uuid 4ea5ccb7-7b73-4281-954a-bed1b0f139a5
     */
    #[TestDox('live cells with zero live neighbors die')]
    public function testLiveCellsWithZeroLiveNeighborsDie(): void
    {
        $this->assertEquals([
            [0, 0, 0],
            [0, 0, 0],
            [0, 0, 0]
        ], tick([
            [0, 0, 0],
            [0, 1, 0],
            [0, 0, 0]
        ]));
    }

    /**
     * uuid df245adc-14ff-4f9c-b2ae-f465ef5321b2
     */
    #[TestDox('live cells with only one live neighbor die')]
    public function testLiveCellsWithOnlyOneLiveNeighborDie(): void
    {
        $this->assertEquals([
            [0, 0, 0],
            [0, 0, 0],
            [0, 0, 0]
        ], tick([
            [0, 0, 0],
            [0, 1, 0],
            [0, 1, 0]
        ]));
    }

    /**
     * uuid 2a713b56-283c-48c8-adae-1d21306c80ae
     */
    #[TestDox('live cells with two live neighbors stay alive')]
    public function testLiveCellsWithTwoLiveNeighborsStayAlive(): void
    {
        $this->assertEquals([
            [0, 0, 0],
            [1, 0, 1],
            [0, 0, 0]
        ], tick([
            [1, 0, 1],
            [1, 0, 1],
            [1, 0, 1]
        ]));
    }

    /**
     * uuid 86d5c5a5-ab7b-41a1-8907-c9b3fc5e9dae
     */
    #[TestDox('live cells with three live neighbors stay alive')]
    public function testLiveCellsWithThreeLiveNeighborsStayAlive(): void
    {
        $this->assertEquals([
            [0, 0, 0],
            [1, 0, 0],
            [1, 1, 0]
        ], tick([
            [0, 1, 0],
            [1, 0, 0],
            [1, 1, 0]
        ]));
    }

    /**
     * uuid 015f60ac-39d8-4c6c-8328-57f334fc9f89
     */
    #[TestDox('dead cells with three live neighbors become alive')]
    public function testDeadCellsWithThreeLiveNeighborsBecomeAlive(): void
    {
        $this->assertEquals([
            [0, 0, 0],
            [1, 1, 0],
            [0, 0, 0]
        ], tick([
            [1, 1, 0],
            [0, 0, 0],
            [1, 0, 0]
        ]));
    }

    /**
     * uuid 2ee69c00-9d41-4b8b-89da-5832e735ccf1
     */
    #[TestDox('live cells with four or more neighbors die')]
    public function testLiveCellsWithFourOrMoreNeighborsDie(): void
    {
        $this->assertEquals([
            [1, 0, 1],
            [0, 0, 0],
            [1, 0, 1]
        ], tick([
            [1, 1, 1],
            [1, 1, 1],
            [1, 1, 1]
        ]));
    }

    /**
     * uuid a79b42be-ed6c-4e27-9206-43da08697ef6
     */
    #[TestDox('bigger matrix')]
    public function testBiggerMatrix(): void
    {
        $this->assertEquals([
            [1, 1, 0, 1, 1, 0, 0, 0],
            [0, 0, 0, 0, 0, 1, 1, 0],
            [1, 0, 1, 1, 1, 1, 0, 1],
            [1, 0, 0, 0, 0, 0, 0, 1],
            [1, 1, 0, 0, 1, 0, 0, 1],
            [1, 1, 0, 1, 0, 0, 0, 1],
            [1, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 1, 1]
        ], tick([
            [1, 1, 0, 1, 1, 0, 0, 0],
            [1, 0, 1, 1, 0, 0, 0, 0],
            [1, 1, 1, 0, 0, 1, 1, 1],
            [0, 0, 0, 0, 0, 1, 1, 0],
            [1, 0, 0, 0, 1, 1, 0, 0],
            [1, 1, 0, 0, 0, 1, 1, 1],
            [0, 0, 1, 0, 1, 0, 0, 1],
            [1, 0, 0, 0, 0, 0, 1, 1]
        ]));
    }
}
