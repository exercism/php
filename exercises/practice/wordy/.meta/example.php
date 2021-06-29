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

function calculate($question = "")
{
    preg_match(
        "/What is (-?\d+) (plus|minus|multiplied by|divided by) "
        . "(-?\d+)(?: (plus|minus|multiplied by|divided by) (-?\d+))?\?/",
        $question,
        $matches
    );

    if (empty($matches[2])) {
        throw new InvalidArgumentException();
    }

    switch ($matches[2]) {
        case 'plus':
            $number = $matches[1] + $matches[3];
            break;
        case 'minus':
            $number = $matches[1] - $matches[3];
            break;
        case 'multiplied by':
            $number = $matches[1] * $matches[3];
            break;
        case 'divided by':
            $number = $matches[1] / $matches[3];
            break;
        default:
            $number = 0;
    }

    if (isset($matches[4]) && isset($matches[5])) {
        switch ($matches[4]) {
            case 'plus':
                $number += $matches[5];
                break;
            case 'minus':
                $number -= $matches[5];
                break;
            case 'multiplied by':
                $number *= $matches[5];
                break;
            case 'divided by':
                $number /= $matches[5];
                break;
        }
    }

    return $number;
}
