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
 * @param array $integers
 * @return array
 */
function vlq_encode(array $integers)
{
    $result = [];

    foreach ($integers as $integer) {
        if ($integer > 0xfffffff) {
            throw new InvalidArgumentException('The value is greater than the maximum allowed.');
        }

        $bytes = [];
        do {
            $byte = 0x7f & $integer;
            array_unshift($bytes, empty($bytes) ? $byte : 0x80 | $byte);
            $integer >>= 7;
        } while ($integer > 0);
        $result = array_merge($result, $bytes);
    }

    return $result;
}

/**
 * @param array $bytes
 * @return array
 */
function vlq_decode(array $bytes)
{
    $result = [];
    $integer = 0;

    foreach ($bytes as $byte) {
        if ($integer > 0xfffffff - 0x7f) {
            throw new OverflowException('The value exceeds the maximum allowed.');
        }

        $integer <<= 7;
        $integer |= 0x7f & $byte;

        if (($byte & 0x80) === 0) {
            $result[] = $integer;
            $integer = 0;
        }
    }

    if (($byte & 0x80) !== 0) {
        throw new InvalidArgumentException('Incomplete byte sequence.');
    }

    return $result;
}
