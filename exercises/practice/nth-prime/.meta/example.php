<?php

declare(strict_types=1);

function prime($count)
{
    if ($count < 1) {
        throw new Exception('there is no zeroth prime');
    }
    $primes = [];
    $i = 2;
    while (count($primes) < $count) {
        foreach ($primes as $prime) {
            if ($i % $prime == 0) {
                $i++;
                continue 2;
            }
        }
        $primes[] = $i++;
    }
    return end($primes);
}
