<?php

declare(strict_types=1);

class School
{
    public function add(string $name, int $grade): void
    {
        throw new \BadMethodCallException("Implement the add method");
    }

    public function grade($grade)
    {
        throw new \BadMethodCallException("Implement the grade method");
    }

    public function studentsByGradeAlphabetical(): array
    {
        throw new \BadMethodCallException("Implement the studentsByGradeAlphabetical method");
    }
}
