<?php

declare(strict_types=1);

class StateOfTicTacToeTest extends PHPUnit\Framework\TestCase
{
    private StateOfTicTacToe $stateOfTicTacToe;

    public static function setUpBeforeClass(): void
    {
        require_once 'StateOfTicTacToe.php';
    }

    protected function setUp(): void
    {
        $this->stateOfTicTacToe = new StateOfTicTacToe();
    }

    /**
     * uuid: fe8e9fa9-37af-4d7e-aa24-2f4b8517161a
     */
    public function testWonGamesFinishedGameWhereXWonViaLeftColumnVictory(): void
    {
        $board = [
            "XOO",
            "X  ",
            "X  "
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 96c30df5-ae23-4cf6-bf09-5ef056dddea1
     */
    public function testWonGameFinishedGameWhereXWonViaMiddleColumnVictory(): void
    {
        $board = [
            "OXO",
            " X ",
            " X "
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 0d7a4b0a-2afd-4a75-8389-5fb88ab05eda
     */
    public function testWonGameFinishedGameWhereXWonViaRightColumnVictory(): void
    {
        $board = [
            "OOX",
            "  X",
            "  X"
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: bd1007c0-ec5d-4c60-bb9f-1a4f22177d51
     */
    public function testWonGamesFinishedGameWhereOWonViaLeftColumnVictory(): void
    {
        $board = [
            "OXX",
            "OX ",
            "O  "
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: c032f800-5735-4354-b1b9-46f14d4ee955
     */
    public function testWonGameFinishedGameWhereOWonViaMiddleColumnVictory(): void
    {
        $board = [
            "XOX",
            " OX",
            " O "
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 662c8902-c94a-4c4c-9d9c-e8ca513db2b4
     */
    public function testWonGameFinishedGameWhereOWonViaRightColumnVictory(): void
    {
        $board = [
            "XXO",
            " XO",
            "  O"
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 2d62121f-7e3a-44a0-9032-0d73e3494941
     */
    public function testWonGameFinishedWhereXWonViaTopRowVictory(): void
    {
        $board = [
            "XXX",
            "XOO",
            "O  "
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 346527db-4db9-4a96-b262-d7023dc022b0
     */
    public function testWonGameFinishedWhereXWonViaMiddleRowVictory(): void
    {
        $board = [
            "O  ",
            "XXX",
            " O "
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: a013c583-75f8-4ab2-8d68-57688ff04574
     */
    public function testWonGameFinishedWhereXWonViaBottomRowVictory(): void
    {
        $board = [
            " OO",
            "O X",
            "XXX"
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 2c08e7d7-7d00-487f-9442-e7398c8f1727
     */
    public function testWonGameFinishedWhereOWonViaTopRowVictory(): void
    {
        $board = [
            "OOO",
            "XXO",
            "XX "
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: bb1d6c62-3e3f-4d1a-9766-f8803c8ed70f
     */
    public function testWonGameFinishedWhereOWonViaMiddleRowVictory(): void
    {
        $board = [
            "XX ",
            "OOO",
            "X  "
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 6ef641e9-12ec-44f5-a21c-660ea93907af
     */
    public function testWonGameFinishedWhereOWonViaBottomRowVictory(): void
    {
        $board = [
            "XOX",
            " XX",
            "OOO"
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: ab145b7b-26a7-426c-ab71-bf418cd07f81
     */
    public function testWonGameFinishedWhereXWonViaFallingDiagonalVictory(): void
    {
        $board = [
            "XOO",
            " X ",
            "  X"
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 7450caab-08f5-4f03-a74b-99b98c4b7a4b
     */
    public function testWonGameFinishedWhereXWonViaRisingDiagonalVictory(): void
    {
        $board = [
            "O X",
            "OX ",
            "X  "
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: c2a652ee-2f93-48aa-a710-a70cd2edce61
     */
    public function testWonGameFinishedWhereOWonViaFallingDiagonalVictory(): void
    {
        $board = [
            "OXX",
            "OOX",
            "X O"
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 5b20ceea-494d-4f0c-a986-b99efc163bcf
     */
    public function testWonGameFinishedWhereOWonViaRisingDiagonalVictory(): void
    {
        $board = [
            "  O",
            " OX",
            "OXX"
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 035a49b9-dc35-47d3-9d7c-de197161b9d4
     */
    public function testWonGameFinishedGameWhereXWonViaARowAndAColumnVictory(): void
    {
        $board = [
            "XXX",
            "XOO",
            "XOO"
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: e5dfdeb0-d2bf-4b5a-b307-e673f69d4a53
     */
    public function testWonGameFinishedGameWhereXWonViaTwoDiagonalVictories(): void
    {
        $board = [
            "XOX",
            "OXO",
            "XOX"
        ];
        $this->assertEquals(State::Win, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: b42ed767-194c-4364-b36e-efbfb3de8788
     */
    public function testDrawGame(): void
    {
        $board = [
            "XOX",
            "XXO",
            "OXO"
        ];
        $this->assertEquals(State::Draw, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 227a76b2-0fef-4e16-a4bd-8f9d7e4c3b13
     */
    public function testAnotherDrawGame(): void
    {
        $board = [
            "XXO",
            "OXX",
            "XOO"
        ];
        $this->assertEquals(State::Draw, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 4d93f15c-0c40-43d6-b966-418b040012a9
     */
    public function testOngoingGameOneMoveIn(): void
    {
        $board = [
            "   ",
            "X  ",
            "   "
        ];
        $this->assertEquals(State::Ongoing, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: c407ae32-4c44-4989-b124-2890cf531f19
     */
    public function testOngoingGameTwoMovesIn(): void
    {
        $board = [
            "O  ",
            " X ",
            "   "
        ];
        $this->assertEquals(State::Ongoing, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 199b7a8d-e2b6-4526-a85e-78b416e7a8a9
     */
    public function testOngoingGameFiveMovesIn(): void
    {
        $board = [
            "X  ",
            " XO",
            "OX "
        ];
        $this->assertEquals(State::Ongoing, $this->stateOfTicTacToe->gameState($board));
    }

    /**
     * uuid: 1670145b-1e3d-4269-a7eb-53cd327b302e
     */
    public function testInvalidBoardsXWentTwice(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Wrong turn order: X went twice");

        $board = [
            "XX ",
            "   ",
            "   "
        ];
        $this->stateOfTicTacToe->gameState($board);
    }

    /**
     * uuid: 47c048e8-b404-4bcf-9e51-8acbb3253f3b
     */
    public function testInvalidBoardOStarted(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Wrong turn order: O started");

        $board = [
            "OOX",
            "   ",
            "   "
        ];
        $this->stateOfTicTacToe->gameState($board);
    }

    /**
     * uuid: 6c1920f2-ab5c-4648-a0c9-997414dda5eb
     */
    public function testInvalidBoard(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Impossible board: game should have ended after the game was won");

        $board = [
            "XXX",
            "OOO",
            "   "
        ];
        $this->stateOfTicTacToe->gameState($board);
    }

    /**
     * uuid: 4801cda2-f5b7-4c36-8317-3cdd167ac22c
     */
    public function testInvalidBoardPlayersKeptPlayingAfterAWin(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Impossible board: game should have ended after the game was won");

        $board = [
            "XXX",
            "OOO",
            "XOX"
        ];
        $this->stateOfTicTacToe->gameState($board);
    }
}
