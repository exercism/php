<?php

class School
{
    private $database = array() ;

    public function add($student, $grade)
    {
        $this->database[$grade][] = $student ;
    }

    public function grade($grade)
    {
        return (array_key_exists($grade, $this->database) ? $this->database[$grade] : array()) ;
    }

    public function studentsByGradeAlphabetical()
    {
        $tmp = $this->database ;
        ksort($tmp) ;

        foreach ($tmp as $grade => $students) {
            asort($students) ;
            foreach ($students as $student) {
                $res [ $grade ][] = $student ;
            }
        }
        return $res ;
    }
}
