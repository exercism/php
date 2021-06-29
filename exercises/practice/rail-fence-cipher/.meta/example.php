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

function encode($plainMessage, $rails)
{
    $cipherMessage = [];
    $position = ($rails * 2) - 2;
    for ($index = 0; $index < strlen($plainMessage); $index++) {
        for ($step = 0; $step < $rails; $step++) {
            if (!isset($cipherMessage[$step])) {
                $cipherMessage[$step] = '';
            }
            if ($index % $position == $step || $index % $position == $position - $step) {
                $cipherMessage[$step] .= $plainMessage[$index];
            } else {
                $cipherMessage[$step] .= ".";
            }
        }
    }
    return implode('', str_replace('.', '', $cipherMessage));
}

function decode($cipherMessage, $rails)
{
    $position = ($rails * 2) - 2;
    $textLength = strlen($cipherMessage);

    $minLength = (int) floor($textLength / $position);
    $balance = $textLength % $position;
    $lengths = [];
    $strings = [];
    $totalLengths = 0;
    //find no of characters in each row
    for ($rowIndex = 0; $rowIndex < $rails; $rowIndex++) {
        $lengths[$rowIndex] = $minLength;
        if ($rowIndex != 0 && $rowIndex != ($rails - 1)) {
            $lengths[$rowIndex] += $minLength;
        }
        if ($balance > $rowIndex) {
            $lengths[$rowIndex]++;
        }
        if ($balance > ($rails + ($rails - $rowIndex) - 2)) {
            $lengths[$rowIndex]++;
        }
        $strings[] = substr($cipherMessage, $totalLengths, $lengths[$rowIndex]);
        $totalLengths += $lengths[$rowIndex];
    }

    //convert row of characters to plain message
    $plainText = '';
    while (strlen($plainText) < $textLength) {
        for ($charIndex = 0; $charIndex < $position; $charIndex++) {
            if (isset($strings[$charIndex])) {
                $index = $charIndex;
            } else {
                $index = $position - $charIndex;
            }
            $plainText .= substr($strings[$index], 0, 1);
            $strings[$index] = substr($strings[$index], 1);
        }
    }
    return $plainText;
}
