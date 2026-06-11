<?php

declare(strict_types=1);

class SaddlePoints
{
    public function saddlePoints(array $matrix): array
    {
        if (empty($matrix[0])) {
            return [];
        }

        $trees = [];
        $maxs  = array_map('max', array_map(null, $matrix));

        if (count($matrix) > 1) {
            $mins = array_map('min', array_map(null, ...$matrix));
        } else {
            $mins = $matrix[0];
        }

        for ($ridx = 0; $ridx < count($matrix); $ridx++) {
            for ($cidx = 0; $cidx < count($matrix[$ridx]); $cidx++) {
                if ($maxs[$ridx] === $mins[$cidx]) {
                    array_push($trees, [
                        'row'    => $ridx + 1,
                        'column' => $cidx + 1
                    ]);
                }
            }
        }

        return $trees;
    }
}
