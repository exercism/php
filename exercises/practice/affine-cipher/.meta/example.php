<?php

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
