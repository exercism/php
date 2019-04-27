<?php

class School
{
    private $students = [];

    public function add($name, $grade)
    {
        $this->students[$grade][] = $name;
    }

    public function grade($grade)
    {
        return (array_key_exists($grade, $this->students) ? $this->students[$grade] : []);
    }

    public function studentsByGradeAlphabetical()
    {
        ksort($this->students);

        return array_map(function ($grade) {
            sort($grade);

            return $grade;
        }, $this->students);
    }
}
