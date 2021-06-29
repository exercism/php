<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class MeetupTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Meetup.php';
    }

    public function testMonteenthOfMay2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/5/13"), meetup_day(2013, "5", "teenth", "Monday"));
    }

    public function testMonteenthOfAugust2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/8/19"), meetup_day(2013, "8", "teenth", "Monday"));
    }

    public function testMonteenthOfSeptember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/9/16"), meetup_day(2013, "9", "teenth", "Monday"));
    }

    public function testTuesteenthOfMarch2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/3/19"), meetup_day(2013, "3", "teenth", "Tuesday"));
    }

    public function testTuesteenthOfApril2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/4/16"), meetup_day(2013, "4", "teenth", "Tuesday"));
    }

    public function testTuesteenthOfAugust2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/8/13"), meetup_day(2013, "8", "teenth", "Tuesday"));
    }

    public function testWednesteenthOfJanuary2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/1/16"), meetup_day(2013, "1", "teenth", "Wednesday"));
    }

    public function testWednesteenthOfFebruary2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/2/13"), meetup_day(2013, "2", "teenth", "Wednesday"));
    }

    public function testWednesteenthOfJune2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/6/19"), meetup_day(2013, "6", "teenth", "Wednesday"));
    }

    public function testThursteenthOfMay2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/5/16"), meetup_day(2013, "5", "teenth", "Thursday"));
    }

    public function testThursteenthOfJune2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/6/13"), meetup_day(2013, "6", "teenth", "Thursday"));
    }

    public function testThursteenthOfSeptember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/9/19"), meetup_day(2013, "9", "teenth", "Thursday"));
    }

    public function testFriteenthOfApril2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/4/19"), meetup_day(2013, "4", "teenth", "Friday"));
    }

    public function testFriteenthOfAugust2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/8/16"), meetup_day(2013, "8", "teenth", "Friday"));
    }

    public function testFriteenthOfSeptember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/9/13"), meetup_day(2013, "9", "teenth", "Friday"));
    }

    public function testSaturteenthOfFebruary2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/2/16"), meetup_day(2013, "2", "teenth", "Saturday"));
    }

    public function testSaturteenthOfApril2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/4/13"), meetup_day(2013, "4", "teenth", "Saturday"));
    }

    public function testSaturteenthOfOctober2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/10/19"), meetup_day(2013, "10", "teenth", "Saturday"));
    }

    public function testSunteenthOfMay2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/5/19"), meetup_day(2013, "5", "teenth", "Sunday"));
    }

    public function testSunteenthOfJune2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/6/16"), meetup_day(2013, "6", "teenth", "Sunday"));
    }

    public function testSunteenthOfOctober2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/10/13"), meetup_day(2013, "10", "teenth", "Sunday"));
    }

    public function testFirstMondayOfMarch2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/3/4"), meetup_day(2013, "3", "first", "Monday"));
    }

    public function testFirstMondayOfApril2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/4/1"), meetup_day(2013, "4", "first", "Monday"));
    }

    public function testFirstTuesdayOfMay2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/5/7"), meetup_day(2013, "5", "first", "Tuesday"));
    }

    public function testFirstTuesdayOfJune2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/6/4"), meetup_day(2013, "6", "first", "Tuesday"));
    }

    public function testFirstWednesdayOfJuly2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/7/3"), meetup_day(2013, "7", "first", "Wednesday"));
    }

    public function testFirstWednesdayOfAugust2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/8/7"), meetup_day(2013, "8", "first", "Wednesday"));
    }

    public function testFirstThursdayOfSeptember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/9/5"), meetup_day(2013, "9", "first", "Thursday"));
    }

    public function testFirstThursdayOfOctober2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/10/3"), meetup_day(2013, "10", "first", "Thursday"));
    }

    public function testFirstFridayOfNovember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/11/1"), meetup_day(2013, "11", "first", "Friday"));
    }

    public function testFirstFridayOfDecember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/12/6"), meetup_day(2013, "12", "first", "Friday"));
    }

    public function testFirstSaturdayOfJanuary2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/1/5"), meetup_day(2013, "1", "first", "Saturday"));
    }

    public function testFirstSaturdayOfFebruary2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/2/2"), meetup_day(2013, "2", "first", "Saturday"));
    }

    public function testFirstSundayOfMarch2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/3/3"), meetup_day(2013, "3", "first", "Sunday"));
    }

    public function testFirstSundayOfApril2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/4/7"), meetup_day(2013, "4", "first", "Sunday"));
    }

    public function testSecondMondayOfMarch2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/3/11"), meetup_day(2013, "3", "second", "Monday"));
    }

    public function testSecondMondayOfApril2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/4/8"), meetup_day(2013, "4", "second", "Monday"));
    }

    public function testSecondTuesdayOfMay2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/5/14"), meetup_day(2013, "5", "second", "Tuesday"));
    }

    public function testSecondTuesdayOfJune2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/6/11"), meetup_day(2013, "6", "second", "Tuesday"));
    }

    public function testSecondWednesdayOfJuly2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/7/10"), meetup_day(2013, "7", "second", "Wednesday"));
    }

    public function testSecondWednesdayOfAugust2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/8/14"), meetup_day(2013, "8", "second", "Wednesday"));
    }

    public function testSecondThursdayOfSeptember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/9/12"), meetup_day(2013, "9", "second", "Thursday"));
    }

    public function testSecondThursdayOfOctober2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/10/10"), meetup_day(2013, "10", "second", "Thursday"));
    }

    public function testSecondFridayOfNovember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/11/8"), meetup_day(2013, "11", "second", "Friday"));
    }

    public function testSecondFridayOfDecember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/12/13"), meetup_day(2013, "12", "second", "Friday"));
    }

    public function testSecondSaturdayOfJanuary2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/1/12"), meetup_day(2013, "1", "second", "Saturday"));
    }

    public function testSecondSaturdayOfFebruary2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/2/9"), meetup_day(2013, "2", "second", "Saturday"));
    }

    public function testSecondSundayOfMarch2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/3/10"), meetup_day(2013, "3", "second", "Sunday"));
    }

    public function testSecondSundayOfApril2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/4/14"), meetup_day(2013, "4", "second", "Sunday"));
    }

    public function testThirdMondayOfMarch2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/3/18"), meetup_day(2013, "3", "third", "Monday"));
    }

    public function testThirdMondayOfApril2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/4/15"), meetup_day(2013, "4", "third", "Monday"));
    }

    public function testThirdTuesdayOfMay2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/5/21"), meetup_day(2013, "5", "third", "Tuesday"));
    }

    public function testThirdTuesdayOfJune2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/6/18"), meetup_day(2013, "6", "third", "Tuesday"));
    }

    public function testThirdWednesdayOfJuly2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/7/17"), meetup_day(2013, "7", "third", "Wednesday"));
    }

    public function testThirdWednesdayOfAugust2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/8/21"), meetup_day(2013, "8", "third", "Wednesday"));
    }

    public function testThirdThursdayOfSeptember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/9/19"), meetup_day(2013, "9", "third", "Thursday"));
    }

    public function testThirdThursdayOfOctober2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/10/17"), meetup_day(2013, "10", "third", "Thursday"));
    }

    public function testThirdFridayOfNovember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/11/15"), meetup_day(2013, "11", "third", "Friday"));
    }

    public function testThirdFridayOfDecember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/12/20"), meetup_day(2013, "12", "third", "Friday"));
    }

    public function testThirdSaturdayOfJanuary2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/1/19"), meetup_day(2013, "1", "third", "Saturday"));
    }

    public function testThirdSaturdayOfFebruary2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/2/16"), meetup_day(2013, "2", "third", "Saturday"));
    }

    public function testThirdSundayOfMarch2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/3/17"), meetup_day(2013, "3", "third", "Sunday"));
    }

    public function testThirdSundayOfApril2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/4/21"), meetup_day(2013, "4", "third", "Sunday"));
    }

    public function testFourthMondayOfMarch2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/3/25"), meetup_day(2013, "3", "fourth", "Monday"));
    }

    public function testFourthMondayOfApril2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/4/22"), meetup_day(2013, "4", "fourth", "Monday"));
    }

    public function testFourthTuesdayOfMay2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/5/28"), meetup_day(2013, "5", "fourth", "Tuesday"));
    }

    public function testFourthTuesdayOfJune2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/6/25"), meetup_day(2013, "6", "fourth", "Tuesday"));
    }

    public function testFourthWednesdayOfJuly2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/7/24"), meetup_day(2013, "7", "fourth", "Wednesday"));
    }

    public function testFourthWednesdayOfAugust2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/8/28"), meetup_day(2013, "8", "fourth", "Wednesday"));
    }

    public function testFourthThursdayOfSeptember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/9/26"), meetup_day(2013, "9", "fourth", "Thursday"));
    }

    public function testFourthThursdayOfOctober2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/10/24"), meetup_day(2013, "10", "fourth", "Thursday"));
    }

    public function testFourthFridayOfNovember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/11/22"), meetup_day(2013, "11", "fourth", "Friday"));
    }

    public function testFourthFridayOfDecember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/12/27"), meetup_day(2013, "12", "fourth", "Friday"));
    }

    public function testFourthSaturdayOfJanuary2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/1/26"), meetup_day(2013, "1", "fourth", "Saturday"));
    }

    public function testFourthSaturdayOfFebruary2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/2/23"), meetup_day(2013, "2", "fourth", "Saturday"));
    }

    public function testFourthSundayOfMarch2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/3/24"), meetup_day(2013, "3", "fourth", "Sunday"));
    }

    public function testFourthSundayOfApril2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/4/28"), meetup_day(2013, "4", "fourth", "Sunday"));
    }

    public function testLastMondayOfMarch2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/3/25"), meetup_day(2013, "3", "last", "Monday"));
    }

    public function testLastMondayOfApril2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/4/29"), meetup_day(2013, "4", "last", "Monday"));
    }

    public function testLastTuesdayOfMay2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/5/28"), meetup_day(2013, "5", "last", "Tuesday"));
    }

    public function testLastTuesdayOfJune2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/6/25"), meetup_day(2013, "6", "last", "Tuesday"));
    }

    public function testLastWednesdayOfJuly2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/7/31"), meetup_day(2013, "7", "last", "Wednesday"));
    }

    public function testLastWednesdayOfAugust2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/8/28"), meetup_day(2013, "8", "last", "Wednesday"));
    }

    public function testLastThursdayOfSeptember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/9/26"), meetup_day(2013, "9", "last", "Thursday"));
    }

    public function testLastThursdayOfOctober2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/10/31"), meetup_day(2013, "10", "last", "Thursday"));
    }

    public function testLastFridayOfNovember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/11/29"), meetup_day(2013, "11", "last", "Friday"));
    }

    public function testLastFridayOfDecember2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/12/27"), meetup_day(2013, "12", "last", "Friday"));
    }

    public function testLastSaturdayOfJanuary2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/1/26"), meetup_day(2013, "1", "last", "Saturday"));
    }

    public function testLastSaturdayOfFebruary2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/2/23"), meetup_day(2013, "2", "last", "Saturday"));
    }

    public function testLastSundayOfMarch2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/3/31"), meetup_day(2013, "3", "last", "Sunday"));
    }

    public function testLastSundayOfApril2013(): void
    {
        $this->assertEquals(new DateTimeImmutable("2013/4/28"), meetup_day(2013, "4", "last", "Sunday"));
    }

    public function testLastWednesdayOfFebruary2012(): void
    {
        $this->assertEquals(new DateTimeImmutable("2012/2/29"), meetup_day(2012, "2", "last", "Wednesday"));
    }

    public function testLastWednesdayOfDecember2014(): void
    {
        $this->assertEquals(new DateTimeImmutable("2014/12/31"), meetup_day(2014, "12", "last", "Wednesday"));
    }

    public function testLastSundayOfFebruary2015(): void
    {
        $this->assertEquals(new DateTimeImmutable("2015/2/22"), meetup_day(2015, "2", "last", "Sunday"));
    }

    public function testFirstFridayOfDecember2012(): void
    {
        $this->assertEquals(new DateTimeImmutable("2012/12/7"), meetup_day(2012, "12", "first", "Friday"));
    }
}
