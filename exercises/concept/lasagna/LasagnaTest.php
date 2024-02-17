<?php

declare(strict_types=1);

/**
 * We use `assertEquals()` here for its loose type checking. We don't care if
 * the student returns numeric strings or integers in this exercise.
 *
 * - Please use `assertSame()` whenever possible. Add a comment when it is not possible.
 * - Do not use calls with named arguments.
 *   Use them only when the exercise requires named arguments (e.g. because the exercise is about named arguments).
 *   Named arguments are in the way of defining argument names the students want (e.g. in their native language).
 * - Add @testdox with a useful test title, e.g. the task heading from `instructions.md`.
 *   The online editor shows that to students.
 * - Add fail messages to assertions where helpful to tell students more than @testdox says.
 */
class LasagnaTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Lasagna.php';
    }

    /**
     * @testdox Returns cooking time in minutes as stated in the cook book
     * @task_id 1
     */
    public function testExpectedCookTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(40, $lasagna->expectedCookTime());
    }

    /**
     * @testdox Returns how many minutes more the lasagna must be in the oven when it is 20 minutes in the oven already
     * @task_id 2
     */
    public function testRemainingCookTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(20, $lasagna->remainingCookTime(20));
    }

    /**
     * @testdox Returns how many minutes more the lasagna must be in the oven when it is 30 minutes in the oven already
     * @task_id 2
     */
    public function testAnotherRemainingCookTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(10, $lasagna->remainingCookTime(30));
    }

    /**
     * @testdox Returns how many minutes you spent preparing the lasagna with 7 layers
     * @task_id 3
     */
    public function testTotalPreparationTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(14, $lasagna->totalPreparationTime(7));
    }

    /**
     * @testdox Returns the total minutes you have worked on the lasagna with 4 layers that is 13 minutes in the oven
     * @task_id 4
     */
    public function testTotalElapsedTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(21, $lasagna->totalElapsedTime(4, 13));
    }

    /**
     * @testdox Returns the message indicating that the lasagna is ready to eat
     * @task_id 5
     */
    public function testAlarm(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals("Ding!", $lasagna->alarm());
    }
}
