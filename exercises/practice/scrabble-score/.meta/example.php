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

function score($word)
{
    if (strlen($word) === 0 || $word === ' ') {
        return 0;
    }

    $scrabbleScore = [
        'a' => 1, 'b' => 3, 'c' => 3, 'd' => 2,
        'e' => 1, 'f' => 4, 'g' => 2, 'h' => 4,
        'i' => 1, 'j' => 8, 'k' => 5, 'l' => 1,
        'm' => 3, 'n' => 1, 'o' => 1, 'p' => 3,
        'q' => 10, 'r' => 1, 's' => 1, 't' => 1,
        'u' => 1, 'v' => 4, 'w' => 4, 'x' => 8,
        'y' => 4, 'z' => 10,
    ];

    $score = 0;
    $letters = str_split(strtolower($word));

    foreach ($letters as $letter) {
        $score += $scrabbleScore[$letter];
    }

    return $score;
}
