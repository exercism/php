<?php

class Form
{
    function blanks(int $length): string
    {
        return str_repeat(" ", $length);
    }

    function letters(string $word): array
    {
        return mb_str_split($word);
    }

    function checkLength(string $word, int $max_length): bool
    {
        $difference = mb_strlen($word) - $max_length;
        return $difference <= 0;
    }

    function formatAddress(Address $address): string
    {
        $formatted_street = mb_strtoupper($address->street);
        $formatted_postal_code = mb_strtoupper($address->postal_code);
        $formatted_city = mb_strtoupper($address->city);

        return <<<FORMATTED_ADDRESS
            $formatted_street
            $formatted_postal_code $formatted_city
            FORMATTED_ADDRESS;
    }
}
