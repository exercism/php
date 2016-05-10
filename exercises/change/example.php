<?php

function findFewestCoins($coins, $targetValue)
{
    if ($targetValue == 0) {
        return array(); // no coins
    }
    if ($targetValue < 0) {
        throw new InvalidArgumentException('Cannot make change for negative value');
    }
    if (min($coins) > $targetValue) {
        throw new InvalidArgumentException('No coins small enough to make change');
    }

    $minCoins = [];

    // populate the minCoins array with the minimum number of coins
    // needed to make each step, from 0 up to our target value
    foreach (range(0, $targetValue) as $step) {
        // if the step is one of our coins, then just use that coin
        if (in_array($step, $coins)) {
            $minCoins[$step] = array($step);
        } else {
            foreach ($coins as $coin) {
                // ignore if the coin value is bigger than our step.
                if ($coin > $step) {
                    continue;
                }

                // lookup the minimum number of coins to make the step, minus the value of the current coin
                $lastCoins = $minCoins[$step - $coin];

                // if there is no minCoins currently set for this step, or if the number of coins
                // is greater than the number of coins it takes to make the last step, plus one new coin...
                if (!isset($minCoins[$step]) || count($minCoins[$step]) > 1 + count($lastCoins)) {
                    // set to the current coin, with the coins needed to make the last step
                    $minCoins[$step] = array_merge(array($coin), $lastCoins);
                }
            }
        }
    }

    return $minCoins[$targetValue];
}
