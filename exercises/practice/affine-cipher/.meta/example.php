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

function encode($text, $a, $b)
{
    $alphabet = range('a', 'z');
    coprimeCheck($a);
    $cipherbet = generateCipherbet($a, $b, $alphabet);

    $cipher = clean($text);
    $cipher = strtr($cipher, array_combine($alphabet, $cipherbet));
    $cipher = str_split($cipher, 5);
    return implode(' ', $cipher);
}

function decode($text, $a, $b)
{
    $alphabet = range('a', 'z');
    coprimeCheck($a);
    $cipherbet = generateCipherbet($a, $b, $alphabet);
    $clear = '';
    $clear = clean($text);
    return strtr($clear, array_combine($cipherbet, $alphabet));
}

function generateCipherbet($a, $b, $alphabet)
{
    return array_map(
        function ($l) use ($a, $b, $alphabet) {
            return $alphabet[($a * array_search($l, $alphabet) + $b) % 26];
        },
        $alphabet
    );
}

function coprimeCheck($a)
{
    if (gmp_intval(gmp_gcd($a, 26)) !== 1) {
        throw new Exception();
    }
}

function clean($str)
{
    return strtolower(preg_replace('/[^0-9a-z]/mi', '', $str));
}
