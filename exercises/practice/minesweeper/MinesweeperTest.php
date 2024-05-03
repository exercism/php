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

    /**
     * uuid 61aff1c4-fb31-4078-acad-cd5f1e635655
     * @testdox Minefield with only mines
     */
    public function testMinefieldWithOnlyMines(): void
    {
        $minefield = [
            "***",
            "***",
            "***",
        ];
        $expected = [
            "***",
            "***",
            "***",
        ];

        $subject = new Minesweeper($minefield);
        $actual = $subject->annotate();

        $this->assertSame($expected, $actual);
    }

    /**
     * uuid 84167147-c504-4896-85d7-246b01dea7c5
     * @testdox Mine surrounded by spaces
     */
    public function testMineSurroundedBySpaces(): void
    {
        $minefield = [
            "   ",
            " * ",
            "   ",
        ];
        $expected = [
            "111",
            "1*1",
            "111",
        ];

        $subject = new Minesweeper($minefield);
        $actual = $subject->annotate();

        $this->assertSame($expected, $actual);
    }

    /**
     * uuid cb878f35-43e3-4c9d-93d9-139012cccc4a
     * @testdox Space surrounded by mines
     */
    public function testSpaceSurroundedByMines(): void
    {
        $minefield = [
            "***",
            "* *",
            "***",
        ];
        $expected = [
            "***",
            "*8*",
            "***",
        ];

        $subject = new Minesweeper($minefield);
        $actual = $subject->annotate();

        $this->assertSame($expected, $actual);
    }

    /**
     * uuid 7037f483-ddb4-4b35-b005-0d0f4ef4606f
     * @testdox Horizontal line
     */
    public function testHorizontalLine(): void
    {
        $minefield = [" * * "];
        $expected = ["1*2*1"];

        $subject = new Minesweeper($minefield);
        $actual = $subject->annotate();

        $this->assertSame($expected, $actual);
    }

    /**
     * uuid uuid
     * @testdox Horizontal line, mines at edges
     */
    public function testHorizontalLineMinesAtEdges(): void
    {
        $minefield = ["*   *"];
        $expected = ["*1 1*"];

        $subject = new Minesweeper($minefield);
        $actual = $subject->annotate();

        $this->assertSame($expected, $actual);
    }

    /**
     * uuid c5198b50-804f-47e9-ae02-c3b42f7ce3ab
     * @testdox Vertical line
     */
    public function testVerticalLine(): void
    {
        $minefield = [
            " ",
            "*",
            " ",
            "*",
            " ",
        ];
        $expected = [
            "1",
            "*",
            "2",
            "*",
            "1",
        ];

        $subject = new Minesweeper($minefield);
        $actual = $subject->annotate();

        $this->assertSame($expected, $actual);
    }

    /**
     * uuid 0c79a64d-703d-4660-9e90-5adfa5408939
     * @testdox Vertical line, mines at edges
     */
    public function testVerticalLineMinesAtEdges(): void
    {
        $minefield = [
            "*",
            " ",
            " ",
            " ",
            "*",
        ];
        $expected = [
            "*",
            "1",
            " ",
            "1",
            "*",
        ];

        $subject = new Minesweeper($minefield);
        $actual = $subject->annotate();

        $this->assertSame($expected, $actual);
    }

    /**
     * uuid 4b098563-b7f3-401c-97c6-79dd1b708f34
     * @testdox Cross
     */
    public function testCross(): void
    {
        $minefield = [
            "  *  ",
            "  *  ",
            "*****",
            "  *  ",
            "  *  ",
        ];
        $expected = [
            " 2*2 ",
            "25*52",
            "*****",
            "25*52",
            " 2*2 ",
        ];

        $subject = new Minesweeper($minefield);
        $actual = $subject->annotate();

        $this->assertSame($expected, $actual);
    }

    /**
     * uuid 04a260f1-b40a-4e89-839e-8dd8525abe0e
     * @testdox Large minefield
     */
    public function testLargeMinefield(): void
    {
        $minefield = [
            " *  * ",
            "  *   ",
            "    * ",
            "   * *",
            " *  * ",
            "      ",
        ];
        $expected = [
            "1*22*1",
            "12*322",
            " 123*2",
            "112*4*",
            "1*22*2",
            "111111",
        ];

        $subject = new Minesweeper($minefield);
        $actual = $subject->annotate();

        $this->assertSame($expected, $actual);
    }
}
