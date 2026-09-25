<?php

declare(strict_types=1);

class ComplexNumbers
{
    public function __construct(public float $real, public float $imaginary = 0)
    {
    }

    public function add(ComplexNumbers $num2): ComplexNumbers
    {
        return new ComplexNumbers(
            $this->real + $num2->real,
            $this->imaginary + $num2->imaginary
        );
    }

    public function sub(ComplexNumbers $num2): ComplexNumbers
    {
        return new ComplexNumbers(
            $this->real - $num2->real,
            $this->imaginary - $num2->imaginary
        );
    }

    public function mul(ComplexNumbers $num2): ComplexNumbers
    {
        return new ComplexNumbers(
            $this->real * $num2->real - $this->imaginary * $num2->imaginary,
            $this->imaginary * $num2->real + $this->real * $num2->imaginary
        );
    }

    public function div(ComplexNumbers $num2): ComplexNumbers
    {
        return new ComplexNumbers(
            ($this->real * $num2->real + $this->imaginary * $num2->imaginary) /
            (pow($num2->real, 2) + pow($num2->imaginary, 2)),
            ($this->imaginary * $num2->real - $this->real * $num2->imaginary) /
            (pow($num2->real, 2) + pow($num2->imaginary, 2))
        );
    }

    public function abs(): float
    {
        return hypot($this->real, $this->imaginary);
    }

    public function conjugate(): ComplexNumbers
    {
        return new ComplexNumbers($this->real, $this->imaginary * -1);
    }

    public function exp(): ComplexNumbers
    {
        return new ComplexNumbers(
            exp($this->real) * cos($this->imaginary),
            exp($this->real) * sin($this->imaginary)
        );
    }
}
