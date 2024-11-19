<?php

declare(strict_types=1);

class Darts
{
    public int $score = 0;

    public function __construct(float $xAxis, float $yAxis)
    {
        $this->score = $this->calculateScore($xAxis, $yAxis);
    }

    private function calculateScore(float $xAxis, float $yAxis): int
    {
        $location = $xAxis ** 2 + $yAxis ** 2;

        if ($location > 100) {
            return 0;
        }
        if ($location > 25) {
            return 1;
        }
        if ($location > 1) {
            return 5;
        }

        return 10;
    }
}
