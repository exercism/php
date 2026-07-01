<?php

declare(strict_types=1);

function squareRoot(int $number): int
{
    $sqrt = $number;

    while (pow($sqrt, 2) > $number) {
        $sqrt--;
    }

    return $sqrt;
}
