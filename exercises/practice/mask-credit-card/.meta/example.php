<?php

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
        preg_match('/[^0-9]/', $item, $matches);

        if (count($matches) > 0) {
            $masked[] = $item;
            continue;
        }

        array_push($masked, '#');
    }

    return implode('', $masked);
}
