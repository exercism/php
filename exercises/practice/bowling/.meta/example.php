<?php

declare(strict_types=1);

/**
 * Translated from original source:
 * https://butunclebob.com/ArticleS.UncleBob.TheBowlingGameKata
 */
class Game
{
    private $rolls = [];
    private $currentFrame = 1;
    private $rollsInFrame = 0;
    private $firstRollPins = 0;

    public function roll($pins): void
    {
        if ($pins < 0 || $pins > 10) {
            throw new Exception('Pins must be between 0 and 10');
        }
        // For frames 1-9
        if ($this->currentFrame < 10) {
            if ($this->rollsInFrame == 0) {
                // First roll of frame
                $this->firstRollPins = $pins;
                $this->rollsInFrame = 1;

                if ($pins == 10) { // Strike
                    $this->currentFrame++;
                    $this->rollsInFrame = 0;
                }
            } else {
                // Second roll of frame
                if ($this->firstRollPins + $pins > 10) {
                    throw new Exception("Pin count exceeds pins on the lane");
                }
                $this->currentFrame++;
                $this->rollsInFrame = 0;
            }
        } else {
            // Frame 10 special handling
            if ($this->rollsInFrame == 0) {
                $this->firstRollPins = $pins;
                $this->rollsInFrame = 1;
            } elseif ($this->rollsInFrame == 1) {
                // Second roll in frame 10
                if ($this->firstRollPins < 10 && $this->firstRollPins + $pins > 10) {
                    throw new Exception("Pin count exceeds pins on the lane");
                }
                $this->rollsInFrame = 2;
            } else {
                // Third roll in frame 10 (only valid after strike or spare)
                $this->rollsInFrame = 3;
            }
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
