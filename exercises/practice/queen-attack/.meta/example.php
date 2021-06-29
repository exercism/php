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

/**
 * Check if the queen is placed on a valid square.
 *
 * @param  int $xCoordinate
 * @param  int $yCoordinate
 *
 * @return bool
 *
 * @throws InvalidArgumentException
 */
function placeQueen($xCoordinate, $yCoordinate)
{
    if ($xCoordinate < 0 || $yCoordinate < 0) {
        throw new InvalidArgumentException('The rank and file numbers must be positive.');
    }

    if ($xCoordinate > 7 || $yCoordinate > 7) {
        throw new InvalidArgumentException('The position must be on a standard size chess board.');
    }

    return true;
}

/**
 * Check if 2 queens can attack each other from their current positions.
 *
 * @param  array $whiteQueen  The queen's x,y coordinates on the board.
 * @param  array $blackQueen  The queen's x,y coordinates on the board.
 *
 * @return bool
 */
function canAttack($whiteQueen, $blackQueen)
{
    placeQueen($whiteQueen[0], $whiteQueen[1]);
    placeQueen($blackQueen[0], $blackQueen[1]);

    if (
        onRankOrFile($whiteQueen[0], $blackQueen[0]) ||
        onRankOrFile($whiteQueen[1], $blackQueen[1]) ||
        onDiagonal($whiteQueen[0], $whiteQueen[1], $blackQueen[0], $blackQueen[1])
    ) {
        return true;
    }

    return false;
}

/**
 * Check if to coordinates or on the same rank or file.
 *
 * @param  int $whiteCoordinate
 * @param  int $blackCoordinate
 *
 * @return bool
 */
function onRankOrFile($whiteCoordinate, $blackCoordinate)
{
    if ($whiteCoordinate === $blackCoordinate) {
        return true;
    }

    return false;
}

/**
 * Check if coordinates or on a straight diagonal.
 *
 * @param  int $whiteRank
 * @param  int $whiteFile
 * @param  int $blackRank
 * @param  int $blackFile
 *
 * @return bool
 */
function onDiagonal($whiteRank, $whiteFile, $blackRank, $blackFile)
{
    $whitePosition = abs(($whiteRank - $blackRank));
    $blackPosition = abs(($whiteFile - $blackFile));

    if ($whitePosition === $blackPosition) {
        return true;
    }

    return false;
}
