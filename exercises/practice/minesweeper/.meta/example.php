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

function solve($minesweeperBoard)
{
    $minesweeperBoard = makeBoardFromString($minesweeperBoard);

    validateBoardDimensions($minesweeperBoard);

    validateBorders($minesweeperBoard);

    $grid = removeBorders($minesweeperBoard);

    validateGridSize($grid);

    validateContainsOnlyMines($grid);

    $gridWithResults = addMineCount($grid);

    return makeStringFromBoard(applyBorders($gridWithResults));
}

function makeBoardFromString($string)
{
    return array_map('str_split', explode("\n", trim($string)));
}

function makeStringFromBoard($board)
{
    return "\n" . implode("\n", $board) . "\n";
}

function validateBoardDimensions($board)
{
    $topRowWidth = count($board[0]);
    foreach ($board as $line) {
        if (count($line) !== $topRowWidth) {
            throw new InvalidArgumentException('Your rows are not of equal length');
        }
    }
}

function validateBorders($board)
{
    $topBorder = current(array_slice($board, 0, 1));
    $middle = array_slice($board, 1, -1);
    $bottomBorder = current(array_slice($board, 0, 1));

    validateArrayStartsAndEndsWith($topBorder, '+');
    validateArrayStartsAndEndsWith($bottomBorder, '+');

    foreach (array_slice($topBorder, 1, -1) as $border) {
        if ($border !== '-') {
            throw new InvalidArgumentException('Top border is incomplete');
        }
    }

    foreach (array_slice($bottomBorder, 1, -1) as $border) {
        if ($border !== '-') {
            throw new InvalidArgumentException('Bottom border is incomplete');
        }
    }

    foreach ($middle as $line) {
        validateArrayStartsAndEndsWith($line, '|');
    }
}

function validateArrayStartsAndEndsWith($arr, $char)
{
    if (array_shift($arr) !== $char || array_pop($arr) !== $char) {
        throw new InvalidArgumentException('Invalid edge' . implode($arr) . ' ' . $char);
    }
}

function removeBorders($minesweeperBoard)
{
    array_shift($minesweeperBoard);
    array_pop($minesweeperBoard);

    return array_map(function ($line) {
        return array_slice($line, 1, -1);
    }, $minesweeperBoard);
}

function validateGridSize($grid)
{
    if (count($grid[0]) < 2 && count($grid) < 2) {
        throw new InvalidArgumentException('Your grid is too small. Must be at least 2 squares');
    }
}

function validateContainsOnlyMines($board)
{
    foreach ($board as $row) {
        foreach ($row as $cell) {
            if (!in_array($cell, [' ', '*'])) {
                throw new InvalidArgumentException('Your board contains illegal characters: ' . $cell);
            }
        }
    }
}

function applyBorders($grid)
{
    $width = count($grid[0]);
    $mid = array_map(function ($line) {
        array_unshift($line, '|');
        $line[] = '|';
        return $line;
    }, $grid);
    $horizontalBorder = array_fill(0, $width, '-');
    array_unshift($horizontalBorder, '+');
    $horizontalBorder[] = '+';

    array_unshift($mid, $horizontalBorder);
    $mid[] = $horizontalBorder;

    return array_map('join', $mid);
}

function numSurroundingMines($grid, $r, $c)
{
    $positions = [
        [-1, -1],
        [-1, 0],
        [-1, 1],
        [0, -1],
        [0, 1],
        [1, -1],
        [1, 0],
        [1, 1],
    ];

    return array_reduce($positions, function ($mines, $offset) use ($grid, $r, $c) {
        $r = $r + $offset[0];
        $c = $c + $offset[1];
        if (isset($grid[$r][$c]) && $grid[$r][$c] == '*') {
            $mines += 1;
        }
        return $mines;
    }) ?: ' ';
}

function addMineCount($grid)
{
    foreach ($grid as $r => &$row) {
        foreach ($row as $c => &$cell) {
            if ($cell == '*') {
                continue;
            }
            if ($cell == ' ') {
                $cell = numSurroundingMines($grid, $r, $c);
            }
        }
    }
    return $grid;
}
