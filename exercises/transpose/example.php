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
    $result = [];
    if (!empty($text)) {
        $lines = (strpos($text, "\n") !== false ? explode("\n", $text) : [$text]);
        foreach ($lines as $lineNumber => $line) {
            $characters = str_split($line);
            array_walk_recursive(
                $characters,
                function ($character, $key) use (&$result, $lineNumber) {
                    $defaultValue = str_pad($character, $lineNumber + 1, " ", STR_PAD_LEFT);
                    if (isset($result[$key])) {
                        $defaultValue = $result[$key] . $character;
                    }
                    $result[$key] = $defaultValue;
                }
            );
        }
    }
    return implode($result, "\n");
}
