<?php

function sumOfMultiples($number, $multiples)
{
    $numbers = [];
    for ($i = 1; $i < $number; $i++) {
        foreach ($multiples as $multiple) {
            $testNumber = $multiple * $i;
            if ($testNumber < $number) {
                array_push($numbers, $testNumber);
            }
        }
    }
    return array_sum(array_unique($numbers));
}
