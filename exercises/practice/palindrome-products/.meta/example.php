<?php

function generatePalindromeProducts($range)
{
    $palindromes = [];
    foreach ($range as $x) {
        foreach (range($x, array_reverse($range)[0]) as $y) {
            $n = $x * $y;
            if (isPalindrome($n)) {
                $palindromes[] = $n;
                if (count($palindromes) > 2) {
                    ($range[0] > $range[1]) ? rsort($palindromes) : sort($palindromes);
                    return array_shift($palindromes);
                }
            }
        }
    }

    return null;
}

function smallest($min, $max)
{
    validate($min, $max);
    $r = generatePalindromeProducts(range($min, $max));
    if (empty($r)) {
        throw new Exception();
    }
    return [$r, factorize($r, range($min, $max))];
}

function largest($min, $max)
{
    validate($min, $max);
    $r = generatePalindromeProducts(range($max, $min));
    if (empty($r)) {
        throw new Exception();
    }
    return [$r, factorize($r, range($min, $max))];
}

function validate($min, $max)
{
    if ($max <= $min) {
        throw new Exception();
    }
}

function isPalindrome($n)
{
    return "$n" === strrev("$n");
}

function factorize($n, $factorRange)
{
    $factors = [];
    foreach ($factorRange as $x) {
        if (
            $n % $x === 0
            && in_array($n / $x, $factorRange)
            && !in_array([$n / $x, $x], $factors)
        ) {
            $factors[] = [$x, $n / $x];
        }
    }
    return $factors;
}
