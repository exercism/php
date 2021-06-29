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
