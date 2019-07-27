<?php

class MeetupTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'meetup.php';
    }

    public function testMonteenthOfMay2013() : void
    {
        $this->assertEquals(meetup_day(2013, 5, "teenth", "Monday"), new DateTimeImmutable("2013/5/13"));
    }

    public function testMonteenthOfAugust2013() : void
    {
        $this->assertEquals(meetup_day(2013, 8, "teenth", "Monday"), new DateTimeImmutable("2013/8/19"));
    }

    public function testMonteenthOfSeptember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 9, "teenth", "Monday"), new DateTimeImmutable("2013/9/16"));
    }

    public function testTuesteenthOfMarch2013() : void
    {
        $this->assertEquals(meetup_day(2013, 3, "teenth", "Tuesday"), new DateTimeImmutable("2013/3/19"));
    }

    public function testTuesteenthOfApril2013() : void
    {
        $this->assertEquals(meetup_day(2013, 4, "teenth", "Tuesday"), new DateTimeImmutable("2013/4/16"));
    }

    public function testTuesteenthOfAugust2013() : void
    {
        $this->assertEquals(meetup_day(2013, 8, "teenth", "Tuesday"), new DateTimeImmutable("2013/8/13"));
    }

    public function testWednesteenthOfJanuary2013() : void
    {
        $this->assertEquals(meetup_day(2013, 1, "teenth", "Wednesday"), new DateTimeImmutable("2013/1/16"));
    }

    public function testWednesteenthOfFebruary2013() : void
    {
        $this->assertEquals(meetup_day(2013, 2, "teenth", "Wednesday"), new DateTimeImmutable("2013/2/13"));
    }

    public function testWednesteenthOfJune2013() : void
    {
        $this->assertEquals(meetup_day(2013, 6, "teenth", "Wednesday"), new DateTimeImmutable("2013/6/19"));
    }

    public function testThursteenthOfMay2013() : void
    {
        $this->assertEquals(meetup_day(2013, 5, "teenth", "Thursday"), new DateTimeImmutable("2013/5/16"));
    }

    public function testThursteenthOfJune2013() : void
    {
        $this->assertEquals(meetup_day(2013, 6, "teenth", "Thursday"), new DateTimeImmutable("2013/6/13"));
    }

    public function testThursteenthOfSeptember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 9, "teenth", "Thursday"), new DateTimeImmutable("2013/9/19"));
    }

    public function testFriteenthOfApril2013() : void
    {
        $this->assertEquals(meetup_day(2013, 4, "teenth", "Friday"), new DateTimeImmutable("2013/4/19"));
    }

    public function testFriteenthOfAugust2013() : void
    {
        $this->assertEquals(meetup_day(2013, 8, "teenth", "Friday"), new DateTimeImmutable("2013/8/16"));
    }

    public function testFriteenthOfSeptember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 9, "teenth", "Friday"), new DateTimeImmutable("2013/9/13"));
    }

    public function testSaturteenthOfFebruary2013() : void
    {
        $this->assertEquals(meetup_day(2013, 2, "teenth", "Saturday"), new DateTimeImmutable("2013/2/16"));
    }

    public function testSaturteenthOfApril2013() : void
    {
        $this->assertEquals(meetup_day(2013, 4, "teenth", "Saturday"), new DateTimeImmutable("2013/4/13"));
    }

    public function testSaturteenthOfOctober2013() : void
    {
        $this->assertEquals(meetup_day(2013, 10, "teenth", "Saturday"), new DateTimeImmutable("2013/10/19"));
    }

    public function testSunteenthOfMay2013() : void
    {
        $this->assertEquals(meetup_day(2013, 5, "teenth", "Sunday"), new DateTimeImmutable("2013/5/19"));
    }

    public function testSunteenthOfJune2013() : void
    {
        $this->assertEquals(meetup_day(2013, 6, "teenth", "Sunday"), new DateTimeImmutable("2013/6/16"));
    }

    public function testSunteenthOfOctober2013() : void
    {
        $this->assertEquals(meetup_day(2013, 10, "teenth", "Sunday"), new DateTimeImmutable("2013/10/13"));
    }

    public function testFirstMondayOfMarch2013() : void
    {
        $this->assertEquals(meetup_day(2013, 3, "first", "Monday"), new DateTimeImmutable("2013/3/4"));
    }

    public function testFirstMondayOfApril2013() : void
    {
        $this->assertEquals(meetup_day(2013, 4, "first", "Monday"), new DateTimeImmutable("2013/4/1"));
    }

    public function testFirstTuesdayOfMay2013() : void
    {
        $this->assertEquals(meetup_day(2013, 5, "first", "Tuesday"), new DateTimeImmutable("2013/5/7"));
    }

    public function testFirstTuesdayOfJune2013() : void
    {
        $this->assertEquals(meetup_day(2013, 6, "first", "Tuesday"), new DateTimeImmutable("2013/6/4"));
    }

    public function testFirstWednesdayOfJuly2013() : void
    {
        $this->assertEquals(meetup_day(2013, 7, "first", "Wednesday"), new DateTimeImmutable("2013/7/3"));
    }

    public function testFirstWednesdayOfAugust2013() : void
    {
        $this->assertEquals(meetup_day(2013, 8, "first", "Wednesday"), new DateTimeImmutable("2013/8/7"));
    }

    public function testFirstThursdayOfSeptember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 9, "first", "Thursday"), new DateTimeImmutable("2013/9/5"));
    }

    public function testFirstThursdayOfOctober2013() : void
    {
        $this->assertEquals(meetup_day(2013, 10, "first", "Thursday"), new DateTimeImmutable("2013/10/3"));
    }

    public function testFirstFridayOfNovember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 11, "first", "Friday"), new DateTimeImmutable("2013/11/1"));
    }

    public function testFirstFridayOfDecember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 12, "first", "Friday"), new DateTimeImmutable("2013/12/6"));
    }

    public function testFirstSaturdayOfJanuary2013() : void
    {
        $this->assertEquals(meetup_day(2013, 1, "first", "Saturday"), new DateTimeImmutable("2013/1/5"));
    }

    public function testFirstSaturdayOfFebruary2013() : void
    {
        $this->assertEquals(meetup_day(2013, 2, "first", "Saturday"), new DateTimeImmutable("2013/2/2"));
    }

    public function testFirstSundayOfMarch2013() : void
    {
        $this->assertEquals(meetup_day(2013, 3, "first", "Sunday"), new DateTimeImmutable("2013/3/3"));
    }

    public function testFirstSundayOfApril2013() : void
    {
        $this->assertEquals(meetup_day(2013, 4, "first", "Sunday"), new DateTimeImmutable("2013/4/7"));
    }

    public function testSecondMondayOfMarch2013() : void
    {
        $this->assertEquals(meetup_day(2013, 3, "second", "Monday"), new DateTimeImmutable("2013/3/11"));
    }

    public function testSecondMondayOfApril2013() : void
    {
        $this->assertEquals(meetup_day(2013, 4, "second", "Monday"), new DateTimeImmutable("2013/4/8"));
    }

    public function testSecondTuesdayOfMay2013() : void
    {
        $this->assertEquals(meetup_day(2013, 5, "second", "Tuesday"), new DateTimeImmutable("2013/5/14"));
    }

    public function testSecondTuesdayOfJune2013() : void
    {
        $this->assertEquals(meetup_day(2013, 6, "second", "Tuesday"), new DateTimeImmutable("2013/6/11"));
    }

    public function testSecondWednesdayOfJuly2013() : void
    {
        $this->assertEquals(meetup_day(2013, 7, "second", "Wednesday"), new DateTimeImmutable("2013/7/10"));
    }

    public function testSecondWednesdayOfAugust2013() : void
    {
        $this->assertEquals(meetup_day(2013, 8, "second", "Wednesday"), new DateTimeImmutable("2013/8/14"));
    }

    public function testSecondThursdayOfSeptember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 9, "second", "Thursday"), new DateTimeImmutable("2013/9/12"));
    }

    public function testSecondThursdayOfOctober2013() : void
    {
        $this->assertEquals(meetup_day(2013, 10, "second", "Thursday"), new DateTimeImmutable("2013/10/10"));
    }

    public function testSecondFridayOfNovember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 11, "second", "Friday"), new DateTimeImmutable("2013/11/8"));
    }

    public function testSecondFridayOfDecember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 12, "second", "Friday"), new DateTimeImmutable("2013/12/13"));
    }

    public function testSecondSaturdayOfJanuary2013() : void
    {
        $this->assertEquals(meetup_day(2013, 1, "second", "Saturday"), new DateTimeImmutable("2013/1/12"));
    }

    public function testSecondSaturdayOfFebruary2013() : void
    {
        $this->assertEquals(meetup_day(2013, 2, "second", "Saturday"), new DateTimeImmutable("2013/2/9"));
    }

    public function testSecondSundayOfMarch2013() : void
    {
        $this->assertEquals(meetup_day(2013, 3, "second", "Sunday"), new DateTimeImmutable("2013/3/10"));
    }

    public function testSecondSundayOfApril2013() : void
    {
        $this->assertEquals(meetup_day(2013, 4, "second", "Sunday"), new DateTimeImmutable("2013/4/14"));
    }

    public function testThirdMondayOfMarch2013() : void
    {
        $this->assertEquals(meetup_day(2013, 3, "third", "Monday"), new DateTimeImmutable("2013/3/18"));
    }

    public function testThirdMondayOfApril2013() : void
    {
        $this->assertEquals(meetup_day(2013, 4, "third", "Monday"), new DateTimeImmutable("2013/4/15"));
    }

    public function testThirdTuesdayOfMay2013() : void
    {
        $this->assertEquals(meetup_day(2013, 5, "third", "Tuesday"), new DateTimeImmutable("2013/5/21"));
    }

    public function testThirdTuesdayOfJune2013() : void
    {
        $this->assertEquals(meetup_day(2013, 6, "third", "Tuesday"), new DateTimeImmutable("2013/6/18"));
    }

    public function testThirdWednesdayOfJuly2013() : void
    {
        $this->assertEquals(meetup_day(2013, 7, "third", "Wednesday"), new DateTimeImmutable("2013/7/17"));
    }

    public function testThirdWednesdayOfAugust2013() : void
    {
        $this->assertEquals(meetup_day(2013, 8, "third", "Wednesday"), new DateTimeImmutable("2013/8/21"));
    }

    public function testThirdThursdayOfSeptember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 9, "third", "Thursday"), new DateTimeImmutable("2013/9/19"));
    }

    public function testThirdThursdayOfOctober2013() : void
    {
        $this->assertEquals(meetup_day(2013, 10, "third", "Thursday"), new DateTimeImmutable("2013/10/17"));
    }

    public function testThirdFridayOfNovember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 11, "third", "Friday"), new DateTimeImmutable("2013/11/15"));
    }

    public function testThirdFridayOfDecember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 12, "third", "Friday"), new DateTimeImmutable("2013/12/20"));
    }

    public function testThirdSaturdayOfJanuary2013() : void
    {
        $this->assertEquals(meetup_day(2013, 1, "third", "Saturday"), new DateTimeImmutable("2013/1/19"));
    }

    public function testThirdSaturdayOfFebruary2013() : void
    {
        $this->assertEquals(meetup_day(2013, 2, "third", "Saturday"), new DateTimeImmutable("2013/2/16"));
    }

    public function testThirdSundayOfMarch2013() : void
    {
        $this->assertEquals(meetup_day(2013, 3, "third", "Sunday"), new DateTimeImmutable("2013/3/17"));
    }

    public function testThirdSundayOfApril2013() : void
    {
        $this->assertEquals(meetup_day(2013, 4, "third", "Sunday"), new DateTimeImmutable("2013/4/21"));
    }

    public function testFourthMondayOfMarch2013() : void
    {
        $this->assertEquals(meetup_day(2013, 3, "fourth", "Monday"), new DateTimeImmutable("2013/3/25"));
    }

    public function testFourthMondayOfApril2013() : void
    {
        $this->assertEquals(meetup_day(2013, 4, "fourth", "Monday"), new DateTimeImmutable("2013/4/22"));
    }

    public function testFourthTuesdayOfMay2013() : void
    {
        $this->assertEquals(meetup_day(2013, 5, "fourth", "Tuesday"), new DateTimeImmutable("2013/5/28"));
    }

    public function testFourthTuesdayOfJune2013() : void
    {
        $this->assertEquals(meetup_day(2013, 6, "fourth", "Tuesday"), new DateTimeImmutable("2013/6/25"));
    }

    public function testFourthWednesdayOfJuly2013() : void
    {
        $this->assertEquals(meetup_day(2013, 7, "fourth", "Wednesday"), new DateTimeImmutable("2013/7/24"));
    }

    public function testFourthWednesdayOfAugust2013() : void
    {
        $this->assertEquals(meetup_day(2013, 8, "fourth", "Wednesday"), new DateTimeImmutable("2013/8/28"));
    }

    public function testFourthThursdayOfSeptember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 9, "fourth", "Thursday"), new DateTimeImmutable("2013/9/26"));
    }

    public function testFourthThursdayOfOctober2013() : void
    {
        $this->assertEquals(meetup_day(2013, 10, "fourth", "Thursday"), new DateTimeImmutable("2013/10/24"));
    }

    public function testFourthFridayOfNovember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 11, "fourth", "Friday"), new DateTimeImmutable("2013/11/22"));
    }

    public function testFourthFridayOfDecember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 12, "fourth", "Friday"), new DateTimeImmutable("2013/12/27"));
    }

    public function testFourthSaturdayOfJanuary2013() : void
    {
        $this->assertEquals(meetup_day(2013, 1, "fourth", "Saturday"), new DateTimeImmutable("2013/1/26"));
    }

    public function testFourthSaturdayOfFebruary2013() : void
    {
        $this->assertEquals(meetup_day(2013, 2, "fourth", "Saturday"), new DateTimeImmutable("2013/2/23"));
    }

    public function testFourthSundayOfMarch2013() : void
    {
        $this->assertEquals(meetup_day(2013, 3, "fourth", "Sunday"), new DateTimeImmutable("2013/3/24"));
    }

    public function testFourthSundayOfApril2013() : void
    {
        $this->assertEquals(meetup_day(2013, 4, "fourth", "Sunday"), new DateTimeImmutable("2013/4/28"));
    }

    public function testLastMondayOfMarch2013() : void
    {
        $this->assertEquals(meetup_day(2013, 3, "last", "Monday"), new DateTimeImmutable("2013/3/25"));
    }

    public function testLastMondayOfApril2013() : void
    {
        $this->assertEquals(meetup_day(2013, 4, "last", "Monday"), new DateTimeImmutable("2013/4/29"));
    }

    public function testLastTuesdayOfMay2013() : void
    {
        $this->assertEquals(meetup_day(2013, 5, "last", "Tuesday"), new DateTimeImmutable("2013/5/28"));
    }

    public function testLastTuesdayOfJune2013() : void
    {
        $this->assertEquals(meetup_day(2013, 6, "last", "Tuesday"), new DateTimeImmutable("2013/6/25"));
    }

    public function testLastWednesdayOfJuly2013() : void
    {
        $this->assertEquals(meetup_day(2013, 7, "last", "Wednesday"), new DateTimeImmutable("2013/7/31"));
    }

    public function testLastWednesdayOfAugust2013() : void
    {
        $this->assertEquals(meetup_day(2013, 8, "last", "Wednesday"), new DateTimeImmutable("2013/8/28"));
    }

    public function testLastThursdayOfSeptember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 9, "last", "Thursday"), new DateTimeImmutable("2013/9/26"));
    }

    public function testLastThursdayOfOctober2013() : void
    {
        $this->assertEquals(meetup_day(2013, 10, "last", "Thursday"), new DateTimeImmutable("2013/10/31"));
    }

    public function testLastFridayOfNovember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 11, "last", "Friday"), new DateTimeImmutable("2013/11/29"));
    }

    public function testLastFridayOfDecember2013() : void
    {
        $this->assertEquals(meetup_day(2013, 12, "last", "Friday"), new DateTimeImmutable("2013/12/27"));
    }

    public function testLastSaturdayOfJanuary2013() : void
    {
        $this->assertEquals(meetup_day(2013, 1, "last", "Saturday"), new DateTimeImmutable("2013/1/26"));
    }

    public function testLastSaturdayOfFebruary2013() : void
    {
        $this->assertEquals(meetup_day(2013, 2, "last", "Saturday"), new DateTimeImmutable("2013/2/23"));
    }

    public function testLastSundayOfMarch2013() : void
    {
        $this->assertEquals(meetup_day(2013, 3, "last", "Sunday"), new DateTimeImmutable("2013/3/31"));
    }

    public function testLastSundayOfApril2013() : void
    {
        $this->assertEquals(meetup_day(2013, 4, "last", "Sunday"), new DateTimeImmutable("2013/4/28"));
    }

    public function testLastWednesdayOfFebruary2012() : void
    {
        $this->assertEquals(meetup_day(2012, 2, "last", "Wednesday"), new DateTimeImmutable("2012/2/29"));
    }

    public function testLastWednesdayOfDecember2014() : void
    {
        $this->assertEquals(meetup_day(2014, 12, "last", "Wednesday"), new DateTimeImmutable("2014/12/31"));
    }

    public function testLastSundayOfFebruary2015() : void
    {
        $this->assertEquals(meetup_day(2015, 2, "last", "Sunday"), new DateTimeImmutable("2015/2/22"));
    }

    public function testFirstFridayOfDecember2012() : void
    {
        $this->assertEquals(meetup_day(2012, 12, "first", "Friday"), new DateTimeImmutable("2012/12/7"));
    }
}
