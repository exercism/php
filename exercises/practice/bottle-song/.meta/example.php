<?php

declare(strict_types=1);

class BottleSong
{
    private const START   = "%s green bottle%s hanging on the wall,\n";
    private const FINAL   = "And if one green bottle should accidentally fall,\n";
    private const FINISH  = "There'll be %s green bottle%s hanging on the wall.";
    private const NUMBERS = [
        "no",
        "one",
        "two",
        "three",
        "four",
        "five",
        "six",
        "seven",
        "eight",
        "nine",
        "ten"
    ];

    public function verse(int $number): string
    {
        $current = $number > 1       ? "s" : "";
        $next    = $number - 1 !== 1 ? "s" : "";

        $song  = sprintf(self::START, ucfirst(self::NUMBERS[$number]), $current);
        $song .= sprintf(self::START, ucfirst(self::NUMBERS[$number]), $current);
        $song .= self::FINAL;
        $song .= sprintf(self::FINISH, self::NUMBERS[$number - 1], $next);

        return $song;
    }

    public function verses(int $start, int $size): string
    {
        $song = "";

        for ($i = 0; $i < $size; $i++) {
            $song .= $this->verse($start - $i) . "\n" . "\n";
        }

        return rtrim($song, "\n");
    }

    public function lyrics(): string
    {
        return $this->verses(10, 10);
    }
}
