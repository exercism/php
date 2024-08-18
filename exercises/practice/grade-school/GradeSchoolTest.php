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

    public function testAddStudent(): void
    {
        $this->school->add('Claire', 2);
        $this->assertContains('Claire', $this->school->grade(2));
    }

    public function testAddStudentsInSameGrade(): void
    {
        $this->school->add('Marc', 2);
        $this->school->add('Virginie', 2);
        $this->school->add('Claire', 2);

        $students = $this->school->grade(2);
        $this->assertCount(3, $students);
        $this->assertEqualsCanonicalizing(
            ['Claire', 'Marc', 'Virginie'],
            array_values($students)
        );
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
