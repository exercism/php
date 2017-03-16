<?php

function isValid($candidate)
{
    $sanitizedCandidate = str_replace(" ", "", $candidate) ;

    if (strlen($sanitizedCandidate) <= 1 || !ctype_digit($sanitizedCandidate)) {
        return false ;
    }

    $reversseCandidate = strrev($sanitizedCandidate) ;
    $sum = 0 ;

    for ($i = 1; $i < strlen($reversseCandidate); $i+=2) {
        $digit = 2 * intval($reversseCandidate{$i}) ;

        if ($digit > 9) {
            $digit -= 9 ;
        }

        $sum += $digit ;
        $sum += intval($reversseCandidate{$i-1}) ;
    }

    return $sum % 10 == 0 ;
}
