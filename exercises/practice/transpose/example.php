<?php
/**
 * Transpose multi line text into Rows become columns and columns become rows.
 * Eg: http://en.wikipedia.org/wiki/Transpose
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
