<?php

declare(strict_types=1);

function find($needle, $haystack)
{
    $left = 0;
    $right = count($haystack);
    while ($left <= $right) {
        $middle = floor(($left + $right) / 2);
        if (!isset($haystack[$middle])) {
            return -1;
        }
        if ($haystack[$middle] < $needle) {
            $left = $middle + 1;
        } elseif ($haystack[$middle] > $needle) {
            $right = $middle - 1;
        } elseif ($haystack[$middle] === $needle) {
            return $middle;
        }
    }
    return -1;
}
