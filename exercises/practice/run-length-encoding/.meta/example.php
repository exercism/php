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
