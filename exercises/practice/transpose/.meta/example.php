<?php

declare(strict_types=1);

/**
 * Transpose multi line text into Rows become columns and columns become rows.
 * Eg: https://en.wikipedia.org/wiki/Transpose
 *
 * @param String $text - Multi-line input
 *
 * @return string
 */
function transpose($text)
{
    $pad = function ($lines) {
        for ($i = count($lines) - 2; $i >= 0; $i--) {
            $lines[$i] = str_pad($lines[$i], strlen($lines[$i + 1]), ' ', STR_PAD_RIGHT);
        }

        return $lines;
    };

    if ($text === ['']) {
        return $text;
    }

    $lines = $pad($text);

    $result = [];

    foreach ($lines as $lineNumber => $line) {
        $characters = str_split($line);
        foreach ($characters as $index => $character) {
            if (isset($result[$index])) {
                $result[$index] .= $character;
            } else {
                $result[$index] = $character;
            }
        }
    }

    $trimLastLine = function ($lines) {
        $lastLine = array_pop($lines);
        $lines[] = rtrim($lastLine);
        return $lines;
    };

    return $trimLastLine($result);
}
