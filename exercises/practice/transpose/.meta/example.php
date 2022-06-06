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
    $findMaxLength = function ($lines) {
        return array_reduce($lines, function ($max, $line) {
            return max($max, strlen($line));
        }, 0);
    };

    $pad = function ($lines, $length) {
        return array_map(function ($line) use ($length) {
            return str_pad($line, $length, ' ', STR_PAD_RIGHT);
        }, $lines);
    };

    if ($text === ['']) {
        return $text;
    }

    $maxLength = $findMaxLength($text);

    $lines = $pad($text, $maxLength);

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
