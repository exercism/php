<?php

class Triangle
{
    protected $sideA;
    protected $sideB;
    protected $sideC;

    public function __construct($sideA, $sideB, $sideC)
    {
        $this->sideA = $sideA;
        $this->sideB = $sideB;
        $this->sideC = $sideC;
    }

    public function kind() : string
    {
        if (0 == ($this->sideA + $this->sideB + $this->sideC)) {
            throw new Exception("These sides have no values.");
        }

        $sides = [$this->sideA, $this->sideB, $this->sideC];
        sort($sides);
        if ($sides[2] >= $sides[0] + $sides[1]) {
            throw new Exception("This violates the triangle inequality");
        }

        if ($this->sideA == $this->sideB &&
            $this->sideA == $this->sideC
        ) {
            return 'equilateral';
        }

        if ($this->sideB == $this->sideC ||
            $this->sideA == $this->sideC ||
            $this->sideA == $this->sideB
        ) {
            return 'isosceles';
        }

        return 'scalene';
    }
}
