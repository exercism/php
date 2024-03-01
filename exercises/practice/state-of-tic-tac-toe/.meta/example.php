<?php

declare(strict_types=1);

enum State
{
    case Win;
    case Ongoing;
    case Draw;
}

class StateOfTicTacToe
{
    public function gameState(array $board): State
    {
        $xCount = $this->countPlayer($board, 'X');
        $oCount = $this->countPlayer($board, 'O');

        if ($xCount < $oCount) {
            throw new \RuntimeException("Wrong turn order: O started");
        }

        if ($xCount !== $oCount && $xCount !== $oCount + 1) {
            throw new \RuntimeException("Wrong turn order: X went twice");
        }

        $xWon = $this->hasWon($board, 'X');
        $oWon = $this->hasWon($board, 'O');

        if ($xWon && $oWon) {
            throw new \RuntimeException("Impossible board: game should have ended after the game was won");
        }

        if ($xWon || $oWon) {
            return State::Win;
        }

        if ($xCount + $oCount === 9) {
            return State::Draw;
        }

        return State::Ongoing;
    }

    private function countPlayer(array $board, string $player): int
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

    private function hasWon(array $board, string $player): bool
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
