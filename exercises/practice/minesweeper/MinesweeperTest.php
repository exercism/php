<?php

declare(strict_types=1);

class MinesweeperTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Minesweeper.php';
    }

    /**
     * uuid 0c5ec4bd-dea7-4138-8651-1203e1cb9f44
     * @testdox No rows
     */
    public function testNoRows(): void
    {
        $minefield = [];
        $expected = [];

        $subject = new Minesweeper($minefield);
        $actual = $subject->annotate();

        $this->assertSame($expected, $actual);
    }

    /**
     * uuid 650ac4c0-ad6b-4b41-acde-e4ea5852c3b8
     * @testdox No columns
     */
    public function testNoColumns(): void
    {
        $minefield = [""];
        $expected = [""];

        $subject = new Minesweeper($minefield);
        $actual = $subject->annotate();

        $this->assertSame($expected, $actual);
    }

    /**
     * uuid 6fbf8f6d-a03b-42c9-9a58-b489e9235478
     * @testdox No mines
     */
    public function testNoMines(): void
    {
        $minefield = [
            "   ",
            "   ",
            "   ",
        ];
        $expected = [
            "   ",
            "   ",
            "   ",
        ];

        $subject = new Minesweeper($minefield);
        $actual = $subject->annotate();

        $this->assertSame($expected, $actual);
    }
}
