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

    public function addR(int|ComplexNumbers $num1, int|ComplexNumbers $num2): ComplexNumbers
    {
        is_int($num1) ? $num1 = new ComplexNumbers($num1) : $num2 = new ComplexNumbers($num2);

        return new ComplexNumbers(
            $num1->real + $num2->real,
            $num1->imaginary + $num2->imaginary
        );
    }

    public function sub(ComplexNumbers $num2): ComplexNumbers
    {
        return new ComplexNumbers(
            $this->real - $num2->real,
            $this->imaginary - $num2->imaginary
        );
    }

    public function subR(int|ComplexNumbers $num1, int|ComplexNumbers $num2): ComplexNumbers
    {
        is_int($num1) ? $num1 = new ComplexNumbers($num1) : $num2 = new ComplexNumbers($num2);

        return new ComplexNumbers(
            $num1->real - $num2->real,
            $num1->imaginary - $num2->imaginary
        );
    }

    public function mul(ComplexNumbers $num2): ComplexNumbers
    {
        return new ComplexNumbers(
            $this->real * $num2->real - $this->imaginary * $num2->imaginary,
            $this->imaginary * $num2->real + $this->real * $num2->imaginary
        );
    }

    public function mulR(int|ComplexNumbers $num1, int|ComplexNumbers $num2): ComplexNumbers
    {
        is_int($num1) ? $num1 = new ComplexNumbers($num1) : $num2 = new ComplexNumbers($num2);

        return new ComplexNumbers(
            $num1->real * $num2->real - $num1->imaginary * $num2->imaginary,
            $num1->imaginary * $num2->real + $num1->real * $num2->imaginary
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

    public function divR(int|ComplexNumbers $num1, int|ComplexNumbers $num2): ComplexNumbers
    {
        is_int($num1) ? $num1 = new ComplexNumbers($num1) : $num2 = new ComplexNumbers($num2);

        return new ComplexNumbers(
            ($num1->real * $num2->real + $num1->imaginary * $num2->imaginary) /
            (pow($num2->real, 2) + pow($num2->imaginary, 2)),
            ($num1->imaginary * $num2->real - $num1->real * $num2->imaginary) /
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
