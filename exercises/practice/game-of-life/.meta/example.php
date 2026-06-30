<?php

declare(strict_types=1);

class GameOfLife
{
    const NEIGHBORS = [
        [-1, -1], [-1, 0], [-1, 1],
        [ 0, -1],          [ 0, 1],
        [ 1, -1], [ 1, 0], [ 1, 1],
    ];

    public function __construct(public array $matrix)
    {
    }

    public function tick(): void
    {
        $currentMatrix = $this->matrix;

        foreach ($currentMatrix as $row => $values) {
            foreach ($values as $col => $cell) {
                $countLiveCell = $this->checkNeighborhood($currentMatrix, $row, $col);

                if ($this->matrix[$row][$col] === 1 && ($countLiveCell === 2 || $countLiveCell === 3)) {
                    $this->matrix[$row][$col] = 1;
                } elseif ($this->matrix[$row][$col] === 0 && $countLiveCell === 3) {
                    $this->matrix[$row][$col] = 1;
                } else {
                    $this->matrix[$row][$col] = 0;
                }
            }
        }
    }

    private function checkNeighborhood(array $matrix, int $cellRow, int $cellCol): int
    {
        $count = 0;

        foreach (self::NEIGHBORS as [$checkRow, $checkCol]) {
            $neighbRow = $checkRow + $cellRow;
            $neighbCol = $checkCol + $cellCol;

            if (
                $neighbRow < 0 ||
                $neighbCol < 0 ||
                $neighbRow >= count($matrix) ||
                $neighbCol >= count($matrix[0])
            ) {
                continue;
            }

            $count += $matrix[$neighbRow][$neighbCol];
        }

        return $count;
    }
}
