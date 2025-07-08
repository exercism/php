<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

/**
 * We use `assertEquals()` here for its loose type checking. We don't care if
 * the student returns numeric strings or integers in this exercise.
 *
 * - Please use `assertSame()` whenever possible. Add a comment when it is not possible.
 * - Do not use calls with named arguments.
 *   Use them only when the exercise requires named arguments (e.g. because the exercise is about named arguments).
 *   Named arguments are in the way of defining argument names the students want (e.g. in their native language).
 * - Add `#[TestDox()]` with a useful test title, e.g. the task heading from `instructions.md`.
 *   The online editor shows that to students.
 * - Add fail messages to assertions where helpful to tell students more than `#[TestDox()]` says.
 */
class LasagnaTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Lasagna.php';
    }

    /**
     * @task_id 1
     */
    #[TestDox('Returns cooking time in minutes as stated in the cook book')]
    public function testExpectedCookTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(40, $lasagna->expectedCookTime());
    }

    /**
     * @task_id 2
     */
    #[TestDox('Returns how many minutes more the lasagna must be in the oven when it is 20 minutes in the oven already')]
    public function testRemainingCookTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(20, $lasagna->remainingCookTime(20));
    }

    /**
     * @task_id 2
     */
    #[TestDox('Returns how many minutes more the lasagna must be in the oven when it is 30 minutes in the oven already')]
    public function testAnotherRemainingCookTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(10, $lasagna->remainingCookTime(30));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Returns how many minutes you spent preparing the lasagna with 7 layers')]
    public function testTotalPreparationTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(14, $lasagna->totalPreparationTime(7));
    }

    /**
     * @task_id 4
     */
    #[TestDox('Returns the total minutes you have worked on the lasagna with 4 layers that is 13 minutes in the oven')]
    public function testTotalElapsedTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(21, $lasagna->totalElapsedTime(4, 13));
    }

    /**
     * @task_id 5
     */
    #[TestDox('Returns the message indicating that the lasagna is ready to eat')]
    public function testAlarm(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals("Ding!", $lasagna->alarm());
    }
}
