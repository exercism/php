<?php

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
