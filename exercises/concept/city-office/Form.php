<?php

class Form
{
    function blanks($length)
    {
        return str_repeat(" ", $length);
    }

    function letters($word)
    {
        return mb_str_split($word);
    }

    function checkLength($word, $max_length)
    {
        $difference = mb_strlen($word) - $max_length;
        return $difference <= 0;
    }

    function formatAddress($address)
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
