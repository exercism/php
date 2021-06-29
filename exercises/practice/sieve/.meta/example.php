<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

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
