<?php

declare(strict_types=1);

class Game
{
    public function score(): int
    {
        throw new \BadMethodCallException("Implement the score function");
    }

    public function roll(int $pins): void
    {
        throw new \BadMethodCallException("Implement the roll function");
    }
}
