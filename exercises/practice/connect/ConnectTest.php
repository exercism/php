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

class ConnectTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Connect.php';
    }

    /**
     * Strip off the spaces which are only for readability.
     */
    private function makeBoard($lines): array
    {
        return array_map(function ($line) {
            return str_replace(" ", "", $line);
        }, $lines);
    }

    public function testEmptyBoardHasNoWinner(): void
    {
        $lines = [
            ". . . . .",
            " . . . . .",
            "  . . . . .",
            "   . . . . .",
            "    . . . . .",
        ];
        $this->assertEquals(null, resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testEmptyBoardHasNoWinner
     */
    public function testOneByOneBoardBlack(): void
    {
        $lines = ["X"];
        $this->assertEquals("black", resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testEmptyBoardHasNoWinner
     */
    public function testOneByOneBoardWhite(): void
    {
        $lines = ["O"];
        $this->assertEquals("white", resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testOneByOneBoardBlack
     * @depends testOneByOneBoardWhite
     */
    public function testConvultedPath(): void
    {
        $lines = [
            ". X X . .",
            " X . X . X",
            "  . X . X .",
            "   . X X . .",
            "    O O O O O",
        ];
        $this->assertEquals("black", resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testConvultedPath
     */
    public function testRectangleWhiteWins(): void
    {
        $lines = [
            ". O . .",
            " O X X X",
            "  O O O .",
            "   X X O X",
            "    . O X .",
        ];
        $this->assertEquals("white", resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testConvultedPath
     */
    public function testRectangleBlackWins(): void
    {
        $lines = [
            ". O . .",
            " O X X X",
            "  O X O .",
            "   X X O X",
            "    . O X .",
        ];
        $this->assertEquals("black", resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testRectangleWhiteWins
     * @depends testRectangleBlackWins
     */
    public function testSpiralBlackWins(): void
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
            "XXXXXXXXO",
        ];
        $this->assertEquals("black", resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testRectangleWhiteWins
     * @depends testRectangleBlackWins
     */
    public function testSpiralNobodyWins(): void
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
            "XXXXXXXXO",
        ];
        $this->assertEquals(null, resultFor($this->makeBoard($lines)));
    }

    /**
     * @depends testSpiralBlackWins
     * @depends testSpiralNobodyWins
     */
    public function testIllegalDiagonalNobodyWins(): void
    {
        $lines = [
            "X O . .",
            " O X X X",
            "  O X O .",
            "   . O X .",
            "    X X O O",
        ];

        $this->assertEquals(null, resultFor($this->makeBoard($lines)));
    }
}
