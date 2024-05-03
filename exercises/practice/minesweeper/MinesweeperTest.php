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
}
