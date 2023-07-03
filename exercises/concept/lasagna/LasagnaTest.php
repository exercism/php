<?php

declare(strict_types=1);

class LasagnaTest extends PHPUnit\Framework\TestCase
{
    public function testExpectedCookTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(40, $lasagna->getExpectedCookTime());
    }

    public function testRemainingCookTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(10, $lasagna->remainingCookTime(30));
        $this->assertEquals(20, $lasagna->remainingCookTime(20));
    }

    public function testTotalPreparationTime(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(14, $lasagna->totalPreparationTime(7));
    }

    public function testTotalElapsedTime($layers_to_prep, $elapsed_minutes): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals(21, $lasagna->totalElapsedTime(4, 13));
    }

    public function testAlarm(): void
    {
        $lasagna = new Lasagna();
        $this->assertEquals("Ding!", $lasagna->alarm());
    }
}
