<?php

declare(strict_types=1);

class IsbnVerifier
{
    public function isValid(string $isbn): bool
    {
        $isbn = str_replace("-", "", $isbn);
        if (strlen($isbn) !== 10) {
            return false;
        }

        $i = 10;
        $isbnSum = 0;

        if ($isbn[strlen($isbn) - 1] === 'X') {
            $isbnSum = 10;
            $isbn = substr($isbn, 0, -1);
        }

        if (!is_numeric($isbn)) {
            return false;
        }

        for ($j = 0, $jMax = strlen($isbn); $j < $jMax; $j++) {
            $intV = (int) $isbn[$j];
            $isbnSum += $i * $intV;
            $i--;
        }

        return $isbnSum % 11 === 0;
    }
}
