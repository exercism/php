<?php

declare(strict_types=1);

function format(string $name, int $number): string
{
    return $name
        . ', you are the '
        . toOrdinal($number)
        . ' customer we serve today. Thank you!'
        ;
}

function toOrdinal(int $number): string
{
    if (0 === $number) {
        return '0';
    }

    $ending = 'th';

    if (!in_array(($number % 100), [11, 12, 13])) {
        switch ($number % 10) {
            case 1:
                $ending = 'st';
                break;
            case 2:
                $ending = 'nd';
                break;
            case 3:
                $ending = 'rd';
                break;
        }
    }

    return $number . $ending;
}
