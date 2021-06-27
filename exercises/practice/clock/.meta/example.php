<?php

declare(strict_types=1);

class Clock
{
    /**
     * @var int
     */
    private $minutes;

    /**
     * @param int $hour
     * @param int $minutes
     */
    public function __construct($hour, $minutes = 0)
    {
        $totalMinutes = $this->calculateTotalMinutes($hour, $minutes);

        $minutesWithoutFullDays = $this->ignoreWholeDays($totalMinutes);

        $positiveTimeInMinutes = $this->ensurePositiveMinutes($minutesWithoutFullDays);

        $this->minutes = $positiveTimeInMinutes;
    }

    /**
     * Returns a new Clock incremented by $minutes
     *
     * @param int $minutes
     *
     * @return Clock
     */
    public function add($minutes): \Clock
    {
        return new Clock(0, $this->minutes + $minutes);
    }

    /**
     * Returns a new Clock decremented by $minutes
     *
     * @param int $minutes
     *
     * @return Clock
     */
    public function sub($minutes): \Clock
    {
        return $this->add(-$minutes);
    }

    /**
     * Returns the string representation of the clock in 24hr format
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf('%02d:%02d', $this->minutes / 60, $this->minutes % 60);
    }

    /**
     * @param int $hour
     * @param int $minutes
     *
     * @return int
     */
    private function calculateTotalMinutes($hour, $minutes): int
    {
        return ($hour * 60) + $minutes;
    }

    /**
     * @param int $minutes
     *
     * @return int
     */
    private function ignoreWholeDays($minutes): int
    {
        return $minutes % (24 * 60);
    }

    /**
     * @param int $minutes
     *
     * @return int
     */
    private function ensurePositiveMinutes($minutes): int
    {
        return ($minutes < 0) ? $minutes + 1440 : $minutes;
    }
}
