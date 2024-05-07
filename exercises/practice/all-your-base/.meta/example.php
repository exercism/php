<?php

declare(strict_types=1);

function rebase(int $fromBase, array $digits, int $toBase): array
{
    if ($fromBase <= 1) {
        throw new InvalidArgumentException('input base must be >= 2');
    }

    if ($toBase <= 1) {
        throw new InvalidArgumentException('output base must be >= 2');
    }

    $decTotal = 0;
    $ordered = array_reverse($digits);
    for ($i = 0; $i < count($digits); $i++) {
        $decTotal += $ordered[$i] * pow($fromBase, $i);
        if ($ordered[$i] >= $fromBase || $ordered[$i] < 0) {
            throw new InvalidArgumentException('all digits must satisfy 0 <= d < input base');
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
