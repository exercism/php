<?php

function isIsogram($string)
{
    $string = str_replace(['-', ' '], '', mb_strtolower($string));
    $letters = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);
    return count($letters) === count(array_unique($letters));
}
