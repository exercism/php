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

function maskify(string $cc): string
{
    // Do no mask if cc less than 6 or empty string
    if (strlen($cc) < 6) {
        return $cc;
    }

    $masked = [];
    $ccArr = str_split($cc);
    $length = count($ccArr);

    foreach ($ccArr as $idx => $item) {
        // Exclude first and last four items
        if (0 === $idx || $idx >= $length - 4) {
            $masked[] = $item;
            continue;
        }

        // All non digits
        preg_match('/\D/', $item, $matches);

        if (count($matches) > 0) {
            $masked[] = $item;
            continue;
        }

        $masked[] = '#';
    }

    return implode('', $masked);
}
