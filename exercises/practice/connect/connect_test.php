<?php

class ConnectTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'connect.php';
    }

    /**
     * Strip off the spaces which are only for readability.
     */
    private function makeBoard($lines) : array
    {
        return array_map(function ($line) {
            return str_replace(" ", "", $line);
        }, $lines);
    }

    public function testEmptyBoardHasNoWinner() : void
    {
        $lines = [
            ". . . . .",
            " . . . . .",
            "  . . . . .",
            "   . . . . .",
            "    . . . . ."
        ];
        $this->assertEquals(null, resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testEmptyBoardHasNoWinner
     */
    public function testOneByOneBoardBlack() : void
    {
        $lines = ["X"];
        $this->assertEquals("black", resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testEmptyBoardHasNoWinner
     */
    public function testOneByOneBoardWhite() : void
    {
        $lines = ["O"];
        $this->assertEquals("white", resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testOneByOneBoardBlack
     * @depends testOneByOneBoardWhite
     */
    public function testConvultedPath() : void
    {
        $lines = [
            ". X X . .",
            " X . X . X",
            "  . X . X .",
            "   . X X . .",
            "    O O O O O"
        ];
        $this->assertEquals("black", resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testConvultedPath
     */
    public function testRectangleWhiteWins() : void
    {
        $lines = [
            ". O . .",
            " O X X X",
            "  O O O .",
            "   X X O X",
            "    . O X ."
        ];
        $this->assertEquals("white", resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testConvultedPath
     */
    public function testRectangleBlackWins() : void
    {
        $lines = [
            ". O . .",
            " O X X X",
            "  O X O .",
            "   X X O X",
            "    . O X ."
        ];
        $this->assertEquals("black", resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testRectangleWhiteWins
     * @depends testRectangleBlackWins
     */
    public function testSpiralBlackWins() : void
    {
        $lines = [
            "OXXXXXXXX",
            "OXOOOOOOO",
            "OXOXXXXXO",
            "OXOXOOOXO",
            "OXOXXXOXO",
            "OXOOOXOXO",
            "OXXXXXOXO",
            "OOOOOOOXO",
            "XXXXXXXXO"
        ];
        $this->assertEquals("black", resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testRectangleWhiteWins
     * @depends testRectangleBlackWins
     */
    public function testSpiralNobodyWins() : void
    {
        $lines = [
            "OXXXXXXXX",
            "OXOOOOOOO",
            "OXOXXXXXO",
            "OXOXOOOXO",
            "OXOX.XOXO",
            "OXOOOXOXO",
            "OXXXXXOXO",
            "OOOOOOOXO",
            "XXXXXXXXO"
        ];
        $this->assertEquals(null, resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testSpiralBlackWins
     * @depends testSpiralNobodyWins
     */
    public function testIllegalDiagonalNobodyWins() : void
    {
        $lines = [
            "X O . .",
            " O X X X",
            "  O X O .",
            "   . O X .",
            "    X X O O"
        ];

        $this->assertEquals(null, resultFor($this->makeBoard($lines)));
    }
}
