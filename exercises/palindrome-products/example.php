<?php

function generatePalindromeProducts($min, $max)
{
    $palindromes = [];
    foreach (range($min, $max) as $x) {
        foreach (range($min, $max) as $y) {
            $n = $x*$y;
            if (isPalindrome($n)) {
                $palindromes[] = $n;
            }
        }
    }
    sort($palindromes);
    return $palindromes;
}

function smallest($min, $max)
{
    validate($min, $max);
    $palindromes = generatePalindromeProducts($min, $max);
    if (empty($palindromes)) {
        throw new \Exception;
    }
    $r = array_shift($palindromes);
    return [$r, factorize($r, range($min, $max))];
}

function largest($min, $max)
{
    validate($min, $max);
    $palindromes = generatePalindromeProducts($min, $max);
    if (empty($palindromes)) {
        throw new \Exception;
    }
    $r = array_pop($palindromes);
    return [$r, factorize($r, range($min, $max))];
}

function validate($min, $max)
{
    if ($max <= $min) {
        throw new \Exception;
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
        if ($n % $x === 0
            && in_array($n/$x, $factorRange)
            && !in_array([$n/$x, $x], $factors)
        ) {
            $factors[] = [$x, $n/$x];
        }
    }
    return $factors;
}
