<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class GradeSchoolTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'GradeSchool.php';
    }

    /**
     * uuid: a3f0fb58-f240-4723-8ddc-e644666b85cc
     * @testdox Roster is empty when no student is added
     */
    public function testRosterIsEmptyWhenNoStudentIsAdded(): void
    {
        $subject = new GradeSchool();

        $this->assertSame([], $subject->roster());
    }

    /**
     * uuid: 9337267f-7793-4b90-9b4a-8e3978408824
     * @testdox Add a student
     */
    public function testAddAStudent(): void
    {
        $subject = new GradeSchool();
        $actual = [];

        $actual[] = $subject->add('Aimee', 2);

        $this->assertSame([true], $actual);
    }

    /**
     * uuid: 6d0a30e4-1b4e-472e-8e20-c41702125667
     * @testdox Student is added to the roster
     */
    public function testStudentIsAddedToTheRoster(): void
    {
        $subject = new GradeSchool();

        $subject->add('Aimee', 2);
        $actual = $subject->roster();

        $this->assertSame(['Aimee'], $actual);
    }

    /**
     * uuid: 73c3ca75-0c16-40d7-82f5-ed8fe17a8e4a
     * @testdox Adding multiple students in the same grade in the roster
     */
    public function testAddMultipleStudentsInSameGrade(): void
    {
        $subject = new GradeSchool();
        $actual = [];

        $actual[] = $subject->add('Blair', 2);
        $actual[] = $subject->add('James', 2);
        $actual[] = $subject->add('Paul', 2);

        $this->assertSame([true, true, true], $actual);
    }

    /**
     * uuid: 233be705-dd58-4968-889d-fb3c7954c9cc
     * @testdox Multiple students in the same grade are added to the roster
     */
    public function testMultipleStudentsInSameGradeAreAddedToTheRoster(): void
    {
        $subject = new GradeSchool();

        $subject->add('Blair', 2);
        $subject->add('James', 2);
        $subject->add('Paul', 2);
        $actual = $subject->roster();

        $this->assertSame([
            'Blair',
            'James',
            'Paul',
        ], $actual);
    }

    /**
     * uuid: 87c871c1-6bde-4413-9c44-73d59a259d83
     * @testdox Cannot add student to same grade in the roster more than once
     */
    public function testCannotAddStudentToSameGradeMoreThanOnce(): void
    {
        $subject = new GradeSchool();
        $actual = [];

        $actual[] = $subject->add('Blair', 2);
        $actual[] = $subject->add('James', 2);
        $actual[] = $subject->add('James', 2);
        $actual[] = $subject->add('Paul', 2);

        $this->assertSame([true, true, false, true], $actual);
    }

    /**
     * uuid: d7982c4f-1602-49f6-a651-620f2614243a
     * @testdox Student not added to same grade in the roster more than once
     */
    public function testStudentNotAddedToSameGradeInTheRosterMoreThanOnce(): void
    {
        $subject = new GradeSchool();

        $subject->add('Blair', 2);
        $subject->add('James', 2);
        $subject->add('James', 2);
        $subject->add('Paul', 2);
        $actual = $subject->roster();

        $this->assertSame([
            'Blair',
            'James',
            'Paul',
        ], $actual);
    }

    /**
     * uuid: e70d5d8f-43a9-41fd-94a4-1ea0fa338056
     * @testdox Adding students in multiple grades
     */
    public function testAddingStudentsInMultipleGrades(): void
    {
        $subject = new GradeSchool();
        $actual = [];

        $actual[] = $subject->add('Chelsea', 3);
        $actual[] = $subject->add('Logan', 7);

        $this->assertSame([true, true], $actual);
    }

    /**
     * uuid: 75a51579-d1d7-407c-a2f8-2166e984e8ab
     * @testdox Students in multiple grades are added to the roster
     */
    public function testStudentsInMultipleGradesAreAddedToTheRoster(): void
    {
        $subject = new GradeSchool();

        $subject->add('Chelsea', 3);
        $subject->add('Logan', 7);
        $actual = $subject->roster();

        $this->assertSame([
            'Chelsea',
            'Logan',
        ], $actual);
    }

    /**
     * uuid: 7df542f1-57ce-433c-b249-ff77028ec479
     * @testdox Cannot add same student to multiple grades in the roster
     */
    public function testCannotAddSameStudentToMultipleGrades(): void
    {
        $subject = new GradeSchool();
        $actual = [];

        $actual[] = $subject->add('Blair', 2);
        $actual[] = $subject->add('James', 2);
        $actual[] = $subject->add('James', 3);
        $actual[] = $subject->add('Paul', 3);

        $this->assertSame([true, true, false, true], $actual);
    }

    /**
     * uuid: c7ec1c5e-9ab7-4d3b-be5c-29f2f7a237c5
     * @testdox Student not added to multiple grades in the roster
     */
    public function testStudentNotAddedToMultipleGradesInTheRoster(): void
    {
        $subject = new GradeSchool();

        $subject->add('Blair', 2);
        $subject->add('James', 2);
        $subject->add('James', 3);
        $subject->add('Paul', 3);
        $actual = $subject->roster();

        $this->assertSame([
            'Blair',
            'James',
            'Paul',
        ], $actual);
    }

    /**
     * uuid: d9af4f19-1ba1-48e7-94d0-dabda4e5aba6
     * @testdox Students are sorted by grades in the roster
     */
    public function testStudentsAreSortedByGradesInTheRoster(): void
    {
        $subject = new GradeSchool();

        $subject->add('Jim', 3);
        $subject->add('Peter', 2);
        $subject->add('Anna', 1);
        $actual = $subject->roster();

        $this->assertSame([
            'Anna',
            'Peter',
            'Jim',
        ], $actual);
    }

    /**
     * uuid: d9fb5bea-f5aa-4524-9d61-c158d8906807
     * @testdox Students are sorted by name in the roster
     */
    public function testStudentsAreSortedByNameInTheRoster(): void
    {
        $subject = new GradeSchool();

        $subject->add('Peter', 2);
        $subject->add('Zoe', 2);
        $subject->add('Alex', 2);
        $actual = $subject->roster();

        $this->assertSame([
            'Alex',
            'Peter',
            'Zoe',
        ], $actual);
    }

    /**
     * uuid: 180a8ff9-5b94-43fc-9db1-d46b4a8c93b6
     * @testdox Students are sorted by grades and then by name in the roster
     */
    public function testStudentsAreSortedByGradeThenByNameInTheRoster(): void
    {
        $subject = new GradeSchool();

        $subject->add('Peter', 2);
        $subject->add('Anna', 1);
        $subject->add('Barb', 1);
        $subject->add('Zoe', 2);
        $subject->add('Alex', 2);
        $subject->add('Jim', 3);
        $subject->add('Charlie', 1);
        $actual = $subject->roster();

        $this->assertSame([
            'Anna',
            'Barb',
            'Charlie',
            'Alex',
            'Peter',
            'Zoe',
            'Jim',
        ], $actual);
    }

    /**
     * uuid: 5e67aa3c-a3c6-4407-a183-d8fe59cd1630
     * @testdox Grade is empty if no students in the roster
     */
    public function testGradeIsEmptyWhenNoStudentsInTheRoster(): void
    {
        $subject = new GradeSchool();

        $this->assertSame([], $subject->grade(1));
    }

    /**
     * uuid: 1e0cf06b-26e0-4526-af2d-a2e2df6a51d6
     * @testdox Grade is empty if no students in that grade
     */
    public function testGradeIsEmptyWhenNoStudentsInThatGrade(): void
    {
        $subject = new GradeSchool();

        $subject->add('Peter', 2);
        $subject->add('Zoe', 2);
        $subject->add('Alex', 2);
        $subject->add('Jim', 3);

        $this->assertSame([], $subject->grade(1));
    }

    /**
     * uuid: 2bfc697c-adf2-4b65-8d0f-c46e085f796e
     * @testdox Student not added to same grade more than once
     */
    public function testStudentNotAddedToSameGradeMoreThanOnce(): void
    {
        $subject = new GradeSchool();

        $subject->add('Blair', 2);
        $subject->add('James', 2);
        $subject->add('James', 2);
        $subject->add('Paul', 2);
        $actual = $subject->grade(2);

        $this->assertSame([
            'Blair',
            'James',
            'Paul',
        ], $actual);
    }

    /**
     * uuid: 66c8e141-68ab-4a04-a15a-c28bc07fe6b9
     * @testdox Student not added to multiple grades
     */
    public function testStudentNotAddedToMultipleGrades(): void
    {
        $subject = new GradeSchool();

        $subject->add('Blair', 2);
        $subject->add('James', 2);
        $subject->add('James', 3);
        $subject->add('Paul', 3);
        $actual = $subject->grade(2);

        $this->assertSame([
            'Blair',
            'James',
        ], $actual);
    }

    /**
     * uuid: c9c1fc2f-42e0-4d2c-b361-99271f03eda7
     * @testdox Student not added to other grade for multiple grades
     */
    public function testStudentNotAddedToOtherGradeForMultipleGrades(): void
    {
        $subject = new GradeSchool();

        $subject->add('Blair', 2);
        $subject->add('James', 2);
        $subject->add('James', 3);
        $subject->add('Paul', 3);
        $actual = $subject->grade(3);

        $this->assertSame([
            'Paul',
        ], $actual);
    }

    /**
     * uuid: 1bfbcef1-e4a3-49e8-8d22-f6f9f386187e
     * @testdox Students are sorted by name in a grade
     */
    public function testStudentsAreSortedByNameInAGrade(): void
    {
        $subject = new GradeSchool();

        $subject->add('Franklin', 5);
        $subject->add('Bradley', 5);
        $subject->add('Jeff', 1);
        $actual = $subject->grade(5);

        $this->assertSame([
            'Bradley',
            'Franklin',
        ], $actual);
    }
}
