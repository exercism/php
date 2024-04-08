<?php

declare(strict_types=1);

function squareOfSum($max)
{
    $sum = 0;

    foreach (range(1, $max) as $i) {
        $sum += $i;
    }

    $sum = pow($sum, 2);

    return $sum;
}

function sumOfSquares($max)
{
    $sum = 0;

    foreach (range(1, $max) as $i) {
        $sum += pow($i, 2);
    }

    return $sum;
}

function difference($max)
{
    return squareOfSum($max) - sumOfSquares($max);
}
