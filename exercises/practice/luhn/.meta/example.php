<?php

declare(strict_types=1);

function isValid(string $candidate): bool
{
    $sanitizedCandidate = str_replace(" ", "", $candidate);

    if (strlen($sanitizedCandidate) <= 1 || !ctype_digit($sanitizedCandidate)) {
        return false;
    }

    $reverseCandidate = strrev($sanitizedCandidate);
    $sum = 0;

    for ($i = 0; $i < strlen($reverseCandidate); $i++) {
        $digit = intval($reverseCandidate[$i]);

        // Double every second digit starting from the second position
        if ($i % 2 != 0) {
            $digit *= 2;

            if ($digit > 9) {
                $digit -= 9;
            }
        }

        $sum += $digit;
    }

    return $sum % 10 === 0;
}
