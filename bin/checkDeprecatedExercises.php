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

$deprecatedExercises = [];
foreach (getExercises() as $exercise) {
    $headerResponse = get_headers("https://github.com/exercism/problem-specifications/blob/main/exercises/{$exercise}/.deprecated")[0];
    if (!str_contains($headerResponse, '200 OK')) {
        continue;
    }

    $deprecatedExercises[] = $exercise;
}

var_dump($deprecatedExercises);

function getExercises(): array
{
    return [
        "annalyns-infiltration",
        "city-office",
        "language-list",
        "lasagna",
        "lucky-numbers",
        "pizza-pi",
        "sweethearts",
        "windowing-system",
        "accumulate",
        "acronym",
        "affine-cipher",
        "allergies",
        "all-your-base",
        "alphametics",
        "anagram",
        "armstrong-numbers",
        "atbash-cipher",
        "bank-account",
        "beer-song",
        "binary",
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
        "minesweeper",
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
        "scale-generator",
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
        "trinary",
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


