<?php

declare(strict_types=1);

class ConnectTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Connect.php';
    }

    /**
     * uuid 6eff0df4-3e92-478d-9b54-d3e8b354db56
     * @testdox an empty board has no winner
     */
    public function testEmptyBoardHasNoWinner(): void
    {
        $lines = [
            ". . . . .",
            " . . . . .",
            "  . . . . .",
            "   . . . . .",
            "    . . . . .",
        ];
        $this->assertEquals(null, winner($lines));
    }

    /**
     * uuid 298b94c0-b46d-45d8-b34b-0fa2ea71f0a4
     * @testdox X can win on a 1x1 board
     */
    public function testOneByOneBoardBlack(): void
    {
        $lines = ["X"];
        $this->assertEquals("black", winner($lines));
    }

    /**
     * uuid 763bbae0-cb8f-4f28-bc21-5be16a5722dc
     * @testdox O can win on a 1x1 board
     */
    public function testOneByOneBoardWhite(): void
    {
        $lines = ["O"];
        $this->assertEquals("white", winner($lines));
    }

    /**
     * uuid 819fde60-9ae2-485e-a024-cbb8ea68751b
     * @testdox only edges does not make a winner
     */
    public function testOnlyEgesDoesNotMakeAWinner(): void
    {
        $lines = [
            "O O O X",
            " X . . X",
            "  X . . X",
            "   X O O O",
        ];
        $this->assertEquals("", winner($lines));
    }

    /**
     * uuid 2c56a0d5-9528-41e5-b92b-499dfe08506c
     * @testdox illegal diagonal does not make a winner
     */
    public function testIllegalDiagonalDoesNotMakeAWinner(): void
    {
        $lines = [
            "X O . .",
            " O X X X",
            "  O X O .",
            "   . O X .",
            "    X X O O",
        ];
        $this->assertEquals("", winner($lines));
    }

    /**
     * uuid 41cce3ef-43ca-4963-970a-c05d39aa1cc1
     * @testdox nobody wins crossing adjacent angles
     */
    public function testNobodyWinsCrossingAdjacentAngles(): void
    {
        $lines = [
            "X . . .",
            " . X O .",
            "  O . X O",
            "   . O . X",
            "    . . O .",
        ];
        $this->assertEquals("", winner($lines));
    }

    /**
     * uuid cd61c143-92f6-4a8d-84d9-cb2b359e226b
     * @testdox X wins crossing from left to right
     */
    public function testXWinsCrossingFromLeftToRight(): void
    {
        $lines = [
            ". O . .",
            " O X X X",
            "  O X O .",
            "   X X O X",
            "    . O X .",
        ];
        $this->assertEquals("black", winner($lines));
    }

    /**
     * uuid 73d1eda6-16ab-4460-9904-b5f5dd401d0b
     * @testdox O wins crossing from top to bottom
     */
    public function testOWinsCrossingFromTopToBottom(): void
    {
        $lines = [
            ". O . .",
            " O X X X",
            "  O O O .",
            "   X X O X",
            "    . O X .",
        ];
        $this->assertEquals("white", winner($lines));
    }

    /**
     * uuid c3a2a550-944a-4637-8b3f-1e1bf1340a3d
     * @testdox X wins using a convoluted path
     */
    public function testXWinsUsingAConvolutedPath(): void
    {
        $lines = [
            ". X X . .",
            " X . X . X",
            "  . X . X .",
            "   . X X . .",
            "    O O O O O",
        ];
        $this->assertEquals("black", winner($lines));
    }

    /**
     * uuid 17e76fa8-f731-4db7-92ad-ed2a285d31f3
     * @testdox X wins using a spiral path
     */
    public function testXWinsUsingASpiralPath(): void
    {
        $lines = [
            "O X X X X X X X X",
            " O X O O O O O O O",
            "  O X O X X X X X O",
            "   O X O X O O O X O",
            "    O X O X X X O X O",
            "     O X O O O X O X O",
            "      O X X X X X O X O",
            "       O O O O O O O X O",
            "        X X X X X X X X O",
        ];
        $this->assertEquals("black", winner($lines));
    }
}
