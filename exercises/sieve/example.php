<?php

function sieve($limit)
{
    $primes = [];

    for ($i = 0; $i <= $limit; $i++) {
        if (gmp_prob_prime($i) === 2) {
            $primes[] = $i;
        }
    }

    return $primes;
}
