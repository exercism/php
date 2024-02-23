<?php

declare(strict_types=1);

class FoodChain
{
    private static array $verse = [
        ["", ""],
        ["fly", "I don't know why she swallowed the fly. Perhaps she'll die."],
        ["spider", "It wriggled and jiggled and tickled inside her."],
        ["bird", "How absurd to swallow a bird!"],
        ["cat", "Imagine that, to swallow a cat!"],
        ["dog", "What a hog, to swallow a dog!"],
        ["goat", "Just opened her throat and swallowed a goat!"],
        ["cow", "I don't know how she swallowed a cow!"],
        ["horse", "She's dead, of course!"],
    ];

    public static function verse(int $verseNumber): array
    {
        $result = [];

        $result[] = sprintf("I know an old lady who swallowed a %s.", self::$verse[$verseNumber][0]);
        $result[] = self::$verse[$verseNumber][1];
        if ($verseNumber === 1 || $verseNumber === 8) {
            return $result;
        }
        for (; $verseNumber > 1; $verseNumber--) {
            $text = sprintf(
                "She swallowed the %s to catch the %s%s",
                self::$verse[$verseNumber][0],
                self::$verse[$verseNumber - 1][0],
                $verseNumber !== 3 ? "." : ""
            );
            if ($verseNumber === 3) {
                $text .= " that wriggled and jiggled and tickled inside her.";
            }
            $result[] = $text;
        }
        $result[] = self::$verse[$verseNumber][1];
        return $result;
    }

    public static function verses(int $start, int $end): array
    {
        if ($start < 1 || $start > $end || $end > 8) {
            return self::verse(0);
        }
        $s = self::verse($start);
        while ($start < $end) {
            $start++;
            $s[] = "";
            $s = array_merge($s, self::verse($start));
        }
        return $s;
    }

    public static function song(): array
    {
        return self::verses(1, 8);
    }
}
