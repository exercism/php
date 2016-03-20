<?php

function squareOfSums($max)
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
    return squareOfSums($max) - sumOfSquares($max);
}
