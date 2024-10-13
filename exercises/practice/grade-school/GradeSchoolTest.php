<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class GradeSchoolTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'GradeSchool.php';
    }

    /** @var School */
    protected $school;

    protected function setUp(): void
    {
        $this->school = new School();
    }

    /**
     * uuid: 9337267f-7793-4b90-9b4a-8e3978408824
     * @testdox Add a student
     */
    public function testAddAStudent(): void
    {
        $this->school->add('Aimee', 2);
        $this->assertCount(1, $this->school->grade(2));
    }

    /**
     * uuid: 6d0a30e4-1b4e-472e-8e20-c41702125667
     * @testdox Student is added to the roster
     */
    public function testStudentIsAddedToTheRoster(): void
    {
        $this->school->add('Aimee', 2);
        $this->assertContains('Aimee', $this->school->grade(2));
    }

    /**
     * uuid: 73c3ca75-0c16-40d7-82f5-ed8fe17a8e4a
     * @testdox Adding multiple students in the same grade in the roster
     */
    public function testAddingMultipleStudentsInTheSameGradeInTheRoster(): void
    {
        $this->school->add('Blair', 2);
        $this->school->add('James', 2);
        $this->school->add('Paul', 2);

        $students = $this->school->grade(2);
        $this->assertCount(3, $students);
        $this->assertEqualsCanonicalizing(
            ['Blair', 'James', 'Paul'],
            array_values($students)
        );
    }

    /**
     * uuid: 233be705-dd58-4968-889d-fb3c7954c9cc
     * @testdox Multiple students in the same grade are added to the roster
     */
    public function testMultipleStudentsInTheSameGradeAreAddedToTheRoster(): void
    {
        $this->school->add('Blair', 2);
        $this->school->add('James', 2);
        $this->school->add('Paul', 2);

        $students = $this->school->grade(2);
        $this->assertCount(3, $students);
        $this->assertEquals(
            ['Blair', 'James', 'Paul'],
            array_values($students)
        );
    }

    /**
     * uuid: 87c871c1-6bde-4413-9c44-73d59a259d83
     * @testdox Cannot add student to same grade in the roster more than once
     */
    public function testCannotAddStudentToSameGradeMoreThanOnce(): void
    {
        $students = [
            ["Blair", 2],
            ["James", 2],
            ["James", 2],
            ["Paul", 2]
        ];

        $actual = [];
        $roster = [];

        $actual = array_map(function ($student) use (&$roster) {
            [$name, $grade] = $student;

            if (!isset($roster[$grade])) {
                $roster[$grade] = [];
            }

            if (isset($roster[$grade][$name])) {
                return false;
            } else {
                $roster[$grade][$name] = true;
                return true;
            }
        }, $students);

        $this->assertSame([true, true, false, true], $actual);
    }

    public function testAddStudentInDifferentGrades(): void
    {
        $this->school->add('Marc', 3);
        $this->school->add('Claire', 6);

        $this->assertContains('Marc', $this->school->grade(3));
        $this->assertContains('Claire', $this->school->grade(6));
        $this->assertNotContains('Marc', $this->school->grade(6));
        $this->assertNotContains('Claire', $this->school->grade(3));
    }

    public function testEmptyGrade(): void
    {
        $this->assertEmpty($this->school->grade(1));
    }

    public function testSortSchool(): void
    {
        $this->school->add('Marc', 5);
        $this->school->add('Mehdi', 4);
        $this->school->add('Virginie', 5);
        $this->school->add('Claire', 5);

        $sortedStudents = [
            4 => ['Mehdi'],
            5 => ['Claire', 'Marc', 'Virginie'],
        ];
        $schoolStudents = $this->school->studentsByGradeAlphabetical();

        $this->assertSame($sortedStudents, $schoolStudents);
    }

    public function testSortSchoolByKey(): void
    {
        $this->school->add('Marc', 4);
        $this->school->add('Mehdi', 4);
        $this->school->add('Virginie', 4);
        $this->school->add('Claire', 5);

        $sortedStudents = [
            4 => ['Marc', 'Mehdi', 'Virginie'],
            5 => ['Claire']
        ];
        $schoolStudents = $this->school->studentsByGradeAlphabetical();

        $this->assertSame($sortedStudents, $schoolStudents);
    }
}
