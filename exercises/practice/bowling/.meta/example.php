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

/**
 * Translated from original source:
 * https://butunclebob.com/ArticleS.UncleBob.TheBowlingGameKata
 */
class Game
{
    private $rolls = [];

    public function roll($pins): void
    {
        if ($pins < 0 || $pins > 10) {
            throw new Exception('Pins must be between 0 and 10');
        }
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $frameIndex = 0;
        foreach (range(1, 10) as $frame) {
            $this->guardAgainstIncompleteGame($frameIndex);
            if ($this->isStrike($frameIndex)) {
                $score += 10 + $this->strikeBonus($frameIndex);
                $frameIndex++;
            } elseif ($this->isSpare($frameIndex)) {
                $score += 10 + $this->spareBonus($frameIndex);
                $frameIndex += 2;
            } else {
                $score += $this->sumOfBallsInFrame($frameIndex);
                $frameIndex += 2;
            }
        }
        $this->guardAgainstTooManyFrames($frameIndex);

        return $score;
    }

    private function isStrike($frameIndex): bool
    {
        return $this->rolls[$frameIndex] === 10;
    }

    private function strikeBonus($frameIndex)
    {
        if (!isset($this->rolls[$frameIndex + 1]) || !isset($this->rolls[$frameIndex + 2])) {
            throw new Exception('Incomplete game');
        }
        $bonus1 = $this->rolls[$frameIndex + 1];
        $bonus2 = $this->rolls[$frameIndex + 2];
        $sum = $bonus1 + $bonus2;
        if ($sum > 10 && $frameIndex = 10 && $bonus1 != 10) {
            throw new Exception('Cannot score more than 10');
        }
        return $sum;
    }

    private function isSpare($frameIndex): bool
    {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1] === 10;
    }

    private function spareBonus($frameIndex)
    {
        if (!isset($this->rolls[$frameIndex + 2])) {
            throw new Exception('Incomplete game');
        }
        return $this->rolls[$frameIndex + 2];
    }

    private function sumOfBallsInFrame($frameIndex)
    {
        $sum = $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1];
        if ($sum > 10) {
            throw new Exception('Cannot score more than ten in single frame');
        }
        return $sum;
    }

    private function guardAgainstIncompleteGame($frameIndex): void
    {
        if (!isset($this->rolls[$frameIndex])) {
            throw new Exception('Incomplete game');
        }
    }

    private function guardAgainstTooManyFrames($frameIndex): void
    {
        $rollsCount = count($this->rolls);
        if ($this->isStrike($frameIndex - 1)) {
            if ($rollsCount > $frameIndex + 2) {
                throw new Exception('Too many frames in game');
            }
        } elseif ($this->isSpare($frameIndex - 2)) {
            if ($rollsCount > $frameIndex + 1) {
                throw new Exception('Too many frames in game');
            }
        } elseif ($rollsCount > $frameIndex) {
            throw new Exception('Too many frames in game');
        }
    }
}
