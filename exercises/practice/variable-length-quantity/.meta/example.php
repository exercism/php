<?php

declare(strict_types=1);

function vlq_encode(array $integers): array
{
    $result = [];

    foreach ($integers as $integer) {
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

function vlq_decode(array $bytes): array
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
        throw new InvalidArgumentException('Error: incomplete sequence.');
    }

    return $result;
}
