<?php

declare(strict_types=1);

class KillerSudokuHelper
{
    public function combinations(int $sum, int $size, array $exclude): array
    {
        $candidates = array_filter(range(1, min($sum, 9)), static function ($i) use ($exclude) {
            return !in_array($i, $exclude, true);
        });

        $result = [];
        foreach ($this->combinationsHelper([], $candidates, $sum, $size) as $combo) {
            $result[] = $combo;
        }

        return $result;
    }

    private function combinationsHelper(array $prefix, array $candidates, int $target, int $size): array
    {
        if ($size === 0) {
            return $target === 0 ? [$prefix] : [];
        }

        $result = [];
        foreach ($candidates as $index => $candidate) {
            if ($candidate > $target) {
                break;
            }
            $remaining = array_slice($candidates, $index + 1);
            foreach ($this->combinationsHelper(array_merge($prefix, [$candidate]), $remaining, $target - $candidate, $size - 1) as $combo) {
                $result[] = $combo;
            }
        }

        return $result;
    }
}
