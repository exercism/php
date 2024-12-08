<?php

declare(strict_types=1);

class ClockTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Clock.php';
    }

    /**
     * uuid a577bacc-106b-496e-9792-b3083ea8705e
     * @testdox Create a new clock with an initial time - on the hour
     */
    public function testOnTheHour(): void
    {
        $clock = new Clock(8);

        $this->assertEquals('08:00', $clock);
    }

    /**
     * uuid b5d0c360-3b88-489b-8e84-68a1c7a4fa23
     * @testdox past the hour
     */
    public function testPastTheHour(): void
    {
        $clock = new Clock(11, 9);

        $this->assertEquals('11:09', $clock);
    }

    /**
     * uuid 473223f4-65f3-46ff-a9f7-7663c7e59440
     * @testdox midnight is zero hours
     */
    public function testMidnightIsZeroHours(): void
    {
        $clock = new Clock(24, 0);
        $this->assertEquals('00:00', $clock);
    }

    /**
     * uuid ca95d24a-5924-447d-9a96-b91c8334725c
     * @testdox hour rolls over
     */
    public function testHourRollsOver(): void
    {
        $clock = new Clock(25, 0);
        $this->assertEquals('01:00', $clock);
    }

    /**
     * uuid f3826de0-0925-4d69-8ac8-89aea7e52b78
     * @testdox hour rolls over continuously
     */
    public function testHourRollsOverContinuously(): void
    {
        $clock = new Clock(100, 0);
        $this->assertEquals('04:00', $clock);
    }

    /**
     * uuid a02f7edf-dfd4-4b11-b21a-86de3cc6a95c
     * @testdox sixty minutes is next hour
     */
    public function testSixtyMinutesIsNextHour(): void
    {
        $clock = new Clock(1, 60);
        $this->assertEquals('02:00', $clock);
    }

    /**
     * uuid 8f520df6-b816-444d-b90f-8a477789beb5
     * @testdox minutes roll over
     */
    public function testMinutesRollOver(): void
    {
        $clock = new Clock(0, 160);
        $this->assertEquals('02:40', $clock);
    }

    /**
     * uuid c75c091b-47ac-4655-8d40-643767fc4eed
     * @testdox minutes roll over continuously
     */
    public function testMinutesRollOverContinuously(): void
    {
        $clock = new Clock(0, 1723);
        $this->assertEquals('04:43', $clock);
    }

    /**
     * uuid 06343ecb-cf39-419d-a3f5-dcbae0cc4c57
     * @testdox hour and minutes roll over
     */
    public function testHourAndMinutesRollOver(): void
    {
        $clock = new Clock(25, 160);
        $this->assertEquals('03:40', $clock);
    }

    /**
     * uuid be60810e-f5d9-4b58-9351-a9d1e90e660c
     * @testdox hour and minutes roll over continuously
     */
    public function testHourAndMinutesRollOverContinuously(): void
    {
        $clock = new Clock(201, 3001);
        $this->assertEquals('11:01', $clock);
    }


    /**
     * uuid 1689107b-0b5c-4bea-aad3-65ec9859368a
     * @testdox hour and minutes roll over to exactly midnight
     */
    public function testHourAndMinutesRollOverToExactlyMidnight(): void
    {
        $clock = new Clock(72, 8640);
        $this->assertEquals('00:00', $clock);
    }

    /**
     * uuid d3088ee8-91b7-4446-9e9d-5e2ad6219d91
     * @testdox negative hour
     */
    public function testNegativeHour(): void
    {
        $clock = new Clock(-1, 15);
        $this->assertEquals('23:15', $clock);
    }

    /**
     * uuid 77ef6921-f120-4d29-bade-80d54aa43b54
     * @testdox negative hour rolls over
     */
    public function testNegativeHourRollsOver(): void
    {
        $clock = new Clock(-25, 0);
        $this->assertEquals('23:00', $clock);
    }

    /**
     * uuid 359294b5-972f-4546-bb9a-a85559065234
     * @testdox negative hour rolls over continuously
     */
    public function testNegativeHourRollsOverContinuously(): void
    {
        $clock = new Clock(-91, 0);
        $this->assertEquals('05:00', $clock);
    }

    /**
     * uuid 509db8b7-ac19-47cc-bd3a-a9d2f30b03c0
     * @testdox negative minutes
     */
    public function testNegativeMinutes(): void
    {
        $clock = new Clock(1, -40);
        $this->assertEquals('00:20', $clock);
    }

    /**
     * uuid 5d6bb225-130f-4084-84fd-9e0df8996f2a
     * @testdox negative minutes roll over
     */
    public function testNegativeMinutesRollOver(): void
    {
        $clock = new Clock(1, -160);
        $this->assertEquals('22:20', $clock);
    }

    /**
     * uuid d483ceef-b520-4f0c-b94a-8d2d58cf0484
     * @testdox negative minutes roll over continuously
     */
    public function testNegativeMinutesRollOverContinuously(): void
    {
        $clock = new Clock(1, -4820);
        $this->assertEquals('16:40', $clock);
    }

    /**
     * uuid 1cd19447-19c6-44bf-9d04-9f8305ccb9ea
     * @testdox negative sixty minutes is previous hour
     */
    public function testNegativeSixtyMinutesIsPreviousHour(): void
    {
        $clock = new Clock(2, -60);
        $this->assertEquals('01:00', $clock);
    }

    /**
     * uuid 9d3053aa-4f47-4afc-bd45-d67a72cef4dc
     * @testdox negative hour and minutes both roll over
     */
    public function testNegativeHourAndMinutesBothRollOver(): void
    {
        $clock = new Clock(-25, -160);
        $this->assertEquals('20:20', $clock);
    }

    /**
     * uuid 51d41fcf-491e-4ca0-9cae-2aa4f0163ad4
     * @testdox negative hour and minutes both roll over continuously
     */
    public function testNegativeHourAndMinutesBothRollOverContinuously(): void
    {
        $clock = new Clock(-121, -5810);
        $this->assertEquals('22:10', $clock);
    }


    /**
     * uuid d098e723-ad29-4ef9-997a-2693c4c9d89a
     * @testdox Add minutes - add minutes
     */
    public function testAddMinutes()
    {
        $clock = new Clock(10, 0);
        $clock = $clock->add(3);
        $this->assertEquals("10:03", $clock);
    }

    /**
     * uuid b6ec8f38-e53e-4b22-92a7-60dab1f485f4
     * @testdox Add no minutes
     */
    public function testAddNoMinutes()
    {
        $clock = new Clock(6, 41);
        $clock = $clock->add(0);
        $this->assertEquals("06:41", $clock);
    }

    /**
     * uuid efd349dd-0785-453e-9ff8-d7452a8e7269
     * @testdox Add to next hour
     */
    public function testAddToNextHour()
    {
        $clock = new Clock(0, 45);
        $clock = $clock->add(40);
        $this->assertEquals("01:25", $clock);
    }

    /**
     * uuid 749890f7-aba9-4702-acce-87becf4ef9fe
     * @testdox Add more than one hour
     */
    public function testAddMoreThanOneHour()
    {
        $clock = new Clock(10, 0);
        $clock = $clock->add(61);
        $this->assertEquals("11:01", $clock);
    }

    /**
     * uuid da63e4c1-1584-46e3-8d18-c9dc802c1713
     * @testdox Add more than two hours with carry
     */
    public function testAddMoreThanTwoHoursWithCarry()
    {
        $clock = new Clock(0, 45);
        $clock = $clock->add(160);
        $this->assertEquals("03:25", $clock);
    }

    /**
     * uuid be167a32-3d33-4cec-a8bc-accd47ddbb71
     * @testdox Add across midnight
     */
    public function testAddAcrossMidnight()
    {
        $clock = new Clock(23, 59);
        $clock = $clock->add(2);
        $this->assertEquals("00:01", $clock);
    }

    /**
     * uuid 6672541e-cdae-46e4-8be7-a820cc3be2a8
     * @testdox Add more than one day (1500 min = 25 hrs)
     */
    public function testAddMoreThanOneDay()
    {
        $clock = new Clock(5, 32);
        $clock = $clock->add(1500);
        $this->assertEquals("06:32", $clock);
    }

    /**
     * uuid 1918050d-c79b-4cb7-b707-b607e2745c7e
     * @testdox Add more than two days
     */
    public function testAddMoreThanTwoDays()
    {
        $clock = new Clock(1, 1);
        $clock = $clock->add(3500);
        $this->assertEquals("11:21", $clock);
    }

    /**
     * uuid 37336cac-5ede-43a5-9026-d426cbe40354
     * @testdox subtract minutes
     */
    public function testSubtractMinutes(): void
    {
        $clock = new Clock(10, 3);
        $clock = $clock->sub(3);
        $this->assertEquals("10:00", $clock);
    }

    /**
     * uuid 0aafa4d0-3b5f-4b12-b3af-e3a9e09c047b
     * @testdox subtract to previous hour
     */
    public function testSubtractToPreviousHour(): void
    {
        $clock = new Clock(10, 3);
        $clock = $clock->sub(30);
        $this->assertEquals("09:33", $clock);
    }

    /**
     * uuid 9b4e809c-612f-4b15-aae0-1df0acb801b9
     * @testdox subtract more than an hour
     */
    public function testSubtractMoreThanAnHour(): void
    {
        $clock = new Clock(10, 3);
        $clock = $clock->sub(70);
        $this->assertEquals("08:53", $clock);
    }

    /**
     * uuid 8b04bb6a-3d33-4e6c-8de9-f5de6d2c70d6
     * @testdox subtract across midnight
     */
    public function testSubtractAcrossMidnight(): void
    {
        $clock = new Clock(0, 3);
        $clock = $clock->sub(4);
        $this->assertEquals("23:59", $clock);
    }

    /**
     * uuid 07c3bbf7-ce4d-4658-86e8-4a77b7a5ccd9
     * @testdox subtract more than two hours
     */
    public function testSubtractMoreThanTwoHours(): void
    {
        $clock = new Clock(0, 0);
        $clock = $clock->sub(160);
        $this->assertEquals("21:20", $clock);
    }

    /**
     * uuid 90ac8a1b-761c-4342-9c9c-cdc3ed5db097
     * @testdox subtract more than two hours with borrow
     */
    public function testSubtractMoreThanTwoHoursWithBorrow(): void
    {
        $clock = new Clock(6, 15);
        $clock = $clock->sub(160);
        $this->assertEquals("03:35", $clock);
    }

    /**
     * uuid 2149f985-7136-44ad-9b29-ec023a97a2b7
     * @testdox subtract more than one day (1500 min = 25 hrs)
     */
    public function testSubtractMoreThanOneDay(): void
    {
        $clock = new Clock(5, 32);
        $clock = $clock->sub(1500);
        $this->assertEquals("04:32", $clock);
    }

    /**
     * uuid ba11dbf0-ac27-4acb-ada9-3b853ec08c97
     * @testdox subtract more than two days
     */
    public function testSubtractMoreThanTwoDays(): void
    {
        $clock = new Clock(2, 20);
        $clock = $clock->sub(3000);
        $this->assertEquals("00:20", $clock);
    }

    /**
     * uuid f2fdad51-499f-4c9b-a791-b28c9282e311
     * @testdox clocks with same time
     */
    public function testClocksWithSameTime(): void
    {
        $this->assertEquals(new Clock(15, 37), new Clock(15, 37));
    }

    /**
     * uuid 5d409d4b-f862-4960-901e-ec430160b768
     * @testdox clocks a minute apart
     */
    public function testClocksAMinuteApart(): void
    {
        $this->assertNotEquals(new Clock(15, 36), new Clock(15, 37));
    }

    /**
     * uuid a6045fcf-2b52-4a47-8bb2-ef10a064cba5
     * @testdox clocks an hour apart
     */
    public function testClocksAnHourApart(): void
    {
        $this->assertNotEquals(new Clock(14, 37), new Clock(15, 37));
    }

    /**
     * uuid 66b12758-0be5-448b-a13c-6a44bce83527
     * @testdox clocks with hour overflow
     */
    public function testClocksWithHourOverflow(): void
    {
        $this->assertEquals(new Clock(10, 37), new Clock(34, 37));
    }

    /**
     * uuid 2b19960c-212e-4a71-9aac-c581592f8111
     * @testdox clocks with hour overflow by several days
     */
    public function testClocksWithHourOverflowBySeveralDays(): void
    {
        $this->assertEquals(new Clock(3, 11), new Clock(99, 11));
    }

    /**
     * uuid 6f8c6541-afac-4a92-b0c2-b10d4e50269f
     * @testdox clocks with negative hour
     */
    public function testClocksWithNegativeHour(): void
    {
        $this->assertEquals(new Clock(22, 40), new Clock(-2, 40));
    }

    /**
     * uuid bb9d5a68-e324-4bf5-a75e-0e9b1f97a90d
     * @testdox clocks with negative hour that wraps
     */
    public function testClocksWithNegativeHourThatWraps(): void
    {
        $this->assertEquals(new Clock(17, 3), new Clock(-31, 3));
    }

    /**
     * uuid 56c0326d-565b-4d19-a26f-63b3205778b7
     * @testdox clocks with negative hour that wraps multiple times
     */
    public function testClocksWithNegativeHourThatWrapsMultipleTimes(): void
    {
        $this->assertEquals(new Clock(13, 49), new Clock(-83, 49));
    }

    /**
     * uuid c90b9de8-ddff-4ffe-9858-da44a40fdbc2
     * @testdox clocks with minute overflow
     */
    public function testClocksWithMinuteOverflow(): void
    {
        $this->assertEquals(new Clock(0, 1), new Clock(0, 1441));
    }

    /**
     * uuid 533a3dc5-59a7-491b-b728-a7a34fe325de
     * @testdox clocks with minute overflow by several days
     */
    public function testClocksWithMinuteOverflowBySeveralDays(): void
    {
        $this->assertEquals(new Clock(2, 2), new Clock(2, 4322));
    }

    /**
     * uuid fff49e15-f7b7-4692-a204-0f6052d62636
     * @testdox clocks with negative minute
     */
    public function testClocksWithNegativeMinute(): void
    {
        $this->assertEquals(new Clock(2, 40), new Clock(3, -20));
    }

    /**
     * uuid 605c65bb-21bd-43eb-8f04-878edf508366
     * @testdox clocks with negative minute that wraps
     */
    public function testClocksWithNegativeMinuteThatWraps(): void
    {
        $this->assertEquals(new Clock(4, 10), new Clock(5, -1490));
    }

    /**
     * uuid b87e64ed-212a-4335-91fd-56da8421d077
     * @testdox clocks with negative minute that wraps multiple times
     */
    public function testClocksWithNegativeMinuteThatWrapsMultipleTimes(): void
    {
        $this->assertEquals(new Clock(6, 15), new Clock(6, -4305));
    }

    /**
     * uuid 822fbf26-1f3b-4b13-b9bf-c914816b53dd
     * @testdox clocks with negative hours and minutes
     */
    public function testClocksWithNegativeHoursAndMinutes(): void
    {
        $this->assertEquals(new Clock(7, 32), new Clock(-12, -268));
    }

    /**
     * uuid e787bccd-cf58-4a1d-841c-ff80eaaccfaa
     * @testdox clocks with negative hours and minutes that wrap
     */
    public function testClocksWithNegativeHoursAndMinutesThatWrap(): void
    {
        $this->assertEquals(new Clock(18, 7), new Clock(-54, -11513));
    }

    /**
     * uuid 96969ca8-875a-48a1-86ae-257a528c44f5
     * @testdox full clock and zeroed clock
     */
    public function testFullClockAndZeroedClock(): void
    {
        $this->assertEquals(new Clock(24, 0), new Clock(0, 0));
    }
}
