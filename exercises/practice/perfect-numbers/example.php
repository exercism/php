<?php

function getClassification($number)
{
    if ($number <= 0) {
        throw new InvalidArgumentException("You must supply a natural number (positive integer)");
    }

    $sum = 0 ;
    for ($i = 1; $i < $number; $i++) {
        if ($number % $i == 0) {
            $sum += $i ;
        }
    }

    if ($sum == $number) {
        return "perfect" ;
    } elseif ($sum < $number) {
        return "deficient" ;
    } else {
        return "abundant" ;
    }
}
