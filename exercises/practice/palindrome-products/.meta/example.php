<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

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
