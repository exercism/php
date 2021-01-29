<?php

use PHPUnit\Framework\TestCase;

class GradeSchoolTest extends TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'grade-school.php';
    }

    protected $school;

    protected function setUp() : void
    {
        $this->school = new School();
    }

    public function testAddStudent() : void
    {
        $this->school->add("Claire", 2);
        $this->assertContains('Claire', $this->school->grade(2));
    }

    public function testAddStudentsInSameGrade() : void
    {
        $this->school->add("Marc", 2);
        $this->school->add("Virginie", 2);
        $this->school->add("Claire", 2);

        $students = $this->school->grade(2);
        $this->assertCount(3, $students);
        $this->assertEqualsCanonicalizing(
            ['Claire', 'Marc', 'Virginie'],
            $students
        );
    }

    public function testAddStudentInDifferentGrades() : void
    {
        $this->school->add("Marc", 3);
        $this->school->add("Claire", 6);

        $this->assertContains('Marc', $this->school->grade(3));
        $this->assertContains('Claire', $this->school->grade(6));
        $this->assertNotContains('Marc', $this->school->grade(6));
        $this->assertNotContains('Claire', $this->school->grade(3));
    }

    public function testEmptyGrade() : void
    {
        $this->assertEmpty($this->school->grade(1));
    }

    public function testSortSchool() : void
    {
        $this->school->add("Marc", 5);
        $this->school->add("Virginie", 5);
        $this->school->add("Claire", 5);
        $this->school->add("Mehdi", 4);

        $sortedStudents = [
            4 => ['Mehdi'],
            5 => ['Claire', 'Marc', 'Virginie']
        ];
        $schoolStudents = $this->school->studentsByGradeAlphabetical();

        $this->assertTrue($sortedStudents === $schoolStudents);
    }
}
