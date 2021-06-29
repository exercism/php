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
