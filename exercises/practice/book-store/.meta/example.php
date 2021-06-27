<?php

declare(strict_types=1);

function total($items)
{
    return calculate($items, 0);
}

function calculate($items, $total)
{
    if (empty($items)) {
        return $total;
    }

    $group = array_unique($items);
    $totalMin = INF;

    for ($i = count($group); $i > 0; $i--) {
        $itemsToRemove = array_flip(array_slice($group, 0, $i));
        $itemsRemaining = array_filter($items, function ($x) use (&$itemsToRemove) {
            if (array_key_exists($x, $itemsToRemove)) {
                unset($itemsToRemove[$x]);
                return false;
            }
            return true;
        });
        $totalCurrent = calculate($itemsRemaining, $total + totalForGroup($i));
        $totalMin = min([$totalMin, $totalCurrent]);
    }

    return $totalMin;
}

function totalForGroup($count)
{
    $discount = [0, 0, 0.05, 0.1, 0.2, 0.25];
    $price = 8;
    return $price * $count * (1 - $discount[$count]);
}
