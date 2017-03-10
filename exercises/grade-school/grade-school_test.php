<?php

require "grade-school.php";

class GradeSchoolTest extends PHPUnit\Framework\TestCase
{
    protected $school ;

    protected function setUp(){
      $this->school = new School() ;
    }

    public function testNoStudent()
    {
      $this->assertEquals(0, $this->school->numberOfStudents());
    }

    public function testAddStudent()
    {
      $this->markTestSkipped();

      $this->school->add("Claire", 2);
      $this->assertTrue(in_array("Claire",$this->school->grade(2)));
    }

    public function testAddStudentsinSameGrade()
    {
      $this->markTestSkipped();

      $this->school->add("Marc", 2);
      $this->school->add("Virginie", 2);
      $this->school->add("Claire", 2);

      $students = $this->school->grade(2) ;
      $this->assertEquals(count($students), 3);
      $this->assertTrue(in_array("Claire",$students) && in_array("Marc",$students) && in_array("Virginie",$students));
    }

    public function testAddStudentInDifferentGrades()
    {
      $this->markTestSkipped();

      $this->school->add("Marc", 3);
      $this->school->add("Claire", 6);

      $this->assertTrue(in_array("Marc",$this->school->grade(3)));
      $this->assertTrue(in_array("Claire",$this->school->grade(6)));
      $this->assertFalse(in_array("Marc",$this->school->grade(6)));
      $this->assertFalse(in_array("Claire",$this->school->grade(3)));
    }

    public function testEmptyGrade()
    {
      $this->markTestSkipped();

      $this->assertTrue(empty($this->school->grade(1)));
    }

    public function testSortSchool()
    {
      $this->markTestSkipped();

      $this->school->add("Marc", 5);
      $this->school->add("Virginie", 5);
      $this->school->add("Claire", 5);
      $this->school->add("Mehdi", 4);

      $sortedStudents = array("4"=>array("Mehdi"),
                              	"5"=>array("Claire", "Marc", "Virginie")
				) ;
      $schoolStudents = $this->school->studentsByGradeAlphabetical() ;
      $this->assertEquals($sortedStudents, $schoolStudents) ;
    }
}

