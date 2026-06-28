<?php

declare(strict_types=1);

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

    private function isValidTriangle(): bool
    {
        if ($this->sideA <= 0 || $this->sideB <= 0 || $this->sideC <= 0) {
            return false;
        }

        return (
            $this->sideA + $this->sideB > $this->sideC &&
            $this->sideA + $this->sideC > $this->sideB &&
            $this->sideB + $this->sideC > $this->sideA
        );
    }

    public function isEquilateral(): bool
    {
        return $this->isValidTriangle() &&
            $this->sideA == $this->sideB &&
            $this->sideA == $this->sideC;
    }

    public function isIsosceles(): bool
    {
        return $this->isValidTriangle() && (
            $this->sideA == $this->sideB ||
            $this->sideA == $this->sideC ||
            $this->sideB == $this->sideC
        );
    }

    public function isScalene(): bool
    {
        return $this->isValidTriangle() && !$this->isIsosceles();
    }
}
