<?php

declare(strict_types=1);

function nucleotideCount(string $input): array
{
    $result = [
        'A' => 0,
        'C' => 0,
        'T' => 0,
        'G' => 0
    ];

    foreach (str_split($input) as $char) {
        $key = strtoupper($char);
        if (!array_key_exists($key, $result)) {
            throw new \RuntimeException('Input contains invalid character.');
        }
        $result[$key]++;
    }
    return $result;
}
