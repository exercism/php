<?php

class School
{
    public function add(string $name, int $grade): void
    {
        \BadMethodCallException("Implement the add method");
    }

    public function grade($grade)
    {
        \BadMethodCallException("Implement the grade method");
    }

    public function studentsByGradeAlphabetical(): array
    {
        \BadMethodCallException("Implement the studentsByGradeAlphabetical method");
    }
}
