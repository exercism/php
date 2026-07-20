<?php

class CarsAssemble
{
    private const CARS_PER_HOUR = 221;

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

        if ($speed >= 1) {
            return 1.0;
        }

        return 0.0;
    }

    public function productionRatePerHour($speed)
    {
        return self::CARS_PER_HOUR * $speed * $this->successRate($speed);
    }

    public function workingItemsPerMinute($speed)
    {
        return (int) ($this->productionRatePerHour($speed) / 60);
    }
}
