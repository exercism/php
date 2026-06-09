<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class SwiftSchedulingTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'SwiftScheduling.php';
    }

    /**
     * uuid: 1d0e6e72-f370-408c-bc64-5dafa9c6da73
     */
    #[TestDox('NOW translates to two hours later')]
    public function testNowTranslatesToTwoHoursLater(): void
    {
        $description     = "NOW";
        $meetingStart    = new DateTime("2012-02-13T09:00:00");
        $expected        = new DateTime("2012-02-13T11:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }

    /**
     * uuid: 93325e7b-677d-4d96-b017-2582af879dc2
     */
    #[TestDox('ASAP before one in the afternoon translates to today at five in the afternoon')]
    public function testAsapBeforeOneInTheAfternoonTranslatesToTodayAtFiveInTheAfternoon(): void
    {
        $description     = "ASAP";
        $meetingStart    = new DateTime("1999-06-03T09:45:00");
        $expected        = new DateTime("1999-06-03T17:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }

    /**
     * uuid: cb4252a3-c4c1-41f6-8b8c-e7269733cef8
     */
    #[TestDox('ASAP at one in the afternoon translates to tomorrow at one in the afternoon')]
    public function testAsapAtOneInTheAfternoonTranslatesToTomorrowAtOneInTheAfternoon(): void
    {
        $description     = "ASAP";
        $meetingStart    = new DateTime("2008-12-21T13:00:00");
        $expected        = new DateTime("2008-12-22T13:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }

    /**
     * uuid: 6fddc1ea-2fe9-4c60-81f7-9220d2f45537
     */
    #[TestDox('ASAP after one in the afternoon translates to tomorrow at one in the afternoon')]
    public function testAsapAfterOneInTheAfternoonTranslatesToTomorrowAtOneInTheAfternoon(): void
    {
        $description     = "ASAP";
        $meetingStart    = new DateTime("2008-12-21T14:50:00");
        $expected        = new DateTime("2008-12-22T13:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }

    /**
     * uuid: 25f46bf9-6d2a-4e95-8edd-f62dd6bc8a6e
     */
    #[TestDox('EOW on Monday translates to Friday at five in the afternoon')]
    public function testEowOnMondayTranslatesToFridayAtFiveInTheAfternoon(): void
    {
        $description     = "EOW";
        $meetingStart    = new DateTime("2025-02-03T16:00:00");
        $expected        = new DateTime("2025-02-07T17:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }

    /**
     * uuid: 0b375df5-d198-489e-acee-fd538a768616
     */
    #[TestDox('EOW on Tuesday translates to Friday at five in the afternoon')]
    public function testEowOnTuesdayTranslatesToFridayAtFiveInTheAfternoon(): void
    {
        $description     = "EOW";
        $meetingStart    = new DateTime("1997-04-29T10:50:00");
        $expected        = new DateTime("1997-05-02T17:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }

    /**
     * uuid: 4afbb881-0b5c-46be-94e1-992cdc2a8ca4
     */
    #[TestDox('EOW on Wednesday translates to Friday at five in the afternoon')]
    public function testEowOnWednesdayTranslatesToFridayAtFiveInTheAfternoon(): void
    {
        $description     = "EOW";
        $meetingStart    = new DateTime("2005-09-14T11:00:00");
        $expected        = new DateTime("2005-09-16T17:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }

    /**
     * uuid: e1341c2b-5e1b-4702-a95c-a01e8e96e510
     */
    #[TestDox('EOW on Thursday translates to Sunday at eight in the evening')]
    public function testEowOnThursdayTranslatesToSundayAtEightInTheEvening(): void
    {
        $description     = "EOW";
        $meetingStart    = new DateTime("2011-05-19T08:30:00");
        $expected        = new DateTime("2011-05-22T20:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }

    /**
     * uuid: bbffccf7-97f7-4244-888d-bdd64348fa2e
     */
    #[TestDox('EOW on Friday translates to Sunday at eight in the evening')]
    public function testEowOnFridayTranslatesToSundayAtEightInTheEvening(): void
    {
        $description     = "EOW";
        $meetingStart    = new DateTime("2022-08-05T14:00:00");
        $expected        = new DateTime("2022-08-07T20:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }

    /**
     * uuid: d651fcf4-290e-407c-8107-36b9076f39b2
     */
    #[TestDox('EOW translates to leap day')]
    public function testEowTranslatesToLeapDay(): void
    {
        $description     = "EOW";
        $meetingStart    = new DateTime("2008-02-25T10:30:00");
        $expected        = new DateTime("2008-02-29T17:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }

    /**
     * uuid: 439bf09f-3a0e-44e7-bad5-b7b6d0c4505a
     */
    #[TestDox('2M before the second month of this year translates to the first workday of the second month of this year')]
    public function testTwoMBeforeTheSecondMonthOfThisYearTranslatesToTheFirstWorkdayOfTheSecondMonthOfThisYear(): void
    {
        $description     = "2M";
        $meetingStart    = new DateTime("2007-01-02T14:15:00");
        $expected        = new DateTime("2007-02-01T08:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }

    /**
     * uuid: 86d82e83-c481-4fb4-9264-625de7521340
     */
    #[TestDox('11M in the eleventh month translates to the first workday of the eleventh month of next year')]
    public function testElevenMInTheEleventhMonthTranslatesToTheFirstWorkdayOfTheEleventhMonthOfNextYear(): void
    {
        $description     = "11M";
        $meetingStart    = new DateTime("2013-11-21T15:30:00");
        $expected        = new DateTime("2014-11-03T08:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }

    /**
     * uuid: 0d0b8f6a-1915-46f5-a630-1ff06af9da08
     */
    #[TestDox('4M in the ninth month translates to the first workday of the fourth month of next year')]
    public function testFourMInTheNinthMonthTranslatesToTheFirstWorkdayOfTheFourthMonthOfNextYear(): void
    {
        $description     = "4M";
        $meetingStart    = new DateTime("2019-11-18T15:15:00");
        $expected        = new DateTime("2020-04-01T08:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }

    /**
     * uuid: 06d401e3-8461-438f-afae-8d26aa0289e0
     */
    #[TestDox('Q1 in the first quarter translates to the last workday of the first quarter of this year')]
    public function testQOneInTheFirstQuarterTranslatesToTheLastWorkdayOfTheFirstQuarterOfThisYear(): void
    {
        $description     = "Q1";
        $meetingStart    = new DateTime("2003-01-01T10:45:00");
        $expected        = new DateTime("2003-03-31T08:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }

    /**
     * uuid: eebd5f32-b16d-4ecd-91a0-584b0364b7ed
     */
    #[TestDox('Q4 in the second quarter translates to the last workday of the fourth quarter of this year')]
    public function testQFourInTheSecondQuarterTranslatesToTheLastWorkdayOfTheFourthQuarterOfThisYear(): void
    {
        $description     = "Q4";
        $meetingStart    = new DateTime("2001-04-09T09:00:00");
        $expected        = new DateTime("2001-12-31T08:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }

    /**
     * uuid: c920886c-44ad-4d34-a156-dc4176186581
     */
    #[TestDox('Q3 in the fourth quarter translates to the last workday of the third quarter of next year')]
    public function testQThreeInTheFourthQuarterTranslatesToTheLastWorkdayOfTheThirdQuarterOfNextYear(): void
    {
        $description     = "Q3";
        $meetingStart    = new DateTime("2022-10-06T11:00:00");
        $expected        = new DateTime("2023-09-29T08:00:00");
        $swiftScheduling = new SwiftScheduling();

        $this->assertEquals($expected, $swiftScheduling->deliveryDate($meetingStart, $description));
    }
}
