<?php

function total(array $items): int
{
    $groups = array_fill(1, 5, 0); // Groups of books
    $sets = array_fill(1, 5, 0);   // Sets by size

    // Group the basket
    foreach ($items as $bookId) {
        $groups[$bookId]++;
    }

    // Arrange groups into counts by set size
    while (array_sum($groups) > 0) {
        $setSize = 0;
        foreach ($groups as $key => $count) {
            if ($count > 0) {
                $setSize++;
                $groups[$key]--;
            }
        }
        if ($setSize > 0) {
            $sets[$setSize]++;
        }
    }

    // Replace each 3set+5set with two 4sets
    while ($sets[3] > 0 && $sets[5] > 0) {
        $sets[3]--;
        $sets[5]--;
        $sets[4] += 2;
    }

    // Calculate the total cost
    $cost = 800 * $sets[1] +
        (800 * 2 * 0.95) * $sets[2] +
        (800 * 3 * 0.9) * $sets[3] +
        (800 * 4 * 0.8) * $sets[4] +
        (800 * 5 * 0.75) * $sets[5];

    return (int)$cost;
}
