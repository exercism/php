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

class TwelveDays
{
    public function recite(int $start, int $end): string
    {
        $section = '';

        for ($i = $start; $i <= $end; $i++) {
            $section = sprintf('%s%s%s', $section, $this->getLyrics($i), PHP_EOL);
        }

        return rtrim($section, PHP_EOL);
    }

    private function getLyrics(int $verse): string
    {
        switch ($verse) {
            case 1:
                return "On the first day of Christmas my true love gave to me: a Partridge in a Pear Tree.";
            case 2:
                return
                    "On the second day of Christmas my true love gave to me: two Turtle Doves, " .
                    "and a Partridge in a Pear Tree.";
            case 3:
                return
                    "On the third day of Christmas my true love gave to me: three French Hens, " .
                    "two Turtle Doves, and a Partridge in a Pear Tree.";
            case 4:
                return
                    "On the fourth day of Christmas my true love gave to me: four Calling Birds, " .
                    "three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
            case 5:
                return
                    "On the fifth day of Christmas my true love gave to me: five Gold Rings, four Calling Birds," .
                    " three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
            case 6:
                return
                    "On the sixth day of Christmas my true love gave to me: six Geese-a-Laying, five Gold Rings, " .
                    "four Calling Birds, three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
            case 7:
                return
                    "On the seventh day of Christmas my true love gave to me: seven Swans-a-Swimming, " .
                    "six Geese-a-Laying, five Gold Rings, four Calling Birds, three French Hens, two Turtle Doves, " .
                    "and a Partridge in a Pear Tree.";
            case 8:
                return
                    "On the eighth day of Christmas my true love gave to me: eight Maids-a-Milking, " .
                    "seven Swans-a-Swimming, six Geese-a-Laying, five Gold Rings, four Calling Birds, " .
                    "three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
            case 9:
                return
                    "On the ninth day of Christmas my true love gave to me: nine Ladies Dancing, " .
                    "eight Maids-a-Milking, seven Swans-a-Swimming, six Geese-a-Laying, five Gold Rings, " .
                    "four Calling Birds, three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
            case 10:
                return
                    "On the tenth day of Christmas my true love gave to me: ten Lords-a-Leaping, " .
                    "nine Ladies Dancing, eight Maids-a-Milking, seven Swans-a-Swimming, six Geese-a-Laying, " .
                    "five Gold Rings, four Calling Birds, three French Hens, two Turtle Doves, " .
                    "and a Partridge in a Pear Tree.";
            case 11:
                return
                    "On the eleventh day of Christmas my true love gave to me: eleven Pipers Piping, " .
                    "ten Lords-a-Leaping, nine Ladies Dancing, eight Maids-a-Milking, seven Swans-a-Swimming, " .
                    "six Geese-a-Laying, five Gold Rings, four Calling Birds, three French Hens, two Turtle Doves, " .
                    "and a Partridge in a Pear Tree.";
            case 12:
                return
                    "On the twelfth day of Christmas my true love gave to me: twelve Drummers Drumming, " .
                    "eleven Pipers Piping, ten Lords-a-Leaping, nine Ladies Dancing, eight Maids-a-Milking, " .
                    "seven Swans-a-Swimming, six Geese-a-Laying, five Gold Rings, four Calling Birds, " .
                    "three French Hens, two Turtle Doves, and a Partridge in a Pear Tree.";
            default:
                return "";
        }
    }
}
