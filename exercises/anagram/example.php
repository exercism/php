<?php

function detectAnagrams($anagram, array $possibleMatches)
{
    $matches = [];

    foreach ($possibleMatches as $possibleMatch) {
        $anagramLetters = str_split(mb_strtolower($anagram));
        $matchLetters = str_split(mb_strtolower($possibleMatch));

        if (count($anagramLetters) === count($matchLetters) and $anagramLetters !== $matchLetters) {
            foreach ($matchLetters as $character) {
                $index = array_search($character, $anagramLetters);

                if ($index !== false) {
                    unset($anagramLetters[$index]);
                }

                if (empty($anagramLetters)) {
                    $matches[] = $possibleMatch;
                }
            }
        }
    }

    return $matches;
}
