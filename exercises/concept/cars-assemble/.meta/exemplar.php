<?php

class CarsAssemble
{
    public function successRate($speed)
    {
        if ($speed === 10) {
            return 0.77;
        }

        if ($speed === 9) {
            return 0.8;
        }

        if ($speed >= 5) {
            return 0.9;
        }

        if ($speed > 0) {
            return 1.0;
        }

        return 0.0;
    }

    public function productionRatePerHour($speed)
    {
        return 221 * $speed * $this->successRate($speed);
    }

    public function isLineRunning($speed)
    {
        return $speed !== 0;
    }

    public function compareSpeeds($left, $right)
    {
        return $left <=> $right;
    }
}
