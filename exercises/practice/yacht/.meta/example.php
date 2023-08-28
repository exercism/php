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

class Yacht
{
    public function score(array $rolls, string $category): int
    {
        sort($rolls);

        switch ($category) {
            case 'ones':
                return $this->number($rolls, 1);
            case 'twos':
                return $this->number($rolls, 2);
            case 'threes':
                return $this->number($rolls, 3);
            case 'fours':
                return $this->number($rolls, 4);
            case 'fives':
                return $this->number($rolls, 5);
            case 'sixes':
                return $this->number($rolls, 6);
            case 'full house':
                return $this->fullHouse($rolls);
            case 'four of a kind':
                return $this->fourKind($rolls);
            case 'little straight':
                return $this->littleStraight($rolls);
            case 'big straight':
                return $this->bigStraight($rolls);
            case 'choice':
                return $this->choice($rolls);
            case 'yacht':
                return $this->scoreYacht($rolls);
        }
    }

    private function number(array $rolls, int $number)
    {
        $totals = array_count_values($rolls);

        if (array_key_exists($number, $totals)) {
            return $number * $totals[$number];
        }

        return 0;
    }

    private function fullHouse(array $rolls)
    {
        $totals = array_count_values($rolls);

        if (count($totals) === 2 && !in_array(4, $totals)) {
            return $this->choice($rolls);
        }

        return 0;
    }

    private function fourKind(array $rolls)
    {
        $totals = array_count_values($rolls);

        foreach ($totals as $roll => $times) {
            if ($times >= 4) {
                return $roll * 4;
            }
        }

        return 0;
    }

    private function littleStraight(array $rolls): int
    {
        return $rolls === [1, 2, 3, 4, 5] ? 30 : 0;
    }

    private function bigStraight(array $rolls): int
    {
        return $rolls === [2, 3, 4, 5, 6] ? 30 : 0;
    }

    private function choice(array $rolls): int
    {
        return array_sum($rolls);
    }

    private function scoreYacht(array $rolls): int
    {
        if (array_unique($rolls) === [current($rolls)]) {
            return 50;
        }

        return 0;
    }
}
