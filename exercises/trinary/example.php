<?php

function toDecimal($ternaryString, $base = 3)
{
    if (!preg_match('/^[0-2]+$/', $ternaryString)) {
        return 0;
    }

    $decimalNumber = 0;
    $numbers = str_split($ternaryString);
    $maxPower = count($numbers) - 1;
    for ($i = 0; $i <= $maxPower; ++$i) {
        $decimalNumber += $numbers[$maxPower-$i]*pow($base, $i);
    }

    return $decimalNumber;
}
