<?php

declare(strict_types=1);

function buildNeighborhood(array $familyTree): array
{
    $neighbors = [];

    foreach ($familyTree as $parent => $children) {
        foreach ($children as $child) {
            $neighbors[$parent][$child] = true;
            $neighbors[$child][$parent] = true;
        }

        for ($i = 0; $i < count($children); $i++) {
            for ($j = $i + 1; $j < count($children); $j++) {
                $neighbors[$children[$i]][$children[$j]] = true;
                $neighbors[$children[$j]][$children[$i]] = true;
            }
        }
    }

    return $neighbors;
}

function degreeOfSeparation(array $familyTree, string $personA, string $personB): int
{
    $neighbors = buildNeighborhood($familyTree);

    if (!isset($neighbors[$personA], $neighbors[$personB])) {
        return -1;
    }

    $seen  = [$personA => true];
    $queue = [[$personA, 0]];

    while ($queue) {
        [$person, $degree] = array_shift($queue);

        if ($person === $personB) {
            return $degree;
        }

        foreach (array_keys($neighbors[$person]) as $next) {
            if (!isset($seen[$next])) {
                $seen[$next]  = true;
                $queue[] = [$next, $degree + 1];
            }
        }
    }

    return -1;
}
