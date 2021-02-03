<?php

function nucleotideCount($dna)
{
    $nucleotides = [];
    if (strlen($dna) > 0) {
        $nucleotides = str_split($dna);
    }
    $count = array_reduce($nucleotides, function ($count, $nucleotide) {
        if (! in_array(strtolower($nucleotide), ['a', 'c', 'g', 't'])) {
            throw new InvalidArgumentException(sprintf('The nucleotide %s does not exist in DNA', $nucleotide));
        }
        $count[strtolower($nucleotide)]++;

        return $count;
    }, [
        'a' => 0,
        'c' => 0,
        't' => 0,
        'g' => 0,
    ]);

    return $count;
}
