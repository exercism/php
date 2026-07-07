<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class BafflingBirthdaysTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'BafflingBirthdays.php';
    }

    /**
     * uuid: 716dcc2b-8fe4-4fc9-8c48-cbe70d8e6b67
     */
    #[TestDox('Shared birthday -> One birthdate')]
    public function testSharedBirthdayOneBirthdate(): void
    {
        $birthdays = new BafflingBirthdays();
        $this->assertFalse($birthdays->sharedBirthday(["2000-01-01"]));
    }

    /**
     * uuid: f7b3eb26-bcfc-4c1e-a2de-af07afc33f45
     */
    #[TestDox('Shared birthday -> Two birthdates with same year, month, and day')]
    public function testSharedBirthdayTwoBirthdatesWithSameYearMonthAndDay(): void
    {
        $birthdays = new BafflingBirthdays();
        $this->assertTrue($birthdays->sharedBirthday(["2000-01-01", "2000-01-01"]));
    }

    /**
     * uuid: 7193409a-6e16-4bcb-b4cc-9ffe55f79b25
     */
    #[TestDox('Shared birthday -> Two birthdates with same year and month, but different day')]
    public function testSharedBirthdayTwoBirthdatesWithSameYearAndMonthButDifferentDay(): void
    {
        $birthdays = new BafflingBirthdays();
        $this->assertFalse($birthdays->sharedBirthday(["2012-05-09", "2012-05-17"]));
    }

    /**
     * uuid: d04db648-121b-4b72-93e8-d7d2dced4495
     */
    #[TestDox('Shared birthday -> Two birthdates with same month and day, but different year')]
    public function testSharedBirthdayTwoBirthdatesWithSameMonthAndDayButDifferentYear(): void
    {
        $birthdays = new BafflingBirthdays();
        $this->assertTrue($birthdays->sharedBirthday(["1999-10-23", "1988-10-23"]));
    }

    /**
     * uuid: 3c8bd0f0-14c6-4d4c-975a-4c636bfdc233
     */
    #[TestDox('Shared birthday -> Two birthdates with same year, but different month and day')]
    public function testSharedBirthdayTwoBirthdatesWithSameYearButDifferentMonthAndDay(): void
    {
        $birthdays = new BafflingBirthdays();
        $this->assertFalse($birthdays->sharedBirthday(["2007-12-19", "2007-04-27"]));
    }

    /**
     * uuid: df5daba6-0879-4480-883c-e855c99cdaa3
     */
    #[TestDox('Shared birthday -> Two birthdates with different year, month, and day')]
    public function testSharedBirthdayTwoBirthdatesWithDifferentYearMonthAndDay(): void
    {
        $birthdays = new BafflingBirthdays();
        $this->assertFalse($birthdays->sharedBirthday(["1997-08-04", "1963-11-23"]));
    }

    /**
     * uuid: 0c17b220-cbb9-4bd7-872f-373044c7b406
     */
    #[TestDox('Shared birthday -> Multiple birthdates without shared birthday')]
    public function testSharedBirthdayMultipleBirthdatesWithoutSharedBirthday(): void
    {
        $birthdays = new BafflingBirthdays();
        $this->assertFalse(
            $birthdays->sharedBirthday([
                "1966-07-29",
                "1977-02-12",
                "2001-12-25",
                "1980-11-10"
            ])
        );
    }

    /**
     * uuid: 966d6b0b-5c0a-4b8c-bc2d-64939ada49f8
     */
    #[TestDox('Shared birthday -> Multiple birthdates with one shared birthday')]
    public function testSharedBirthdayMultipleBirthdatesWithOneSharedBirthday(): void
    {
        $birthdays = new BafflingBirthdays();
        $this->assertTrue(
            $birthdays->sharedBirthday([
                "1966-07-29",
                "1977-02-12",
                "2001-07-29",
                "1980-11-10"
            ])
        );
    }

    /**
     * uuid: b7937d28-403b-4500-acce-4d9fe3a9620d
     */
    #[TestDox('Shared birthday -> Multiple birthdates with more than one shared birthday')]
    public function testSharedBirthdayMultipleBirthdatesWithMoreThanOneSharedBirthday(): void
    {
        $birthdays = new BafflingBirthdays();
        $this->assertTrue(
            $birthdays->sharedBirthday([
                "1966-07-29",
                "1977-02-12",
                "2001-12-25",
                "1980-07-29",
                "2019-02-12"
            ])
        );
    }

    /**
     * uuid: 70b38cea-d234-4697-b146-7d130cd4ee12
     */
    #[TestDox('Random birthdates -> Generate requested number of birthdates')]
    public function testRandomBirthdatesGenerateRequestedNumberOfBirthdates(): void
    {
        $generate  = rand(100, 1000);
        $birthdays = new BafflingBirthdays();

        $this->assertCount($generate, $birthdays->randomBirthdates($generate));
    }

    /**
     * uuid: d9d5b7d3-5fea-4752-b9c1-3fcd176d1b03
     */
    #[TestDox('Random birthdates -> Years are not leap years')]
    public function testRandomBirthdatesYearsAreNotLeapYears(): void
    {
        $generate            = 1000;
        $birthdays           = new BafflingBirthdays();
        $generatedBirthdates = $birthdays->randomBirthdates($generate);

        foreach ($generatedBirthdates as $birthdate) {
            $isLeapYear = (new DateTime($birthdate))->format('L') === '1';
            $this->assertFalse($isLeapYear);
        }
    }

    /**
     * uuid: d1074327-f68c-4c8a-b0ff-e3730d0f0521
     */
    #[TestDox('Random birthdates -> Months are random')]
    public function testRandomBirthdatesMonthsAreRandom(): void
    {
        $generate            = 1000;
        $birthdays           = new BafflingBirthdays();
        $months              = [];
        $generatedBirthdates = $birthdays->randomBirthdates($generate);

        foreach ($generatedBirthdates as $birthdate) {
            $checkMonth = substr($birthdate, 5, -3);
            $months[$checkMonth] = ($months[$checkMonth] ?? 0) + 1;
        }
        $this->assertCount(12, $months);
    }

    /**
     * uuid: 7df706b3-c3f5-471d-9563-23a4d0577940
     */
    #[TestDox('Random birthdates -> Days are random')]
    public function testRandomBirthdatesDaysAreRandom(): void
    {
        $generate            = 1000;
        $birthdays           = new BafflingBirthdays();
        $days                = [];
        $generatedBirthdates = $birthdays->randomBirthdates($generate);

        foreach ($generatedBirthdates as $birthdate) {
            $checkDay = substr($birthdate, -2);
            $days[$checkDay] = ($days[$checkDay] ?? 0) + 1;
        }
        $this->assertCount(31, $days);
    }

    /**
     * uuid: 89a462a4-4265-4912-9506-fb027913f221
     */
    #[TestDox('Estimated probability of at least one shared birthday -> For one person')]
    public function testEstimatedProbabilityOfAtLeastOneSharedBirthdayForOnePerson(): void
    {
        $birthdays = new BafflingBirthdays();
        $this->assertEqualsWithDelta(
            0.0,
            $birthdays->estimatedProbabilityOfSharedBirthday(1),
            2
        );
    }

    /**
     * uuid: ec31c787-0ebb-4548-970c-5dcb4eadfb5f
     */
    #[TestDox('Estimated probability of at least one shared birthday -> Among ten people')]
    public function testEstimatedProbabilityOfAtLeastOneSharedBirthdayAmongTenPeople(): void
    {
        $birthdays = new BafflingBirthdays();
        $this->assertEqualsWithDelta(
            11.694818,
            $birthdays->estimatedProbabilityOfSharedBirthday(10),
            2
        );
    }

    /**
     * uuid: b548afac-a451-46a3-9bb0-cb1f60c48e2f
     */
    #[TestDox('Estimated probability of at least one shared birthday -> Among twenty-three people')]
    public function testEstimatedProbabilityOfAtLeastOneSharedBirthdayAmongTwentyThreePeople(): void
    {
        $birthdays = new BafflingBirthdays();
        $this->assertEqualsWithDelta(
            50.729723,
            $birthdays->estimatedProbabilityOfSharedBirthday(23),
            3
        );
    }

    /**
     * uuid: b548afac-a451-46a3-9bb0-cb1f60c48e2f
     */
    #[TestDox('Estimated probability of at least one shared birthday -> Among seventy people')]
    public function testEstimatedProbabilityOfAtLeastOneSharedBirthdayAmongSeventyPeople(): void
    {
        $birthdays = new BafflingBirthdays();
        $this->assertEqualsWithDelta(
            99.915958,
            $birthdays->estimatedProbabilityOfSharedBirthday(70),
            2
        );
    }
}
