<?php

declare(strict_types=1);

class LasagnaTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Lasagna.php';
    }

    /**
     * @testdox Returns cooking time in minutes is as stated in the cook book
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
        $this->assertEquals(20, $lasagna->remainingCookTime(elapsed_minutes: 20));
    }

    /**
     * @testdox Returns how many minutes more the lasagna must be in the oven when it is 30 minutes in the oven already
     * @task_id 2
     */
    public function testAnotherRemainingCookTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(10, $lasagna->remainingCookTime(elapsed_minutes: 30));
    }

    /**
     * @testdox Returns how many minutes you spent preparing the lasagna
     * @task_id 3
     */
    public function testTotalPreparationTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(14, $lasagna->totalPreparationTime(layers_to_prep: 7));
    }

    /**
     * @testdox Returns how many minutes in total you've worked on cooking the lasagna
     * @task_id 4
     */
    public function testTotalElapsedTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(21, $lasagna->totalElapsedTime(layers_to_prep: 4, elapsed_minutes: 13));
    }

    /**
     * @testdox Returns message indicating that the lasagna is ready to eat
     * @task_id 5
     */
    public function testAlarm(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals("Ding!", $lasagna->alarm());
    }
}
