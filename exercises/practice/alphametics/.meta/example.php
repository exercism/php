<?php

declare(strict_types=1);

class Alphametics
{
    public function solve(string $puzzle): ?array
    {
        //Remove operators and filter down to just the letters
        $parts = preg_split('/[+|==]/', $puzzle);
        $parts = array_map('trim', $parts);
        $parts = array_filter($parts);

        $firstLetters = [];

        foreach ($parts as $part) {
            $firstLetters[] = substr($part, 0, 1);
        }
        $firstLetters = array_unique($firstLetters);

        $sum = array_pop($parts);
        $counts = $this->getLetterCounts($parts, $sum);

        return $this->runPermutations($counts, $firstLetters);
    }

    //Run through each permutation of values.
    private function runPermutations(array $letterCounts, array $firstLetters, array $numbers = []): ?array
    {
        $letters = array_keys($letterCounts);

        //If the permutation has a value for each letter, test the permutation to see if it is a solution
        if (count($letters) === count($numbers)) {
            return $this->testPermutation($letterCounts, $numbers);
        }
        $possibleValues = [0,1,2,3,4,5,6,7,8,9];

        foreach ($possibleValues as $value) {
            //Setup possible values without duplicates and not using 0 as first letter value
            if (in_array($value, $numbers) || ($value === 0 && in_array($letters[count($numbers)], $firstLetters))) {
                continue;
            }

            //Add the number to the possible permutation and run function again.
            //Ex. with 3 unique letters
            // 1st run: $numbers = []
            // 2nd run: $numbers = [1]
            // 3rd run: $numbers = [1,2]
            // 4th run: $numbers = [1,2,3] -> testPermutation
            $result = $this->runPermutations($letterCounts, $firstLetters, [...$numbers, $value]);

            if ($result) {
                return $result;
            }
        }

        return null;
    }

    //Test the permutation when each letter has a potential value
    private function testPermutation(array $letterCounts, array $numbers): ?array
    {
        $letters = array_keys($letterCounts);
        $counts = array_values($letterCounts);

        $i = 0;

        $isSolved = array_reduce($counts, function ($sum, $count) use ($numbers, &$i) {
                $return = $sum + $count * $numbers[$i];
                $i++;
                return $return;
        }, 0) == 0;

        if (!$isSolved) {
            return null;
        }

        $result = [];

        foreach ($letters as $key => $letter) {
            $result[$letter] = $numbers[$key];
        }

        return $result;
    }

    private function getLetterCounts(array $addends, string $sum): array
    {
        $counts = [];

        foreach ($addends as $addend) {
            $addendParts = str_split($addend);

            foreach ($addendParts as $i => $letter) {
                $counts[$letter] = ($counts[$letter] ?? 0) + 10 ** (count($addendParts) - 1 - $i);
            }
        }

        $sumParts = str_split($sum);
        foreach ($sumParts as $i => $letter) {
            $counts[$letter] = ($counts[$letter] ?? 0) - 10 ** (count($sumParts) - 1 - $i);
        }

        return $counts;
    }
}
