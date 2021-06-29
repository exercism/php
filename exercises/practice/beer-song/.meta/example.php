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

class BeerSong
{
    public function verse($number): string
    {
        $decrement = $number - 1;
        switch ($number) {
            case 0:
                return "No more bottles of beer on the wall, no more bottles of beer.\n" .
                    "Go to the store and buy some more, 99 bottles of beer on the wall.";
            case 1:
                return "1 bottle of beer on the wall, 1 bottle of beer.\n" .
                    "Take it down and pass it around, no more bottles of beer on the wall.\n";
            case 2:
                return "2 bottles of beer on the wall, 2 bottles of beer.\n" .
                    "Take one down and pass it around, 1 bottle of beer on the wall.\n";
            default:
                return "{$number} bottles of beer on the wall, {$number} bottles of beer.\n" .
                    "Take one down and pass it around, {$decrement} bottles of beer on the wall.\n";
        }
    }

    public function verses($start, $finish): string
    {
        $output = '';
        foreach (range($start, $finish) as $number) {
            $output .= $this->verse($number);
            if ($number > $finish) {
                $output .= "\n";
            }
        }

        return $output;
    }

    public function lyrics(): string
    {
        return $this->verses(99, 0);
    }
}
