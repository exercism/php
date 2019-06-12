<?php
function prime($count)
{
    if ($count < 1) {
        return false;
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
