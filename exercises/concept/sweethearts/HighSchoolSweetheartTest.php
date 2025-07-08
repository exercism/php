<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class HighSchoolSweetheartTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'HighSchoolSweetheart.php';
    }

    /**
     * @task_id 1
     */
    #[TestDox('gets the first letter from a string')]
    public function testFirstLetter()
    {
        $sweetheart = new HighSchoolSweetheart();
        $this->assertEquals('J', $sweetheart->firstLetter('Jane'));
    }

    /**
     * @task_id 1
     */
    #[TestDox("getting the first letter doesn't change the case")]
    public function testFirstLetterDoesNotChangeCase()
    {
        $sweetheart = new HighSchoolSweetheart();
        $this->assertEquals('j', $sweetheart->firstLetter('jane'));
    }

    /**
     * @task_id 1
     */
    #[TestDox('getting the first letter removes whitespace from the name')]
    public function testFirstLetterRemovesWhitespace()
    {
        $sweetheart = new HighSchoolSweetheart();
        $this->assertEquals('J', $sweetheart->firstLetter(' Jane'));
    }

    /**
     * @task_id 2
     */
    #[TestDox('gets the first letter and appends a dot')]
    public function testCreatesInitial()
    {
        $sweetheart = new HighSchoolSweetheart();
        $this->assertEquals('B.', $sweetheart->initial('Betty'));
    }

    /**
     * @task_id 2
     */
    #[TestDox('creates an uppercase initial')]
    public function testCreatesUppercaseInitial()
    {
        $sweetheart = new HighSchoolSweetheart();
        $this->assertEquals('J.', $sweetheart->initial('jim'));
    }

    /**
     * @task_id 3
     */
    #[TestDox('creates a set of initials')]
    public function testCreatesInitials()
    {
        $sweetheart = new HighSchoolSweetheart();
        $this->assertEquals('L. M.', $sweetheart->initials('Linda Miller'));
    }

    /**
     * @task_id 4
     */
    #[TestDox('creates a set of initials, wrapped in a heart')]
    public function testPair()
    {
        $sweetheart = new HighSchoolSweetheart();
        $expected = <<<EXPECTED_HEART
                 ******       ******
               **      **   **      **
             **         ** **         **
            **            *            **
            **                         **
            **     A. B.  +  C. D.     **
             **                       **
               **                   **
                 **               **
                   **           **
                     **       **
                       **   **
                         ***
                          *
            EXPECTED_HEART;

        $this->assertEquals(
            $expected,
            $sweetheart->pair('Avery Bryant', 'Charlie Dixon')
        );
    }
}
