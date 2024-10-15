<?php

declare(strict_types=1);

class GradeSchool
{
    private $students = [];

    public function add(string $name, int $grade): bool
    {
        if (in_array($name, $this->roster())) {
            return false;
        }

        $this->students[$grade][] = $name;
        sort($this->students[$grade]);

        return true;
    }

    public function grade(int $grade): array
    {
        return (array_key_exists($grade, $this->students) ? $this->students[$grade] : []);
    }

    public function roster(): array
    {
        ksort($this->students);

        return array_merge(...$this->students);
    }
}
