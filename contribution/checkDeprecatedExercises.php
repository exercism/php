#!/usr/bin/env php
<?php

declare(strict_types=1);

$deprecatedExercises = [];
foreach (getExercises() as $exercise) {
    $headerResponse = get_headers("https://github.com/exercism/problem-specifications/blob/main/exercises/{$exercise}/.deprecated")[0];
    if (!str_contains($headerResponse, '200 OK')) {
        continue;
    }

    $deprecatedExercises[] = $exercise;
}

var_dump($deprecatedExercises);

echo 'The exercises listed should be deprecated in "config.json" and then removed from this script.' . PHP_EOL;

function getExercises(): array
{
    return [
        "acronym",
        "affine-cipher",
        "allergies",
        "all-your-base",
        "alphametics",
        "anagram",
        "armstrong-numbers",
        "atbash-cipher",
        "bank-account",
        "binary-search",
        "binary-search-tree",
        "bob",
        "book-store",
        "bowling",
        "change",
        "circular-buffer",
        "clock",
        "collatz-conjecture",
        "connect",
        "crypto-square",
        "custom-set",
        "darts",
        "diamond",
        "difference-of-squares",
        "dnd-character",
        "eliuds-eggs",
        "etl",
        "flatten-array",
        "flower-field",
        "food-chain",
        "gigasecond",
        "grade-school",
        "grains",
        "hamming",
        "hello-world",
        "high-scores",
        "house",
        "isbn-verifier",
        "isogram",
        "killer-sudoku-helper",
        "kindergarten-garden",
        "knapsack",
        "largest-series-product",
        "leap",
        "linked-list",
        "list-ops",
        "luhn",
        "markdown",
        "mask-credit-card",
        "matching-brackets",
        "matrix",
        "meetup",
        "micro-blog",
        "nth-prime",
        "nucleotide-count",
        "ocr-numbers",
        "ordinal-number",
        "palindrome-products",
        "pangram",
        "parallel-letter-frequency",
        "pascals-triangle",
        "perfect-numbers",
        "phone-number",
        "pig-latin",
        "poker",
        "prime-factors",
        "protein-translation",
        "proverb",
        "queen-attack",
        "rail-fence-cipher",
        "raindrops",
        "resistor-color",
        "resistor-color-duo",
        "resistor-color-trio",
        "reverse-string",
        "rna-transcription",
        "robot-name",
        "robot-simulator",
        "roman-numerals",
        "rotational-cipher",
        "run-length-encoding",
        "say",
        "scrabble-score",
        "secret-handshake",
        "series",
        "sieve",
        "simple-cipher",
        "space-age",
        "spiral-matrix",
        "state-of-tic-tac-toe",
        "strain",
        "sublist",
        "sum-of-multiples",
        "tournament",
        "transpose",
        "triangle",
        "twelve-days",
        "two-bucket",
        "two-fer",
        "variable-length-quantity",
        "word-count",
        "wordy",
        "yacht",
        "zebra-puzzle",
    ];
}


