<?php

class Game
{
    public function score(): int
    {
        \BadMethodCallException("Implement the score function");
    }

    public function roll(int $pins): void
    {
        \BadMethodCallException("Implement the roll function");
    }
}
