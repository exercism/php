<?php

function sieve($number)
{

    if ($number == 1) {
        return [];
    }

    $candidates = _getNumbersFrom2To($number);

    foreach ($candidates as $prime) {
        foreach ($candidates as $key => $multiple) {

            if (_areDifferent($multiple, $prime) && _areMultiples($multiple, $prime)) {
                unset($candidates[$key]);
            }
        }
    }

    return array_values($candidates);
}

function _getNumbersFrom2To($number): array
{
    $candidates = range(2, $number);
    return $candidates;
}

function _areDifferent($multiple, $prime): bool
{
    return ($multiple != $prime);
}

function _areMultiples($multiple, $prime): bool
{
    return ($multiple % $prime == 0);
}