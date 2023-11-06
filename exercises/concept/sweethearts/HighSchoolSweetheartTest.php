<?php

class HighSchoolSweetheartTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'HighSchoolSweetheart.php';
    }

    /**
     * @testdox gets the first letter from a string
     * @task_id 1
     */
    public function testFirstLetter()
    {
        $sweetheart = new HighSchoolSweetheart();
        $this->assertEquals('J', $sweetheart->firstLetter('Jane'));
    }

    /**
     * @testdox getting the first letter doesn't change the case
     * @task_id 1
     */
    public function testFirstLetterDoesNotChangeCase()
    {
        $sweetheart = new HighSchoolSweetheart();
        $this->assertEquals('j', $sweetheart->firstLetter('jane'));
    }

    /**
     * @testdox getting the first letter removes whitespace from the name
     * @task_id 1
     */
    public function testFirstLetterRemovesWhitespace()
    {
        $sweetheart = new HighSchoolSweetheart();
        $this->assertEquals('J', $sweetheart->firstLetter(' Jane'));
    }

    /**
     * @testdox gets the first letter and appends a dot
     * @task_id 2
     */
    public function testCreatesInitial()
    {
        $sweetheart = new HighSchoolSweetheart();
        $this->assertEquals('B.', $sweetheart->initial('Betty'));
    }

    /**
     * @testdox creates an uppercase initial
     * @task_id 2
     */
    public function testCreatesUppercaseInitial()
    {
        $sweetheart = new HighSchoolSweetheart();
        $this->assertEquals('J.', $sweetheart->initial('jim'));
    }

    /**
     * @testdox creates a set of initials
     * @task_id 3
     */
    public function testCreatesInitials()
    {
        $sweetheart = new HighSchoolSweetheart();
        $this->assertEquals('L. M.', $sweetheart->initials('Linda Miller'));
    }

    /**
     * @testdox creates a set of initials, wrapped in a heart
     * @task_id 4
     */
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
