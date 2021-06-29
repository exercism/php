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
