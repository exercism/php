<?php

class Clock
{
    private $minutes;

    /**
     * @param int $hour
     * @param int $minutes
     */
    public function __construct($hour, $minutes = 0)
    {
        $this->minutes = $hour * 60 + $minutes;
    }

    /**
     * Returns a new Clock incremented by $minutes
     *
     * @param int $minutes
     * @return Clock
     */
    public function add($minutes)
    {
        return $this->build($this->minutes + $minutes);
    }

    /**
     * Returns a new Clock deincremented by $minutes
     *
     * @param int $minutes
     * @return Clock
     */
    public function sub($minutes)
    {
        return $this->build($this->minutes - $minutes);
    }

    /**
     * Returns the string representation of the receiver
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf('%02d:%02d', $this->minutes / 60, $this->minutes % 60);
    }

    /**
     * @param $minutes
     * @return Clock
     */
    private function build($minutes)
    {
        if ($minutes < 60) {
            $minutes += 24 * 60;
        }

        $hour = floor($minutes / 60);
        return new Clock($hour < 24 ? $hour : $hour - 24, $minutes % 60);
    }
}
