<?php

function rebase(int $fromBase, array $digits, int $toBase)
{
    if (empty($digits) || $digits[0] == 0 || $fromBase <= 1 || $toBase <= 1) {
        return null;
    }

    $decTotal = 0;
    $ordered = array_reverse($digits);
    for ($i = 0; $i < count($digits); $i++) {
        $decTotal += $ordered[$i] * pow($fromBase, $i);
        if ($ordered[$i] >= $fromBase || $ordered[$i] < 0) {
            return null;
        }
    }

    $newArr = [];
    while ($decTotal >= $toBase) {
        $remainder = $decTotal % $toBase;
        $newArr[] = $remainder;
        $decTotal = floor($decTotal / $toBase);
    }
    $newArr[] = $decTotal;

    return array_reverse($newArr);
}
