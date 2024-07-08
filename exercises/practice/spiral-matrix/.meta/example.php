<?php

declare(strict_types=1);

class SpiralMatrix
{
    public function draw(int $n): array
    {
        // Initialize the matrix with zeros
        $matrix = array_fill(0, $n, array_fill(0, $n, 0));

        // Define boundaries
        $top = 0;
        $bottom = $n - 1;
        $left = 0;
        $right = $n - 1;

        // Define direction (right, down, left, up)
        $direction = 0;

        // Initialize counter
        $counter = 1;

        // Generate the spiral matrix
        while ($top <= $bottom && $left <= $right) {
            if ($direction === 0) {
                // Move from left to right
                for ($i = $left; $i <= $right; ++$i) {
                    $matrix[$top][$i] = $counter++;
                }
                ++$top;
            } elseif ($direction === 1) {
                // Move from top to bottom
                for ($i = $top; $i <= $bottom; ++$i) {
                    $matrix[$i][$right] = $counter++;
                }
                --$right;
            } elseif ($direction === 2) {
                // Move from right to left
                for ($i = $right; $i >= $left; --$i) {
                    $matrix[$bottom][$i] = $counter++;
                }
                --$bottom;
            } elseif ($direction === 3) {
                // Move from bottom to top
                for ($i = $bottom; $i >= $top; --$i) {
                    $matrix[$i][$left] = $counter++;
                }
                ++$left;
            }

            // Update direction
            $direction = ($direction + 1) % 4;
        }

        return $matrix;
    }
}
