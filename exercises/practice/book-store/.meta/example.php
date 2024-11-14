<?php

declare(strict_types=1);

function total(array $items): int
{
    return calculate($items, 0);
}

function calculate(array $items, int $totalCents): int
{
    if (empty($items)) {
        return $totalCents;
    }

    $group = array_unique($items);
    $totalMinCents = PHP_INT_MAX;

    for ($i = count($group); $i > 0; $i--) {
        $itemsToRemove = array_flip(array_slice($group, 0, $i));
        $itemsRemaining = array_filter($items, function ($x) use (&$itemsToRemove) {
            if (array_key_exists($x, $itemsToRemove)) {
                unset($itemsToRemove[$x]);
                return false;
            }
            return true;
        });

        $totalCurrentCents = calculate($itemsRemaining, $totalCents + totalForGroup($i));
        $totalMinCents = min($totalMinCents, $totalCurrentCents);
    }

    return $totalMinCents;
}

function totalForGroup(int $count): int
{
    $discount = [0, 0, 0.05, 0.1, 0.2, 0.25];
    $price = 8;
    return intval($price * $count * (1 - $discount[$count]) * 100);
}
