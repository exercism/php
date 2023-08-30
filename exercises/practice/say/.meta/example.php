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

function say(int $number): string
{
    if ($number < 0 || $number > 999_999_999_999) {
        throw new \InvalidArgumentException('Input out of range');
    }

    if (0 === $number) {
        return 'zero';
    }

    $out = [];
    $segments = [
        [1_000_000_000, 'billion'],
        [1_000_000, 'million'],
        [1_000, 'thousand'],
        [1, ''],
    ];

    foreach ($segments as $segment) {
        $word = getSegmentWord(intdiv($number, $segment[0]));
        if ($word !== '') {
            $out[] = sprintf('%s %s', $word, $segment[1]);
        }
        $number %= $segment[0];
    }

    return rtrim(implode(' ', $out), ' -');
}

function getSegmentWord(int $number): string
{
    $word = '';

    if ($number >= 100) {
        $word .= getWord(intdiv($number, 100)) . ' hundred ';
        $number %= 100;
    }

    if ($number > 20) {
        return sprintf(
            '%s%s-%s',
            $word,
            getWord(intdiv($number, 10) * 10),
            getWord($number % 10),
        );
    }

    return $word . getWord($number);
}

function getWord(int $number): string
{
    return match ($number) {
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',

        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen',

        10 => 'ten',
        20 => 'twenty',
        30 => 'thirty',
        40 => 'forty',
        50 => 'fifty',
        60 => 'sixty',
        70 => 'seventy',
        80 => 'eighty',
        90 => 'ninety',

        default => '',
    };
}
