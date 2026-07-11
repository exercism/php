<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class StateOfTicTacToeTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'StateOfTicTacToe.php';
    }

    /**
     * uuid: fe8e9fa9-37af-4d7e-aa24-2f4b8517161a
     */
    #[TestDox('Won games -> Finished game where X won via left column victory')]
    public function testWonGamesFinishedGameWhereXWonViaLeftColumnVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "XOO",
            "X  ",
            "X  "
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 96c30df5-ae23-4cf6-bf09-5ef056dddea1
     */
    #[TestDox('Won games -> Finished game where X won via middle column victory')]
    public function testWonGameFinishedGameWhereXWonViaMiddleColumnVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "OXO",
            " X ",
            " X "
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 0d7a4b0a-2afd-4a75-8389-5fb88ab05eda
     */
    #[TestDox('Won games -> Finished game where X won via right column victory')]
    public function testWonGameFinishedGameWhereXWonViaRightColumnVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "OOX",
            "  X",
            "  X"
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: bd1007c0-ec5d-4c60-bb9f-1a4f22177d51
     */
    #[TestDox('Won games -> Finished game where O won via left column victory')]
    public function testWonGamesFinishedGameWhereOWonViaLeftColumnVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "OXX",
            "OX ",
            "O  "
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: c032f800-5735-4354-b1b9-46f14d4ee955
     */
    #[TestDox('Won games -> Finished game where O won via middle column victory')]
    public function testWonGameFinishedGameWhereOWonViaMiddleColumnVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "XOX",
            " OX",
            " O "
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 662c8902-c94a-4c4c-9d9c-e8ca513db2b4
     */
    #[TestDox('Won games -> Finished game where O won via right column victory')]
    public function testWonGameFinishedGameWhereOWonViaRightColumnVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "XXO",
            " XO",
            "  O"
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 2d62121f-7e3a-44a0-9032-0d73e3494941
     */
    #[TestDox('Won games -> Finished game where X won via top row victory')]
    public function testWonGameFinishedWhereXWonViaTopRowVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "XXX",
            "XOO",
            "O  "
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 346527db-4db9-4a96-b262-d7023dc022b0
     */
    #[TestDox('Won games -> Finished game where X won via middle row victory')]
    public function testWonGameFinishedWhereXWonViaMiddleRowVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "O  ",
            "XXX",
            " O "
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: a013c583-75f8-4ab2-8d68-57688ff04574
     */
    #[TestDox('Won games -> Finished game where X won via bottom row victory')]
    public function testWonGameFinishedWhereXWonViaBottomRowVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            " OO",
            "O X",
            "XXX"
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 2c08e7d7-7d00-487f-9442-e7398c8f1727
     */
    #[TestDox('Won games -> Finished game where O won via top row victory')]
    public function testWonGameFinishedWhereOWonViaTopRowVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "OOO",
            "XXO",
            "XX "
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: bb1d6c62-3e3f-4d1a-9766-f8803c8ed70f
     */
    #[TestDox('Won games -> Finished game where O won via middle row victory')]
    public function testWonGameFinishedWhereOWonViaMiddleRowVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "XX ",
            "OOO",
            "X  "
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 6ef641e9-12ec-44f5-a21c-660ea93907af
     */
    #[TestDox('Won games -> Finished game where O won via bottom row victory')]
    public function testWonGameFinishedWhereOWonViaBottomRowVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "XOX",
            " XX",
            "OOO"
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: ab145b7b-26a7-426c-ab71-bf418cd07f81
     */
    #[TestDox('Won games -> Finished game where X won via falling diagonal victory')]
    public function testWonGameFinishedWhereXWonViaFallingDiagonalVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "XOO",
            " X ",
            "  X"
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 7450caab-08f5-4f03-a74b-99b98c4b7a4b
     */
    #[TestDox('Won games -> Finished game where X won via rising diagonal victory')]
    public function testWonGameFinishedWhereXWonViaRisingDiagonalVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "O X",
            "OX ",
            "X  "
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: c2a652ee-2f93-48aa-a710-a70cd2edce61
     */
    #[TestDox('Won games -> Finished game where O won via falling diagonal victory')]
    public function testWonGameFinishedWhereOWonViaFallingDiagonalVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "OXX",
            "OOX",
            "X O"
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 5b20ceea-494d-4f0c-a986-b99efc163bcf
     */
    #[TestDox('Won games -> Finished game where O won via rising diagonal victory')]
    public function testWonGameFinishedWhereOWonViaRisingDiagonalVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "  O",
            " OX",
            "OXX"
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 035a49b9-dc35-47d3-9d7c-de197161b9d4
     */
    #[TestDox('Won games -> Finished game where X won via a row and a column victory')]
    public function testWonGameFinishedGameWhereXWonViaARowAndAColumnVictory(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "XXX",
            "XOO",
            "XOO"
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: e5dfdeb0-d2bf-4b5a-b307-e673f69d4a53
     */
    #[TestDox('Won games -> Finished game where X won via two diagonal victories')]
    public function testWonGameFinishedGameWhereXWonViaTwoDiagonalVictories(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "XOX",
            "OXO",
            "XOX"
        ];
        $this->assertEquals(State::Win, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: b42ed767-194c-4364-b36e-efbfb3de8788
     */
    #[TestDox('Drawn games -> Draw')]
    public function testDrawnGamesDraw(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "XOX",
            "XXO",
            "OXO"
        ];
        $this->assertEquals(State::Draw, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 227a76b2-0fef-4e16-a4bd-8f9d7e4c3b13
     */
    #[TestDox('Drawn games -> Another draw')]
    public function testDrawnGamesAnotherDraw(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "XXO",
            "OXX",
            "XOO"
        ];
        $this->assertEquals(State::Draw, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 4d93f15c-0c40-43d6-b966-418b040012a9
     */
    #[TestDox('Ongoing games -> Ongoing game: one move in')]
    public function testOngoingGamesOngoingGameOneMoveIn(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "   ",
            "X  ",
            "   "
        ];
        $this->assertEquals(State::Ongoing, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: c407ae32-4c44-4989-b124-2890cf531f19
     */
    #[TestDox('Ongoing games -> Ongoing game: two moves in')]
    public function testOngoingGamesOngoingGameTwoMovesIn(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "O  ",
            " X ",
            "   "
        ];
        $this->assertEquals(State::Ongoing, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 199b7a8d-e2b6-4526-a85e-78b416e7a8a9
     */
    #[TestDox('Ongoing games -> Ongoing game: five moves in')]
    public function testOngoingGamesOngoingGameFiveMovesIn(): void
    {
        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "X  ",
            " XO",
            "OX "
        ];
        $this->assertEquals(State::Ongoing, $stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 1670145b-1e3d-4269-a7eb-53cd327b302e
     */
    #[TestDox('Invalid boards -> Invalid board: X went twice')]
    public function testInvalidBoardsInvalidBoardXWentTwice(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Wrong turn order: X went twice");

        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "XX ",
            "   ",
            "   "
        ];
        $stateOfTicTacToe->gameState($board);
    }

    /**
     * uuid: 47c048e8-b404-4bcf-9e51-8acbb3253f3b
     */
    #[TestDox('Invalid boards -> Invalid board: O started')]
    public function testInvalidBoardsInvalidBoardOStarted(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Wrong turn order: O started");

        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "OOX",
            "   ",
            "   "
        ];
        $stateOfTicTacToe->gameState($board);
    }

    /**
     * uuid: 6c1920f2-ab5c-4648-a0c9-997414dda5eb
     */
    #[TestDox('Invalid boards -> Invalid board: X won and O kept playing')]
    public function testInvalidBoardsInvalidBoardXWonAndOKeptPlaying(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Impossible board: game should have ended after the game was won");

        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "XXX",
            "OOO",
            "   "
        ];
        $stateOfTicTacToe->gameState($board);
    }

    /**
     * uuid: 4801cda2-f5b7-4c36-8317-3cdd167ac22c
     */
    #[TestDox('Invalid boards -> Invalid board: players kept playing after a win')]
    public function testInvalidBoardsInvalidBoardPlayersKeptPlayingAfterAWin(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Impossible board: game should have ended after the game was won");

        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "XXX",
            "OOO",
            "XOX"
        ];
        $stateOfTicTacToe->gameState($board);
    }

    /**
     * uuid: 5a84757a-fc86-4328-aec9-a5759e6ed35d
     */
    #[TestDox('Invalid boards -> Invalid board: O kept playing after X wins')]
    public function testInvalidBoardsInvalidBoardOKeptPlayingAfterXWins(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Impossible board: game should have ended after the game was won");

        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "OO ",
            "XXX",
            " O "
        ];
        $stateOfTicTacToe->gameState($board);
    }

    /**
     * uuid: cf25543d-583a-4656-b9ab-f82dc00a4a02
     */
    #[TestDox('Invalid boards -> Invalid board: X kept playing after O wins')]
    public function testInvalidBoardsInvalidBoardXKeptPlayingAfterOWins(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Impossible board: game should have ended after the game was won");

        $stateOfTicTacToe = new StateOfTicTacToe();
        $board = [
            "XX ",
            "OOO",
            " XX"
        ];
        $stateOfTicTacToe->gameState($board);
    }
}
