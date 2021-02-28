<?php

function steps($number)
{
    $stepCount = 0;
    if ($number < 1) {
        throw new InvalidArgumentException('Only positive numbers are allowed');
    }
    do {
        if ($number === 1) {
            break;
        }
        $stepCount++;
        $number = ($number % 2 === 0 ? $number / 2 : 3 * $number + 1);
    } while ($number !== 0);

    return $stepCount;
}
