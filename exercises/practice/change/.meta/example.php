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

// adapted from the python example
function findFewestCoins(array $coins, int $total_change): array
{
    // Some checks
    if ($total_change == 0) {
        return []; # no coins
    }
    if ($total_change < 0) {
        throw new InvalidArgumentException("Cannot make change for negative value");
    }
    if (min($coins) > $total_change) {
        throw new InvalidArgumentException('No coins small enough to make change');
    }

    // init values
    $min_coins_required = array_fill(0, $total_change + 1, INF);
    $last_coin = array_fill(0, $total_change + 1, 0);

    $min_coins_required[0] = 0;
    $last_coin[0] = -1;

    foreach (range(1, $total_change) as $change) {
        $final_result = $min_coins_required[$change];
        foreach ($coins as $coin) {
            if ($coin <= $change) {
                $result = $min_coins_required[$change - $coin] + 1;
                if ($result < $final_result) {
                    $final_result = $result;
                    $last_coin[$change] = $change - $coin;
                }
            }
        }
        $min_coins_required[$change] = $final_result;
    }

    // no combination found
    if ($min_coins_required[$total_change] == INF) {
        throw new InvalidArgumentException("No combination can add up to target");
    }

    // init values
    $last_coin_value = $total_change;
    $array = [];
    // if conbination found then build the coins array
    while ($last_coin[$last_coin_value] != -1) {
        $array[] = $last_coin_value - $last_coin[$last_coin_value];
        $last_coin_value = $last_coin[$last_coin_value];
    }

    return $array;
}
