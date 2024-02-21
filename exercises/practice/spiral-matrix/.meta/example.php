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

class SpiralMatrix
{
    public function draw($n): array
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
