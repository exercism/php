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

class ZebraPuzzle
{
    private $waterDrinker = '';
    private $zebraOwner = '';

    private const FIRST = 1;
    private const MIDDLE = 3;

    private $red = 0;
    private $green = 0;
    private $ivory = 0;
    private $yellow = 0;
    private $blue = 0;

    private $englishman = 0;
    private $spaniard = 0;
    private $ukrainian = 0;
    private $japanese = 0;
    private $norwegian = 0;

    private $coffee = 0;
    private $tea = 0;
    private $milk = 0;
    private $orangeJuice = 0;
    private $water = 0;

    private $oldGold = 0;
    private $kools = 0;
    private $chesterfields = 0;
    private $luckyStrike = 0;
    private $parliaments = 0;

    private $dog = 0;
    private $snails = 0;
    private $fox = 0;
    private $horse = 0;
    private $zebra = 0;

    private $nationalityNames = [];

    private $possiblePermutations;

    public function __construct()
    {
        $this->possiblePermutations = $this->permuteValues([1, 2, 3, 4, 5]);
        $this->solve();
    }

    public function waterDrinker(): string
    {
        return $this->waterDrinker;
    }

    public function zebraOwner(): string
    {
        return $this->zebraOwner;
    }

    private function permuteValues(array $array): array
    {
        $result = [];

        $length = count($array);

        if ($length === 0) {
            return [[]];
        }

        foreach ($array as $index => $Value) {
            $rest = $this->permuteValues(array_merge(array_slice($array, 0, $index), array_slice($array, $index + 1)));

            if (empty($rest)) {
                $result[] = [$Value];
            } else {
                foreach ($rest as $r) {
                    $result[] = array_merge([$Value], $r);
                }
            }
        }

        return $result;
    }

    private function isRightOf($houseA, $houseB): bool
    {
        return $houseA - 1 === $houseB;
    }

    private function nextTo($houseA, $houseB): bool
    {
        return $this->isRightOf($houseA, $houseB) || $this->isRightOf($houseB, $houseA);
    }

    private function solve(): void
    {
        foreach ($this->possiblePermutations as $permutation) {
            $this->solveHouseColors($permutation);
        }
    }

    private function solveHouseColors($permutation): void
    {
        $this->red = $permutation[0];
        $this->green = $permutation[1];
        $this->ivory = $permutation[2];
        $this->yellow = $permutation[3];
        $this->blue = $permutation[4];

        if ($this->isRightOf($this->green, $this->ivory)) {     // Clue #6
            foreach ($this->possiblePermutations as $perm) {
                $this->solveNationalities($perm);
            }
        }
    }

    private function solveNationalities($permutation): void
    {
        $this->englishman = $permutation[0];
        $this->spaniard = $permutation[1];
        $this->ukrainian = $permutation[2];
        $this->japanese = $permutation[3];
        $this->norwegian = $permutation[4];

        if (
            $this->red === $this->englishman &&             // Clue #2
            $this->norwegian === self::FIRST &&             // Clue #10
            $this->nextTo($this->norwegian, $this->blue)    // Clue #15
        ) {
            $this->nationalityNames[$this->englishman] = 'Englishman';
            $this->nationalityNames[$this->spaniard] = 'Spaniard';
            $this->nationalityNames[$this->ukrainian] = 'Ukrainian';
            $this->nationalityNames[$this->japanese] = 'Japanese';
            $this->nationalityNames[$this->norwegian] = 'Norwegian';

            foreach ($this->possiblePermutations as $perm) {
                $this->solveBeverages($perm);
            }
        }
    }

    private function solveBeverages($permutation): void
    {
        $this->coffee = $permutation[0];
        $this->tea = $permutation[1];
        $this->milk = $permutation[2];
        $this->orangeJuice = $permutation[3];
        $this->water = $permutation[4];

        if (
            $this->coffee === $this->green &&       // Clue #4
            $this->ukrainian === $this->tea &&      // Clue #5
            $this->milk === self::MIDDLE            // Clue #9
        ) {
            foreach ($this->possiblePermutations as $perm) {
                $this->solveCigars($perm);
            }
        }
    }

    private function solveCigars($permutation): void
    {
        $this->oldGold = $permutation[0];
        $this->kools = $permutation[1];
        $this->chesterfields = $permutation[2];
        $this->luckyStrike = $permutation[3];
        $this->parliaments = $permutation[4];

        if (
            $this->kools === $this->yellow &&               // Clue #8
            $this->luckyStrike === $this->orangeJuice &&    // Clue #13
            $this->japanese === $this->parliaments          // Clue #14
        ) {
            foreach ($this->possiblePermutations as $perm) {
                $this->solvePets($perm);
            }
        }
    }

    private function solvePets($permutation): void
    {
        $this->dog = $permutation[0];
        $this->snails = $permutation[1];
        $this->fox = $permutation[2];
        $this->horse = $permutation[3];
        $this->zebra = $permutation[4];

        if (
            $this->spaniard === $this->dog &&                   // Clue #3
            $this->oldGold === $this->snails &&                 // Clue #7
            $this->nextTo($this->chesterfields, $this->fox) &&  // Clue #11
            $this->nextTo($this->kools, $this->horse)           // Clue #12
        ) {
            $this->waterDrinker = $this->nationalityNames[$this->water];
            $this->zebraOwner = $this->nationalityNames[$this->zebra];
        }
    }
}
