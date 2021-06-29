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

    public function kind(): string
    {
        if (0 == ($this->sideA + $this->sideB + $this->sideC)) {
            throw new Exception("These sides have no values.");
        }

        $sides = [$this->sideA, $this->sideB, $this->sideC];
        sort($sides);
        if ($sides[2] >= $sides[0] + $sides[1]) {
            throw new Exception("This violates the triangle inequality");
        }

        if (
            $this->sideA == $this->sideB &&
            $this->sideA == $this->sideC
        ) {
            return 'equilateral';
        }

        if (
            $this->sideB == $this->sideC ||
            $this->sideA == $this->sideC ||
            $this->sideA == $this->sideB
        ) {
            return 'isosceles';
        }

        return 'scalene';
    }
}
