<?php

/**
 * Translated from original source:
 * http://butunclebob.com/ArticleS.UncleBob.TheBowlingGameKata
 */
class Game
{
    private $rolls = array();
    private $currentRoll = 0;

    public function roll($pins)
    {
        $this->rolls[$this->currentRoll++] = $pins;
    }

    public function score()
    {
        $score = 0;
        $frameIndex = 0;
        for ($frame = 0; $frame < 10; $frame++) {
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

        return $score;
    }

    private function isStrike($frameIndex)
    {
        return $this->rolls[$frameIndex] === 10;
    }

    private function strikeBonus($frameIndex)
    {
        return $this->rolls[$frameIndex + 1] + $this->rolls[$frameIndex + 2];
    }

    private function isSpare($frameIndex)
    {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1] === 10;
    }

    private function spareBonus($frameIndex)
    {
        return $this->rolls[$frameIndex + 2];
    }

    private function sumOfBallsInFrame($frameIndex)
    {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1];
    }
}
