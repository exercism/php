<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class SplitSecondStopwatchTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'SplitSecondStopwatch.php';
    }

    /**
     * uuid: ddb238ea-99d4-4eaa-a81d-3c917a525a23
     */
    #[TestDox('New stopwatch starts in ready state')]
    public function testNewStopwatchStartsInReadyState(): void
    {
        $stopwatch = new SplitSecondStopwatch();

        $this->assertEquals("ready", $stopwatch->state);
    }

    /**
     * uuid: b19635d4-08ad-4ac3-b87f-aca10e844071
     */
    #[TestDox("New stopwatch's current lap has no elapsed time")]
    public function testNewStopwatchSCurrentLapHasNoElapsedTime(): void
    {
        $stopwatch = new SplitSecondStopwatch();

        $this->assertEquals("00:00:00", $stopwatch->getCurrentLap());
    }

    /**
     * uuid: 492eb532-268d-43ea-8a19-2a032067d335
     */
    #[TestDox("New stopwatch's total has no elapsed time")]
    public function testNewStopwatchSTotalHasNoElapsedTime(): void
    {
        $stopwatch = new SplitSecondStopwatch();

        $this->assertEquals("00:00:00", $stopwatch->getTotal());
    }

    /**
     * uuid: 8a892c1e-9ef7-4690-894e-e155a1fe4484
     */
    #[TestDox("New stopwatch does not have previous laps")]
    public function testNewStopwatchDoesNotHavePreviousLaps(): void
    {
        $stopwatch = new SplitSecondStopwatch();

        $this->assertEquals([], $stopwatch->previousLaps);
    }

    /**
     * uuid: 5b2705b6-a584-4042-ba3a-4ab8d0ab0281
     */
    #[TestDox("Start from ready state changes state to running")]
    public function testStartFromReadyStateChangesStateToRunning(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();

        $this->assertEquals("running", $stopwatch->state);
    }

    /**
     * uuid: 748235ce-1109-440b-9898-0a431ea179b6
     */
    #[TestDox("Start does not change previous laps")]
    public function testStartDoesNotChangePreviousLaps(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();

        $this->assertEquals([], $stopwatch->previousLaps);
    }

    /**
     * uuid: 491487b1-593d-423e-a075-aa78d449ff1f
     */
    #[TestDox("Start initiates time tracking for current lap")]
    public function testStartInitiatesTimeTrackingForCurrentLap(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->advanceTime("00:00:05");

        $this->assertEquals("00:00:05", $stopwatch->getCurrentLap());
    }

    /**
     * uuid: a0a7ba2c-8db6-412c-b1b6-cb890e9b72ed
     */
    #[TestDox("Start initiates time tracking for total")]
    public function testStartInitiatesTimeTrackingForTotal(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->advanceTime("00:00:23");

        $this->assertEquals("00:00:23", $stopwatch->getTotal());
    }

    /**
     * uuid: 7f558a17-ef6d-4a5b-803a-f313af7c41d3
     */
    #[TestDox("Start cannot be called from running state")]
    public function testStartCannotBeCalledFromRunningState(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("cannot start an already running stopwatch");
        $stopwatch->start();
    }

    /**
     * uuid: 32466eef-b2be-4d60-a927-e24fce52dab9
     */
    #[TestDox("Stop from running state changes state to stopped")]
    public function testStopFromRunningStateChangesStateToStopped(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->stop();

        $this->assertEquals("stopped", $stopwatch->state);
    }

    /**
     * uuid: 621eac4c-8f43-4d99-919c-4cad776d93df
     */
    #[TestDox("Stop pauses time tracking for current lap")]
    public function testStopPausesTimeTrackingForCurrentLap(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->advanceTime("00:00:05");
        $stopwatch->stop();
        $stopwatch->advanceTime("00:00:08");

        $this->assertEquals("00:00:05", $stopwatch->getCurrentLap());
    }

    /**
     * uuid: 465bcc82-7643-41f2-97ff-5e817cef8db4
     */
    #[TestDox("Stop pauses time tracking for total")]
    public function testStopPausesTimeTrackingForTotal(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->advanceTime("00:00:13");
        $stopwatch->stop();
        $stopwatch->advanceTime("00:00:44");

        $this->assertEquals("00:00:13", $stopwatch->getTotal());
    }

    /**
     * uuid: b1ba7454-d627-41ee-a078-891b2ed266fc
     */
    #[TestDox("Stop cannot be called from ready state")]
    public function testStopCannotBeCalledFromReadyState(): void
    {
        $stopwatch = new SplitSecondStopwatch();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("cannot stop a stopwatch that is not running");
        $stopwatch->stop();
    }

    /**
     * uuid: 5c041078-0898-44dc-9d5b-8ebb5352626c
     */
    #[TestDox("Stop cannot be called from stopped state")]
    public function testStopCannotBeCalledFromStoppedState(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->stop();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("cannot stop a stopwatch that is not running");
        $stopwatch->stop();
    }

    /**
     * uuid: 3f32171d-8fbf-46b6-bc2b-0810e1ec53b7
     */
    #[TestDox("Start from stopped state changes state to running")]
    public function testStartFromStoppedStateChangesStateToRunning(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->stop();
        $stopwatch->start();

        $this->assertEquals("running", $stopwatch->state);
    }

    /**
     * uuid: 626997cb-78d5-4fe8-b501-29fdef804799
     */
    #[TestDox("Start from stopped state resumes time tracking for current lap")]
    public function testStartFromStoppedStateResumesTimeTrackingForCurrentLap(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->advanceTime("00:01:20");
        $stopwatch->stop();
        $stopwatch->advanceTime("00:00:20");
        $stopwatch->start();
        $stopwatch->advanceTime("00:00:08");

        $this->assertEquals("00:01:28", $stopwatch->getCurrentLap());
    }

    /**
     * uuid: 58487c53-ab26-471c-a171-807ef6363319
     */
    #[TestDox("Start from stopped state resumes time tracking for total")]
    public function testStartFromStoppedStateResumesTimeTrackingForTotal(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->advanceTime("00:00:23");
        $stopwatch->stop();
        $stopwatch->advanceTime("00:00:44");
        $stopwatch->start();
        $stopwatch->advanceTime("00:00:09");

        $this->assertEquals("00:00:32", $stopwatch->getTotal());
    }

    /**
     * uuid: 091966e3-ed25-4397-908b-8bb0330118f8
     */
    #[TestDox("Lap adds current lap to previous laps")]
    public function testLapAddsCurrentLapToPreviousLaps(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->advanceTime("00:01:38");
        $stopwatch->lap();

        $this->assertEquals(["00:01:38"], $stopwatch->previousLaps);

        $stopwatch->advanceTime("00:00:44");
        $stopwatch->lap();

        $this->assertEquals(["00:01:38", "00:00:44"], $stopwatch->previousLaps);
    }

    /**
     * uuid: 1aa4c5ee-a7d5-4d59-9679-419deef3c88f
     */
    #[TestDox("Lap resets current lap and resumes time tracking")]
    public function testLapResetsCurrentLapAndResumesTimeTracking(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->advanceTime("00:08:22");
        $stopwatch->lap();

        $this->assertEquals("00:00:00", $stopwatch->getCurrentLap());

        $stopwatch->advanceTime("00:00:15");

        $this->assertEquals("00:00:15", $stopwatch->getCurrentLap());
    }

    /**
     * uuid: 4b46b92e-1b3f-46f6-97d2-0082caf56e80
     */
    #[TestDox("Lap continues time tracking for total")]
    public function testLapContinuesTimeTrackingForTotal(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->advanceTime("00:00:22");
        $stopwatch->lap();
        $stopwatch->advanceTime("00:00:33");

        $this->assertEquals("00:00:55", $stopwatch->getTotal());
    }

    /**
     * uuid: ea75d36e-63eb-4f34-97ce-8c70e620bdba
     */
    #[TestDox("Lap cannot be called from ready state")]
    public function testLapCannotBeCalledFromReadyState(): void
    {
        $stopwatch = new SplitSecondStopwatch();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("cannot lap a stopwatch that is not running");
        $stopwatch->lap();
    }

    /**
     * uuid: 63731154-a23a-412d-a13f-c562f208eb1e
     */
    #[TestDox("Lap cannot be called from stopped state")]
    public function testLapCannotBeCalledFromStoppedState(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->stop();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("cannot lap a stopwatch that is not running");
        $stopwatch->lap();
    }

    /**
     * uuid: e585ee15-3b3f-4785-976b-dd96e7cc978b
     */
    #[TestDox("Stop does not change previous laps")]
    public function testStopDoesNotChangePreviousLaps(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->advanceTime("00:11:22");
        $stopwatch->lap();

        $this->assertEquals(["00:11:22"], $stopwatch->previousLaps);

        $stopwatch->stop();

        $this->assertEquals(["00:11:22"], $stopwatch->previousLaps);
    }

    /**
     * uuid: fc3645e2-86cf-4d11-97c6-489f031103f6
     */
    #[TestDox("Reset from stopped state changes state")]
    public function testResetFromStoppedStateChangesState(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->stop();
        $stopwatch->reset();

        $this->assertEquals("ready", $stopwatch->state);
    }

    /**
     * uuid: 20fbfbf7-68ad-4310-975a-f5f132886c4e
     */
    #[TestDox("Reset resets current lap")]
    public function testResetResetsCurrentLap(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->advanceTime("00:00:10");
        $stopwatch->stop();
        $stopwatch->reset();

        $this->assertEquals("00:00:00", $stopwatch->getCurrentLap());
    }

    /**
     * uuid: 00a8f7bb-dd5c-43e5-8705-3ef124007662
     */
    #[TestDox("Reset clears previous laps")]
    public function testResetClearsPreviousLaps(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->advanceTime("00:00:10");
        $stopwatch->lap();
        $stopwatch->advanceTime("00:00:20");
        $stopwatch->lap();

        $this->assertEquals(["00:00:10", "00:00:20"], $stopwatch->previousLaps);

        $stopwatch->stop();
        $stopwatch->reset();

        $this->assertEquals([], $stopwatch->previousLaps);
    }

    /**
     * uuid: 76cea936-6214-4e95-b6d1-4d4edcf90499
     */
    #[TestDox("Reset cannot be called from ready state")]
    public function testResetCannotBeCalledFromReadyState(): void
    {
        $stopwatch = new SplitSecondStopwatch();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("cannot reset a stopwatch that is not stopped");
        $stopwatch->reset();
    }

    /**
     * uuid: ba4d8e69-f200-4721-b59e-90d8cf615153
     */
    #[TestDox("Reset cannot be called from running state")]
    public function testResetCannotBeCalledFromRunningState(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("cannot reset a stopwatch that is not stopped");
        $stopwatch->reset();
    }

    /**
     * uuid: 0b01751a-cb57-493f-bb86-409de6e84306
     */
    #[TestDox("Supports very long laps")]
    public function testSupportsVeryLongLap(): void
    {
        $stopwatch = new SplitSecondStopwatch();
        $stopwatch->start();
        $stopwatch->advanceTime("01:23:45");

        $this->assertEquals("01:23:45", $stopwatch->getCurrentLap());

        $stopwatch->lap();

        $this->assertEquals(["01:23:45"], $stopwatch->previousLaps);

        $stopwatch->advanceTime("04:01:40");

        $this->assertEquals("04:01:40", $stopwatch->getCurrentLap());
        $this->assertEquals("05:25:25", $stopwatch->getTotal());

        $stopwatch->lap();

        $this->assertEquals(["01:23:45", "04:01:40"], $stopwatch->previousLaps);

        $stopwatch->advanceTime("08:43:05");

        $this->assertEquals("08:43:05", $stopwatch->getCurrentLap());
        $this->assertEquals("14:08:30", $stopwatch->getTotal());

        $stopwatch->lap();

        $this->assertEquals(["01:23:45", "04:01:40", "08:43:05"], $stopwatch->previousLaps);
    }
}
