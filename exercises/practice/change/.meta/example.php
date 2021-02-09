<?php

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
