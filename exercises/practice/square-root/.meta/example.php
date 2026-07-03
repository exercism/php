<?php

declare(strict_types=1);

function squareRoot(int $number): int
{
    $squareRoot = $number;

    while (pow($squareRoot, 2) > $number) {
        $squareRoot--;
    }

    return $squareRoot;
}
