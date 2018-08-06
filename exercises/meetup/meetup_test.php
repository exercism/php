<?php

require "meetup.php";

class MeetupTest extends PHPUnit\Framework\TestCase
{
    public function testMonteenthOfMay2013()
    {
        $this->assertEquals(meetup_day(2013, 5, "teenth", "Monday"), new DateTime("2013/5/13"));
    }

    public function testMonteenthOfAugust2013()
    {
        $this->assertEquals(meetup_day(2013, 8, "teenth", "Monday"), new DateTime("2013/8/19"));
    }

    public function testMonteenthOfSeptember2013()
    {
        $this->assertEquals(meetup_day(2013, 9, "teenth", "Monday"), new DateTime("2013/9/16"));
    }

    public function testTuesteenthOfMarch2013()
    {
        $this->assertEquals(meetup_day(2013, 3, "teenth", "Tuesday"), new DateTime("2013/3/19"));
    }

    public function testTuesteenthOfApril2013()
    {
        $this->assertEquals(meetup_day(2013, 4, "teenth", "Tuesday"), new DateTime("2013/4/16"));
    }

    public function testTuesteenthOfAugust2013()
    {
        $this->assertEquals(meetup_day(2013, 8, "teenth", "Tuesday"), new DateTime("2013/8/13"));
    }

    public function testWednesteenthOfJanuary2013()
    {
        $this->assertEquals(meetup_day(2013, 1, "teenth", "Wednesday"), new DateTime("2013/1/16"));
    }

    public function testWednesteenthOfFebruary2013()
    {
        $this->assertEquals(meetup_day(2013, 2, "teenth", "Wednesday"), new DateTime("2013/2/13"));
    }

    public function testWednesteenthOfJune2013()
    {
        $this->assertEquals(meetup_day(2013, 6, "teenth", "Wednesday"), new DateTime("2013/6/19"));
    }

    public function testThursteenthOfMay2013()
    {
        $this->assertEquals(meetup_day(2013, 5, "teenth", "Thursday"), new DateTime("2013/5/16"));
    }

    public function testThursteenthOfJune2013()
    {
        $this->assertEquals(meetup_day(2013, 6, "teenth", "Thursday"), new DateTime("2013/6/13"));
    }

    public function testThursteenthOfSeptember2013()
    {
        $this->assertEquals(meetup_day(2013, 9, "teenth", "Thursday"), new DateTime("2013/9/19"));
    }

    public function testFriteenthOfApril2013()
    {
        $this->assertEquals(meetup_day(2013, 4, "teenth", "Friday"), new DateTime("2013/4/19"));
    }

    public function testFriteenthOfAugust2013()
    {
        $this->assertEquals(meetup_day(2013, 8, "teenth", "Friday"), new DateTime("2013/8/16"));
    }

    public function testFriteenthOfSeptember2013()
    {
        $this->assertEquals(meetup_day(2013, 9, "teenth", "Friday"), new DateTime("2013/9/13"));
    }

    public function testSaturteenthOfFebruary2013()
    {
        $this->assertEquals(meetup_day(2013, 2, "teenth", "Saturday"), new DateTime("2013/2/16"));
    }

    public function testSaturteenthOfApril2013()
    {
        $this->assertEquals(meetup_day(2013, 4, "teenth", "Saturday"), new DateTime("2013/4/13"));
    }

    public function testSaturteenthOfOctober2013()
    {
        $this->assertEquals(meetup_day(2013, 10, "teenth", "Saturday"), new DateTime("2013/10/19"));
    }

    public function testSunteenthOfMay2013()
    {
        $this->assertEquals(meetup_day(2013, 5, "teenth", "Sunday"), new DateTime("2013/5/19"));
    }

    public function testSunteenthOfJune2013()
    {
        $this->assertEquals(meetup_day(2013, 6, "teenth", "Sunday"), new DateTime("2013/6/16"));
    }

    public function testSunteenthOfOctober2013()
    {
        $this->assertEquals(meetup_day(2013, 10, "teenth", "Sunday"), new DateTime("2013/10/13"));
    }

    public function testFirstMondayOfMarch2013()
    {
        $this->assertEquals(meetup_day(2013, 3, "first", "Monday"), new DateTime("2013/3/4"));
    }

    public function testFirstMondayOfApril2013()
    {
        $this->assertEquals(meetup_day(2013, 4, "first", "Monday"), new DateTime("2013/4/1"));
    }

    public function testFirstTuesdayOfMay2013()
    {
        $this->assertEquals(meetup_day(2013, 5, "first", "Tuesday"), new DateTime("2013/5/7"));
    }

    public function testFirstTuesdayOfJune2013()
    {
        $this->assertEquals(meetup_day(2013, 6, "first", "Tuesday"), new DateTime("2013/6/4"));
    }

    public function testFirstWednesdayOfJuly2013()
    {
        $this->assertEquals(meetup_day(2013, 7, "first", "Wednesday"), new DateTime("2013/7/3"));
    }

    public function testFirstWednesdayOfAugust2013()
    {
        $this->assertEquals(meetup_day(2013, 8, "first", "Wednesday"), new DateTime("2013/8/7"));
    }

    public function testFirstThursdayOfSeptember2013()
    {
        $this->assertEquals(meetup_day(2013, 9, "first", "Thursday"), new DateTime("2013/9/5"));
    }

    public function testFirstThursdayOfOctober2013()
    {
        $this->assertEquals(meetup_day(2013, 10, "first", "Thursday"), new DateTime("2013/10/3"));
    }

    public function testFirstFridayOfNovember2013()
    {
        $this->assertEquals(meetup_day(2013, 11, "first", "Friday"), new DateTime("2013/11/1"));
    }

    public function testFirstFridayOfDecember2013()
    {
        $this->assertEquals(meetup_day(2013, 12, "first", "Friday"), new DateTime("2013/12/6"));
    }

    public function testFirstSaturdayOfJanuary2013()
    {
        $this->assertEquals(meetup_day(2013, 1, "first", "Saturday"), new DateTime("2013/1/5"));
    }

    public function testFirstSaturdayOfFebruary2013()
    {
        $this->assertEquals(meetup_day(2013, 2, "first", "Saturday"), new DateTime("2013/2/2"));
    }

    public function testFirstSundayOfMarch2013()
    {
        $this->assertEquals(meetup_day(2013, 3, "first", "Sunday"), new DateTime("2013/3/3"));
    }

    public function testFirstSundayOfApril2013()
    {
        $this->assertEquals(meetup_day(2013, 4, "first", "Sunday"), new DateTime("2013/4/7"));
    }

    public function testSecondMondayOfMarch2013()
    {
        $this->assertEquals(meetup_day(2013, 3, "second", "Monday"), new DateTime("2013/3/11"));
    }

    public function testSecondMondayOfApril2013()
    {
        $this->assertEquals(meetup_day(2013, 4, "second", "Monday"), new DateTime("2013/4/8"));
    }

    public function testSecondTuesdayOfMay2013()
    {
        $this->assertEquals(meetup_day(2013, 5, "second", "Tuesday"), new DateTime("2013/5/14"));
    }

    public function testSecondTuesdayOfJune2013()
    {
        $this->assertEquals(meetup_day(2013, 6, "second", "Tuesday"), new DateTime("2013/6/11"));
    }

    public function testSecondWednesdayOfJuly2013()
    {
        $this->assertEquals(meetup_day(2013, 7, "second", "Wednesday"), new DateTime("2013/7/10"));
    }

    public function testSecondWednesdayOfAugust2013()
    {
        $this->assertEquals(meetup_day(2013, 8, "second", "Wednesday"), new DateTime("2013/8/14"));
    }

    public function testSecondThursdayOfSeptember2013()
    {
        $this->assertEquals(meetup_day(2013, 9, "second", "Thursday"), new DateTime("2013/9/12"));
    }

    public function testSecondThursdayOfOctober2013()
    {
        $this->assertEquals(meetup_day(2013, 10, "second", "Thursday"), new DateTime("2013/10/10"));
    }

    public function testSecondFridayOfNovember2013()
    {
        $this->assertEquals(meetup_day(2013, 11, "second", "Friday"), new DateTime("2013/11/8"));
    }

    public function testSecondFridayOfDecember2013()
    {
        $this->assertEquals(meetup_day(2013, 12, "second", "Friday"), new DateTime("2013/12/13"));
    }

    public function testSecondSaturdayOfJanuary2013()
    {
        $this->assertEquals(meetup_day(2013, 1, "second", "Saturday"), new DateTime("2013/1/12"));
    }

    public function testSecondSaturdayOfFebruary2013()
    {
        $this->assertEquals(meetup_day(2013, 2, "second", "Saturday"), new DateTime("2013/2/9"));
    }

    public function testSecondSundayOfMarch2013()
    {
        $this->assertEquals(meetup_day(2013, 3, "second", "Sunday"), new DateTime("2013/3/10"));
    }

    public function testSecondSundayOfApril2013()
    {
        $this->assertEquals(meetup_day(2013, 4, "second", "Sunday"), new DateTime("2013/4/14"));
    }

    public function testThirdMondayOfMarch2013()
    {
        $this->assertEquals(meetup_day(2013, 3, "third", "Monday"), new DateTime("2013/3/18"));
    }

    public function testThirdMondayOfApril2013()
    {
        $this->assertEquals(meetup_day(2013, 4, "third", "Monday"), new DateTime("2013/4/15"));
    }

    public function testThirdTuesdayOfMay2013()
    {
        $this->assertEquals(meetup_day(2013, 5, "third", "Tuesday"), new DateTime("2013/5/21"));
    }

    public function testThirdTuesdayOfJune2013()
    {
        $this->assertEquals(meetup_day(2013, 6, "third", "Tuesday"), new DateTime("2013/6/18"));
    }

    public function testThirdWednesdayOfJuly2013()
    {
        $this->assertEquals(meetup_day(2013, 7, "third", "Wednesday"), new DateTime("2013/7/17"));
    }

    public function testThirdWednesdayOfAugust2013()
    {
        $this->assertEquals(meetup_day(2013, 8, "third", "Wednesday"), new DateTime("2013/8/21"));
    }

    public function testThirdThursdayOfSeptember2013()
    {
        $this->assertEquals(meetup_day(2013, 9, "third", "Thursday"), new DateTime("2013/9/19"));
    }

    public function testThirdThursdayOfOctober2013()
    {
        $this->assertEquals(meetup_day(2013, 10, "third", "Thursday"), new DateTime("2013/10/17"));
    }

    public function testThirdFridayOfNovember2013()
    {
        $this->assertEquals(meetup_day(2013, 11, "third", "Friday"), new DateTime("2013/11/15"));
    }

    public function testThirdFridayOfDecember2013()
    {
        $this->assertEquals(meetup_day(2013, 12, "third", "Friday"), new DateTime("2013/12/20"));
    }

    public function testThirdSaturdayOfJanuary2013()
    {
        $this->assertEquals(meetup_day(2013, 1, "third", "Saturday"), new DateTime("2013/1/19"));
    }

    public function testThirdSaturdayOfFebruary2013()
    {
        $this->assertEquals(meetup_day(2013, 2, "third", "Saturday"), new DateTime("2013/2/16"));
    }

    public function testThirdSundayOfMarch2013()
    {
        $this->assertEquals(meetup_day(2013, 3, "third", "Sunday"), new DateTime("2013/3/17"));
    }

    public function testThirdSundayOfApril2013()
    {
        $this->assertEquals(meetup_day(2013, 4, "third", "Sunday"), new DateTime("2013/4/21"));
    }

    public function testFourthMondayOfMarch2013()
    {
        $this->assertEquals(meetup_day(2013, 3, "fourth", "Monday"), new DateTime("2013/3/25"));
    }

    public function testFourthMondayOfApril2013()
    {
        $this->assertEquals(meetup_day(2013, 4, "fourth", "Monday"), new DateTime("2013/4/22"));
    }

    public function testFourthTuesdayOfMay2013()
    {
        $this->assertEquals(meetup_day(2013, 5, "fourth", "Tuesday"), new DateTime("2013/5/28"));
    }

    public function testFourthTuesdayOfJune2013()
    {
        $this->assertEquals(meetup_day(2013, 6, "fourth", "Tuesday"), new DateTime("2013/6/25"));
    }

    public function testFourthWednesdayOfJuly2013()
    {
        $this->assertEquals(meetup_day(2013, 7, "fourth", "Wednesday"), new DateTime("2013/7/24"));
    }

    public function testFourthWednesdayOfAugust2013()
    {
        $this->assertEquals(meetup_day(2013, 8, "fourth", "Wednesday"), new DateTime("2013/8/28"));
    }

    public function testFourthThursdayOfSeptember2013()
    {
        $this->assertEquals(meetup_day(2013, 9, "fourth", "Thursday"), new DateTime("2013/9/26"));
    }

    public function testFourthThursdayOfOctober2013()
    {
        $this->assertEquals(meetup_day(2013, 10, "fourth", "Thursday"), new DateTime("2013/10/24"));
    }

    public function testFourthFridayOfNovember2013()
    {
        $this->assertEquals(meetup_day(2013, 11, "fourth", "Friday"), new DateTime("2013/11/22"));
    }

    public function testFourthFridayOfDecember2013()
    {
        $this->assertEquals(meetup_day(2013, 12, "fourth", "Friday"), new DateTime("2013/12/27"));
    }

    public function testFourthSaturdayOfJanuary2013()
    {
        $this->assertEquals(meetup_day(2013, 1, "fourth", "Saturday"), new DateTime("2013/1/26"));
    }

    public function testFourthSaturdayOfFebruary2013()
    {
        $this->assertEquals(meetup_day(2013, 2, "fourth", "Saturday"), new DateTime("2013/2/23"));
    }

    public function testFourthSundayOfMarch2013()
    {
        $this->assertEquals(meetup_day(2013, 3, "fourth", "Sunday"), new DateTime("2013/3/24"));
    }

    public function testFourthSundayOfApril2013()
    {
        $this->assertEquals(meetup_day(2013, 4, "fourth", "Sunday"), new DateTime("2013/4/28"));
    }

    public function testLastMondayOfMarch2013()
    {
        $this->assertEquals(meetup_day(2013, 3, "last", "Monday"), new DateTime("2013/3/25"));
    }

    public function testLastMondayOfApril2013()
    {
        $this->assertEquals(meetup_day(2013, 4, "last", "Monday"), new DateTime("2013/4/29"));
    }

    public function testLastTuesdayOfMay2013()
    {
        $this->assertEquals(meetup_day(2013, 5, "last", "Tuesday"), new DateTime("2013/5/28"));
    }

    public function testLastTuesdayOfJune2013()
    {
        $this->assertEquals(meetup_day(2013, 6, "last", "Tuesday"), new DateTime("2013/6/25"));
    }

    public function testLastWednesdayOfJuly2013()
    {
        $this->assertEquals(meetup_day(2013, 7, "last", "Wednesday"), new DateTime("2013/7/31"));
    }

    public function testLastWednesdayOfAugust2013()
    {
        $this->assertEquals(meetup_day(2013, 8, "last", "Wednesday"), new DateTime("2013/8/28"));
    }

    public function testLastThursdayOfSeptember2013()
    {
        $this->assertEquals(meetup_day(2013, 9, "last", "Thursday"), new DateTime("2013/9/26"));
    }

    public function testLastThursdayOfOctober2013()
    {
        $this->assertEquals(meetup_day(2013, 10, "last", "Thursday"), new DateTime("2013/10/31"));
    }

    public function testLastFridayOfNovember2013()
    {
        $this->assertEquals(meetup_day(2013, 11, "last", "Friday"), new DateTime("2013/11/29"));
    }

    public function testLastFridayOfDecember2013()
    {
        $this->assertEquals(meetup_day(2013, 12, "last", "Friday"), new DateTime("2013/12/27"));
    }

    public function testLastSaturdayOfJanuary2013()
    {
        $this->assertEquals(meetup_day(2013, 1, "last", "Saturday"), new DateTime("2013/1/26"));
    }

    public function testLastSaturdayOfFebruary2013()
    {
        $this->assertEquals(meetup_day(2013, 2, "last", "Saturday"), new DateTime("2013/2/23"));
    }

    public function testLastSundayOfMarch2013()
    {
        $this->assertEquals(meetup_day(2013, 3, "last", "Sunday"), new DateTime("2013/3/31"));
    }

    public function testLastSundayOfApril2013()
    {
        $this->assertEquals(meetup_day(2013, 4, "last", "Sunday"), new DateTime("2013/4/28"));
    }

    public function testLastWednesdayOfFebruary2012()
    {
        $this->assertEquals(meetup_day(2012, 2, "last", "Wednesday"), new DateTime("2012/2/29"));
    }

    public function testLastWednesdayOfDecember2014()
    {
        $this->assertEquals(meetup_day(2014, 12, "last", "Wednesday"), new DateTime("2014/12/31"));
    }

    public function testLastSundayOfFebruary2015()
    {
        $this->assertEquals(meetup_day(2015, 2, "last", "Sunday"), new DateTime("2015/2/22"));
    }

    public function testFirstFridayOfDecember2012()
    {
        $this->assertEquals(meetup_day(2012, 12, "first", "Friday"), new DateTime("2012/12/7"));
    }
}
