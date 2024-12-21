<?php

declare(strict_types=1);

function score(float $xAxis, float $yAxis): int
{
    $location = $xAxis ** 2 + $yAxis ** 2;

    if ($location > 100) {
        return 0;
    }
    if ($location > 25) {
        return 1;
    }
    if ($location > 1) {
        return 5;
    }

    return 10;
}
