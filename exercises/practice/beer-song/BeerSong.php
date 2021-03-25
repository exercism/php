<?php

class BeerSong
{
    public function verse(int $number): string
    {
        \BadMethodCallException("Implement the verse method");
    }

    public function verses(int $start, int $finish): string
    {
        \BadMethodCallException("Implement the verses method");
    }

    public function lyrics(): string
    {
        \BadMethodCallException("Implement the lyrics method");
    }
}
