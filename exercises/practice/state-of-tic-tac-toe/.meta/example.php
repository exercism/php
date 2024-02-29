<?php

declare(strict_types=1);

class StateOfTicTacToe
{
    const WIN = "win";
    const ONGOING = "ongoing";
    const DRAW = "draw";

    public static function gameState(array $board): string
    {
        $xCount = self::countPlayer($board, 'X');
        $oCount = self::countPlayer($board, 'O');

        if ($xCount < $oCount) {
            throw new \RuntimeException("Wrong turn order: O started");
        }

        if ($xCount !== $oCount && $xCount !== $oCount + 1) {
            throw new \RuntimeException("Wrong turn order: X went twice");
        }

        $xWon = self::hasWon($board, 'X');
        $oWon = self::hasWon($board, 'O');

        if ($xWon && $oWon) {
            throw new \RuntimeException("Impossible board: game should have ended after the game was won");
        }

        if ($xWon || $oWon) {
            return self::WIN;
        }

        if ($xCount + $oCount === 9) {
            return self::DRAW;
        }

        return self::ONGOING;
    }

    private static function countPlayer(array $board, string $player): int
    {
        $count = 0;
        foreach ($board as $row) {
            foreach (str_split($row) as $cell) {
                if ($cell === $player) {
                    $count++;
                }
            }
        }
        return $count;
    }

    private static function hasWon(array $board, string $player): bool
    {
        for ($i = 0; $i < 3; $i++) {
            if (($board[$i][0] === $player && $board[$i][1] === $player && $board[$i][2] === $player) || ($board[0][$i] === $player && $board[1][$i] === $player && $board[2][$i] === $player)) {
                return true;
            }
        }
        // Check the diagonal
        return ($board[0][0] === $player && $board[1][1] === $player && $board[2][2] === $player) || ($board[0][2] === $player && $board[1][1] === $player && $board[2][0] === $player);
    }
}
