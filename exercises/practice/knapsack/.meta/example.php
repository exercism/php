<?php

declare(strict_types=1);

class Knapsack
{
    public function getMaximumValue(int $maximumWeight, array $items): int
    {
        $table = array_fill(0, count($items) + 1, array_fill(0, $maximumWeight + 1, 0));

        for ($i = 0, $iMax = count($items); $i < $iMax; $i++) {
            for ($capacity = 1; $capacity < $maximumWeight + 1; $capacity++) {
                $value = $items[$i]['value'];
                $weight = $items[$i]['weight'];
                if ($weight > $capacity) {
                    $table[$i + 1][$capacity] = $table[$i][$capacity];
                } else {
                    $table[$i + 1][$capacity] = max(
                        $table[$i][$capacity],
                        $value + $table[$i][$capacity - $weight]
                    );
                }
            }
        }

        return $table[count($items)][$maximumWeight];
    }
}
