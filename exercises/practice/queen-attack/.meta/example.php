<?php

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
