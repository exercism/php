<?php

function isArmstrongNumber(int $number) : bool
{
    $total = 0;
    $numberArray = str_split(strval($number));
    $numberCount = count($numberArray);

    foreach ($numberArray as $n) {
        $total += pow(intval($n), $numberCount);
    }

    return $total === $number;
}
