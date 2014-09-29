<?php

class Squares
{
    protected $max = 1;

    public function __construct($max)
    {
        $this->max = $max;
    }

    public function squareOfSums()
    {
        $sum = 0;

        foreach (range(1, $this->max) as $i) {
            $sum += $i;
        }

        $sum = pow($sum, 2);

        return $sum;
    }

    public function sumOfSquares()
    {
        $sum = 0;

        foreach (range(1, $this->max) as $i) {
            $sum += pow($i, 2);
        }

        return $sum;
    }

    public function difference()
    {
        return $this->squareOfSums() - $this->sumOfSquares();
    }
}
