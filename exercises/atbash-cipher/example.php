<?php

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
