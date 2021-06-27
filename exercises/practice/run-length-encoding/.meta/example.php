<?php

declare(strict_types=1);

/**
 * @param string $input
 * @return string
 */
function encode($input)
{
    if (!$input) {
        return '';
    }

    $output = '';
    $prev = $letter = null;
    $count = 1;

    foreach (str_split($input) as $letter) {
        if ($letter === $prev) {
            $count++;
        } else {
            if ($count > 1) {
                $output .= $count;
            }
            $output .= $prev;
            $count = 1;
        }

        $prev = $letter;
    }

    if ($count > 1) {
        $output .= $count;
    }
    $output .= $letter;

    return $output;
}

/**
 * @param string $input
 * @return string
 */
function decode($input)
{
    $output = '';
    preg_match_all('/([1-9]*)(\w|\s)/', $input, $matches);

    $length = count($matches[0]);
    for ($i = 0; $i < $length; $i++) {
        $count = $matches[1][$i];
        if ($count === '') {
            $count = 1;
        }
        $letter = $matches[2][$i];

        $output .= str_repeat($letter, (int) $count);
    }

    return $output;
}
