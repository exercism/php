<?php

declare(strict_types=1);

function generatePalindromeProduct(array $range): ?int
{
    $palindromes = [];

    foreach ($range as $x) {
        foreach (range($x, array_reverse($range)[0]) as $y) {
            $product = $x * $y;
            if (isPalindrome($product)) {
                $palindromes[] = $product;
                if (count($palindromes) > 2) {
                    ($range[0] > $range[1]) ? rsort($palindromes) : sort($palindromes);
                    return array_shift($palindromes);
                }
            }
        }
    }

    return null;
}

function smallest(int $min, int $max): array
{
    validate($min, $max);
    $product = generatePalindromeProduct(range($min, $max));
    if ($product === null) {
        throw new Exception();
    }
    return [$product, factorize($product, range($min, $max))];
}

function largest(int $min, int $max): array
{
    validate($min, $max);
    $product = generatePalindromeProduct(range($max, $min));
    if ($product === null) {
        throw new Exception();
    }
    return [$product, factorize($product, range($min, $max))];
}

function validate(int $min, int $max): void
{
    if ($max <= $min) {
        throw new Exception();
    }
}

function isPalindrome(int $number): bool
{
    return "$number" === strrev("$number");
}

function factorize(int $number, array $range): array
{
    $factors = [];

    foreach ($range as $x) {
        if (
            $number % $x === 0
            && in_array($number / $x, $range)
            && !in_array([$number / $x, $x], $factors)
        ) {
            $factors[] = [$x, $number / $x];
        }
    }

    return $factors;
}
