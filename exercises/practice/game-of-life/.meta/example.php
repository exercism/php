<?php

declare(strict_types=1);

const NEIGHBORS = [
    [-1, -1], [-1, 0], [-1, 1],
    [ 0, -1],          [ 0, 1],
    [ 1, -1], [ 1, 0], [ 1, 1],
];

function tick(array $matrix): array
{
    $newMatrix = [];

    foreach ($matrix as $row => $values) {
        foreach ($values as $col => $cell) {
            $countLiveCell = checkNeighborhood($matrix, $row, $col);

            if ($matrix[$row][$col] === 1 && ($countLiveCell === 2 || $countLiveCell === 3)) {
                $newMatrix[$row][$col] = 1;
            } elseif ($matrix[$row][$col] === 0 && $countLiveCell === 3) {
                $newMatrix[$row][$col] = 1;
            } else {
                $newMatrix[$row][$col] = 0;
            }
        }
    }

    return $newMatrix;
}

function checkNeighborhood(array $matrix, int $cellRow, int $cellCol): int
{
    $count = 0;

    foreach (NEIGHBORS as [$checkRow, $checkCol]) {
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
