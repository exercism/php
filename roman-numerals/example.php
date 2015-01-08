<?php


function toRoman($number)
{
    $mapping = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];

    $return = '';

    foreach ($mapping as $decimal => $roman) {
            $quantity = (int) ($number / $decimal);
            $return .= str_repeat($roman, $quantity);
            $number -= $decimal * $quantity;
    }

    return $return;
}
