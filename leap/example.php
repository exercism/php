<?php

class Year
{
    private $year;

    /**
     * @param int $year
     */
    public function __construct($year)
    {
        $this->year = $year;
    }

    /**
     * @return bool
     */
    public function isLeap()
    {
        return $this->isDivisibleBy(4) && (!$this->isDivisibleBy(100) || $this->isDivisibleBy(400));
    }

    private function isDivisibleBy($n)
    {
        return $this->year % $n === 0;
    }
}
