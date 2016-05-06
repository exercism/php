<?php

function isPangram($string)
{
    $string = str_replace(['-', ' '], '', mb_strtolower($string));
    $letters = preg_split('//u', $string);
    $alphabet = str_split('abcdefghijklmnopqrstuvwxyz');
    return count(array_intersect($alphabet, $letters)) === count($alphabet);
}
