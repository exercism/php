<?php

declare(strict_types=1);

class LasagnaTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Lasagna.php';
    }

    /** @task_id 1 */
    public function testExpectedCookTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(40, $lasagna->expectedCookTime());
    }

    /** @task_id 2 */
    public function testRemainingCookTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(20, $lasagna->remainingCookTime(20));
    }

    /** @task_id 2 */
    public function testAnotherRemainingCookTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(10, $lasagna->remainingCookTime(30));
    }

    /** @task_id 3 */
    public function testTotalPreparationTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(14, $lasagna->totalPreparationTime(7));
    }

    /** @task_id 4 */
    public function testTotalElapsedTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(21, $lasagna->totalElapsedTime(4, 13));
    }

    /** @task_id 5 */
    public function testAlarm(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals("Ding!", $lasagna->alarm());
    }
}
