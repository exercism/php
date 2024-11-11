<?php

declare(strict_types=1);

function encode($string)
{
    $a_z = range('a', 'z');
    $z_a = range('z', 'a');
    $string = preg_replace("/[^a-z0-9]+/", "", strtolower($string));
    $len = strlen($string);

    $count = 0;
    $encoded = [];
    foreach (str_split($string) as $char) {
        $count++;
        if (is_numeric($char)) {
            $encoded[] = $char;
        }
        if (ctype_lower($char)) {
            $encoded[] = $z_a[array_search($char, $a_z)];
        }
        if ($count % 5 == 0 && $count < $len) {
            $encoded[] = ' ';
        }
    }

    return implode('', $encoded);
}

function decode($string)
{
    $a_z = range('a', 'z');
    $z_a = range('z', 'a');

    $encodedString = str_replace(' ', '', $string);

    $decoded = [];
    foreach (str_split($encodedString) as $char) {
        // Check if the character is numeric
        if ($char >= '0' && $char <= '9') {
            $decoded[] = $char;
        } elseif ($char >= 'a' && $char <= 'z') {
            // Map it from z_a back to a_z
            $decoded[] = $a_z[array_search($char, $z_a)];
        }
    }

    return implode('', $decoded);
}
