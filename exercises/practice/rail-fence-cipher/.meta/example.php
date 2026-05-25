<?php

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
