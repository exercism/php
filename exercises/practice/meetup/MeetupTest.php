<?php

declare(strict_types=1);

class MeetupTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Meetup.php';
    }

      /**
     * uuid: d7f8eadd-d4fc-46ee-8a20-e97bd3fd01c8
     * @testdox when teenth Monday is the 13th, the first day of the teenth week
     */
    public function testMonteenthOfMay2013(): void
    {
        $expected = new DateTimeImmutable("2013/5/13");

        $actual = meetup_day(2013, 5, "teenth", "Monday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: f78373d1-cd53-4a7f-9d37-e15bf8a456b4
     * @testdox when teenth Monday is the 19th, the last day of the teenth week
     */
    public function testMonteenthOfAugust2013(): void
    {
        $expected = new DateTimeImmutable("2013/8/19");

        $actual = meetup_day(2013, 8, "teenth", "Monday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 8c78bea7-a116-425b-9c6b-c9898266d92a
     * @testdox when teenth Monday is some day in the middle of the teenth week
     */
    public function testMonteenthOfSeptember2013(): void
    {
        $expected = new DateTimeImmutable("2013/9/16");

        $actual = meetup_day(2013, 9, "teenth", "Monday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: cfef881b-9dc9-4d0b-8de4-82d0f39fc271
     * @testdox when teenth Tuesday is the 19th, the last day of the teenth week
     */
    public function testTuesteenthOfMarch2013(): void
    {
        $expected = new DateTimeImmutable("2013/3/19");

        $actual = meetup_day(2013, 3, "teenth", "Tuesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 69048961-3b00-41f9-97ee-eb6d83a8e92b
     * @testdox when teenth Tuesday is some day in the middle of the teenth week
     */
    public function testTuesteenthOfApril2013(): void
    {
        $expected = new DateTimeImmutable("2013/4/16");

        $actual = meetup_day(2013, 4, "teenth", "Tuesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: d30bade8-3622-466a-b7be-587414e0caa6
     * @testdox when teenth Tuesday is the 13th, the first day of the teenth week
     */
    public function testTuesteenthOfAugust2013(): void
    {
        $expected = new DateTimeImmutable("2013/8/13");

        $actual = meetup_day(2013, 8, "teenth", "Tuesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 8db4b58b-92f3-4687-867b-82ee1a04f851
     * @testdox when teenth Wednesday is some day in the middle of the teenth week
     */
    public function testWednesteenthOfJanuary2013(): void
    {
        $expected = new DateTimeImmutable("2013/1/16");

        $actual = meetup_day(2013, 1, "teenth", "Wednesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 6c27a2a2-28f8-487f-ae81-35d08c4664f7
     * @testdox when teenth Wednesday is the 13th, the first day of the teenth week
     */
    public function testWednesteenthOfFebruary2013(): void
    {
        $expected = new DateTimeImmutable("2013/2/13");

        $actual = meetup_day(2013, 2, "teenth", "Wednesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 008a8674-1958-45b5-b8e6-c2c9960d973a
     * @testdox when teenth Wednesday is the 19th, the last day of the teenth week
     */
    public function testWednesteenthOfJune2013(): void
    {
        $expected = new DateTimeImmutable("2013/6/19");

        $actual = meetup_day(2013, 6, "teenth", "Wednesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: e4abd5e3-57cb-4091-8420-d97e955c0dbd
     * @testdox when teenth Thursday is some day in the middle of the teenth week
     */
    public function testThursteenthOfMay2013(): void
    {
        $expected = new DateTimeImmutable("2013/5/16");

        $actual = meetup_day(2013, 5, "teenth", "Thursday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 85da0b0f-eace-4297-a6dd-63588d5055b4
     * @testdox when teenth Thursday is the 13th, the first day of the teenth week
     */
    public function testThursteenthOfJune2013(): void
    {
        $expected = new DateTimeImmutable("2013/6/13");

        $actual = meetup_day(2013, 6, "teenth", "Thursday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: ecf64f9b-8413-489b-bf6e-128045f70bcc
     * @testdox when teenth Thursday is the 19th, the last day of the teenth week
     */
    public function testThursteenthOfSeptember2013(): void
    {
        $expected = new DateTimeImmutable("2013/9/19");

        $actual = meetup_day(2013, 9, "teenth", "Thursday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: ac4e180c-7d0a-4d3d-b05f-f564ebb584ca
     * @testdox when teenth Friday is the 19th, the last day of the teenth week
     */
    public function testFriteenthOfApril2013(): void
    {
        $expected = new DateTimeImmutable("2013/4/19");

        $actual = meetup_day(2013, 4, "teenth", "Friday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: b79101c7-83ad-4f8f-8ec8-591683296315
     * @testdox when teenth Friday is some day in the middle of the teenth week
     */
    public function testFriteenthOfAugust2013(): void
    {
        $expected = new DateTimeImmutable("2013/8/16");

        $actual = meetup_day(2013, 8, "teenth", "Friday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 6ed38b9f-0072-4901-bd97-7c8b8b0ef1b8
     * @testdox when teenth Friday is the 13th, the first day of the teenth week
     */
    public function testFriteenthOfSeptember2013(): void
    {
        $expected = new DateTimeImmutable("2013/9/13");

        $actual = meetup_day(2013, 9, "teenth", "Friday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: dfae03ed-9610-47de-a632-655ab01e1e7c
     * @testdox when teenth Saturday is some day in the middle of the teenth week
     */
    public function testSaturteenthOfFebruary2013(): void
    {
        $expected = new DateTimeImmutable("2013/2/16");

        $actual = meetup_day(2013, 2, "teenth", "Saturday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: ec02e3e1-fc72-4a3c-872f-a53fa8ab358e
     * @testdox when teenth Saturday is the 13th, the first day of the teenth week
     */
    public function testSaturteenthOfApril2013(): void
    {
        $expected = new DateTimeImmutable("2013/4/13");

        $actual = meetup_day(2013, 4, "teenth", "Saturday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: d983094b-7259-4195-b84e-5d09578c89d9
     * @testdox when teenth Saturday is the 19th, the last day of the teenth week
     */
    public function testSaturteenthOfOctober2013(): void
    {
        $expected = new DateTimeImmutable("2013/10/19");

        $actual = meetup_day(2013, 10, "teenth", "Saturday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: d84a2a2e-f745-443a-9368-30051be60c2e
     * @testdox when teenth Sunday is the 19th, the last day of the teenth week
     */
    public function testSunteenthOfMay2013(): void
    {
        $expected = new DateTimeImmutable("2013/5/19");

        $actual = meetup_day(2013, 5, "teenth", "Sunday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 0e64bc53-92a3-4f61-85b2-0b7168c7ce5a
     * @testdox when teenth Sunday is some day in the middle of the teenth week
     */
    public function testSunteenthOfJune2013(): void
    {
        $expected = new DateTimeImmutable("2013/6/16");

        $actual = meetup_day(2013, 6, "teenth", "Sunday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: de87652c-185e-4854-b3ae-04cf6150eead
     * @testdox when teenth Sunday is the 13th, the first day of the teenth week
     */
    public function testSunteenthOfOctober2013(): void
    {
        $expected = new DateTimeImmutable("2013/10/13");

        $actual = meetup_day(2013, 10, "teenth", "Sunday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 2cbfd0f5-ba3a-46da-a8cc-0fe4966d3411
     * @testdox when first Monday is some day in the middle of the first week
     */
    public function testFirstMondayOfMarch2013(): void
    {
        $expected = new DateTimeImmutable("2013/3/4");

        $actual = meetup_day(2013, 3, "first", "Monday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: a6168c7c-ed95-4bb3-8f92-c72575fc64b0
     * @testdox when first Monday is the 1st, the first day of the first week
     */
    public function testFirstMondayOfApril2013(): void
    {
        $expected = new DateTimeImmutable("2013/4/1");

        $actual = meetup_day(2013, 4, "first", "Monday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 1bfc620f-1c54-4bbd-931f-4a1cd1036c20
     * @testdox when first Tuesday is the 7th, the last day of the first week
     */
    public function testFirstTuesdayOfMay2013(): void
    {
        $expected = new DateTimeImmutable("2013/5/7");

        $actual = meetup_day(2013, 5, "first", "Tuesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 12959c10-7362-4ca0-a048-50cf1c06e3e2
     * @testdox when first Tuesday is some day in the middle of the first week
     */
    public function testFirstTuesdayOfJune2013(): void
    {
        $expected = new DateTimeImmutable("2013/6/4");

        $actual = meetup_day(2013, 6, "first", "Tuesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 1033dc66-8d0b-48a1-90cb-270703d59d1d
     * @testdox when first Wednesday is some day in the middle of the first week
     */
    public function testFirstWednesdayOfJuly2013(): void
    {
        $expected = new DateTimeImmutable("2013/7/3");

        $actual = meetup_day(2013, 7, "first", "Wednesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: b89185b9-2f32-46f4-a602-de20b09058f6
     * @testdox when first Wednesday is the 7th, the last day of the first week
     */
    public function testFirstWednesdayOfAugust2013(): void
    {
        $expected = new DateTimeImmutable("2013/8/7");

        $actual = meetup_day(2013, 8, "first", "Wednesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 53aedc4d-b2c8-4dfb-abf7-a8dc9cdceed5
     * @testdox when first Thursday is some day in the middle of the first week
     */
    public function testFirstThursdayOfSeptember2013(): void
    {
        $expected = new DateTimeImmutable("2013/9/5");

        $actual = meetup_day(2013, 9, "first", "Thursday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: b420a7e3-a94c-4226-870a-9eb3a92647f0
     * @testdox when first Thursday is another day in the middle of the first week
     */
    public function testFirstThursdayOfOctober2013(): void
    {
        $expected = new DateTimeImmutable("2013/10/3");

        $actual = meetup_day(2013, 10, "first", "Thursday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 61df3270-28b4-4713-bee2-566fa27302ca
     * @testdox when first Friday is the 1st, the first day of the first week
     */
    public function testFirstFridayOfNovember2013(): void
    {
        $expected = new DateTimeImmutable("2013/11/1");

        $actual = meetup_day(2013, 11, "first", "Friday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: cad33d4d-595c-412f-85cf-3874c6e07abf
     * @testdox when first Friday is some day in the middle of the first week
     */
    public function testFirstFridayOfDecember2013(): void
    {
        $expected = new DateTimeImmutable("2013/12/6");

        $actual = meetup_day(2013, 12, "first", "Friday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: a2869b52-5bba-44f0-a863-07bd1f67eadb
     * @testdox when first Saturday is some day in the middle of the first week
     */
    public function testFirstSaturdayOfJanuary2013(): void
    {
        $expected = new DateTimeImmutable("2013/1/5");

        $actual = meetup_day(2013, 1, "first", "Saturday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 3585315a-d0db-4ea1-822e-0f22e2a645f5
     * @testdox when first Saturday is another day in the middle of the first week
     */
    public function testFirstSaturdayOfFebruary2013(): void
    {
        $expected = new DateTimeImmutable("2013/2/2");

        $actual = meetup_day(2013, 2, "first", "Saturday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: c49e9bd9-8ccf-4cf2-947a-0ccd4e4f10b1
     * @testdox when first Sunday is some day in the middle of the first week
     */
    public function testFirstSundayOfMarch2013(): void
    {
        $expected = new DateTimeImmutable("2013/3/3");

        $actual = meetup_day(2013, 3, "first", "Sunday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 1513328b-df53-4714-8677-df68c4f9366c
     * @testdox when first Sunday is the 7th, the last day of the first week
     */
    public function testFirstSundayOfApril2013(): void
    {
        $expected = new DateTimeImmutable("2013/4/7");

        $actual = meetup_day(2013, 4, "first", "Sunday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 49e083af-47ec-4018-b807-62ef411efed7
     * @testdox when second Monday is some day in the middle of the second week
     */
    public function testSecondMondayOfMarch2013(): void
    {
        $expected = new DateTimeImmutable("2013/3/11");

        $actual = meetup_day(2013, 3, "second", "Monday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 6cb79a73-38fe-4475-9101-9eec36cf79e5
     * @testdox when second Monday is the 8th, the first day of the second week
     */
    public function testSecondMondayOfApril2013(): void
    {
        $expected = new DateTimeImmutable("2013/4/8");

        $actual = meetup_day(2013, 4, "second", "Monday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 4c39b594-af7e-4445-aa03-bf4f8effd9a1
     * @testdox when second Tuesday is the 14th, the last day of the second week
     */
    public function testSecondTuesdayOfMay2013(): void
    {
        $expected = new DateTimeImmutable("2013/5/14");

        $actual = meetup_day(2013, 5, "second", "Tuesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 41b32c34-2e39-40e3-b790-93539aaeb6dd
     * @testdox when second Tuesday is some day in the middle of the second week
     */
    public function testSecondTuesdayOfJune2013(): void
    {
        $expected = new DateTimeImmutable("2013/6/11");

        $actual = meetup_day(2013, 6, "second", "Tuesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 90a160c5-b5d9-4831-927f-63a78b17843d
     * @testdox when second Wednesday is some day in the middle of the second week
     */
    public function testSecondWednesdayOfJuly2013(): void
    {
        $expected = new DateTimeImmutable("2013/7/10");

        $actual = meetup_day(2013, 7, "second", "Wednesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 23b98ce7-8dd5-41a1-9310-ef27209741cb
     * @testdox when second Wednesday is the 14th, the last day of the second week
     */
    public function testSecondWednesdayOfAugust2013(): void
    {
        $expected = new DateTimeImmutable("2013/8/14");

        $actual = meetup_day(2013, 8, "second", "Wednesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 447f1960-27ca-4729-bc3f-f36043f43ed0
     * @testdox when second Thursday is some day in the middle of the second week
     */
    public function testSecondThursdayOfSeptember2013(): void
    {
        $expected = new DateTimeImmutable("2013/9/12");

        $actual = meetup_day(2013, 9, "second", "Thursday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: c9aa2687-300c-4e79-86ca-077849a81bde
     * @testdox when second Thursday is another day in the middle of the second week
     */
    public function testSecondThursdayOfOctober2013(): void
    {
        $expected = new DateTimeImmutable("2013/10/10");

        $actual = meetup_day(2013, 10, "second", "Thursday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: a7e11ef3-6625-4134-acda-3e7195421c09
     * @testdox when second Friday is the 8th, the first day of the second week
     */
    public function testSecondFridayOfNovember2013(): void
    {
        $expected = new DateTimeImmutable("2013/11/8");

        $actual = meetup_day(2013, 11, "second", "Friday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 8b420e5f-9290-4106-b5ae-022f3e2a3e41
     * @testdox when second Friday is some day in the middle of the second week
     */
    public function testSecondFridayOfDecember2013(): void
    {
        $expected = new DateTimeImmutable("2013/12/13");

        $actual = meetup_day(2013, 12, "second", "Friday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 80631afc-fc11-4546-8b5f-c12aaeb72b4f
     * @testdox when second Saturday is some day in the middle of the second week
     */
    public function testSecondSaturdayOfJanuary2013(): void
    {
        $expected = new DateTimeImmutable("2013/1/12");

        $actual = meetup_day(2013, 1, "second", "Saturday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: e34d43ac-f470-44c2-aa5f-e97b78ecaf83
     * @testdox when second Saturday is another day in the middle of the second week
     */
    public function testSecondSaturdayOfFebruary2013(): void
    {
        $expected = new DateTimeImmutable("2013/2/9");

        $actual = meetup_day(2013, 2, "second", "Saturday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: a57d59fd-1023-47ad-b0df-a6feb21b44fc
     * @testdox when second Sunday is some day in the middle of the second week
     */
    public function testSecondSundayOfMarch2013(): void
    {
        $expected = new DateTimeImmutable("2013/3/10");

        $actual = meetup_day(2013, 3, "second", "Sunday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: a829a8b0-abdd-4ad1-b66c-5560d843c91a
     * @testdox when second Sunday is the 14th, the last day of the second week
     */
    public function testSecondSundayOfApril2013(): void
    {
        $expected = new DateTimeImmutable("2013/4/14");

        $actual = meetup_day(2013, 4, "second", "Sunday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 501a8a77-6038-4fc0-b74c-33634906c29d
     * @testdox when third Monday is some day in the middle of the third week
     */
    public function testThirdMondayOfMarch2013(): void
    {
        $expected = new DateTimeImmutable("2013/3/18");

        $actual = meetup_day(2013, 3, "third", "Monday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 49e4516e-cf32-4a58-8bbc-494b7e851c92
     * @testdox when third Monday is the 15th, the first day of the third week
     */
    public function testThirdMondayOfApril2013(): void
    {
        $expected = new DateTimeImmutable("2013/4/15");

        $actual = meetup_day(2013, 4, "third", "Monday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 4db61095-f7c7-493c-85f1-9996ad3012c7
     * @testdox when third Tuesday is the 21st, the last day of the third week
     */
    public function testThirdTuesdayOfMay2013(): void
    {
        $expected = new DateTimeImmutable("2013/5/21");

        $actual = meetup_day(2013, 5, "third", "Tuesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 714fc2e3-58d0-4b91-90fd-61eefd2892c0
     * @testdox when third Tuesday is some day in the middle of the third week
     */
    public function testThirdTuesdayOfJune2013(): void
    {
        $expected = new DateTimeImmutable("2013/6/18");

        $actual = meetup_day(2013, 6, "third", "Tuesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: b08a051a-2c80-445b-9b0e-524171a166d1
     * @testdox when third Wednesday is some day in the middle of the third week
     */
    public function testThirdWednesdayOfJuly2013(): void
    {
        $expected = new DateTimeImmutable("2013/7/17");

        $actual = meetup_day(2013, 7, "third", "Wednesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 80bb9eff-3905-4c61-8dc9-bb03016d8ff8
     * @testdox when third Wednesday is the 21st, the last day of the third week
     */
    public function testThirdWednesdayOfAugust2013(): void
    {
        $expected = new DateTimeImmutable("2013/8/21");

        $actual = meetup_day(2013, 8, "third", "Wednesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: fa52a299-f77f-4784-b290-ba9189fbd9c9
     * @testdox when third Thursday is some day in the middle of the third week
     */
    public function testThirdThursdayOfSeptember2013(): void
    {
        $expected = new DateTimeImmutable("2013/9/19");

        $actual = meetup_day(2013, 9, "third", "Thursday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: f74b1bc6-cc5c-4bf1-ba69-c554a969eb38
     * @testdox when third Thursday is another day in the middle of the third week
     */
    public function testThirdThursdayOfOctober2013(): void
    {
        $expected = new DateTimeImmutable("2013/10/17");

        $actual = meetup_day(2013, 10, "third", "Thursday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 8900f3b0-801a-466b-a866-f42d64667abd
     * @testdox when third Friday is the 15th, the first day of the third week
     */
    public function testThirdFridayOfNovember2013(): void
    {
        $expected = new DateTimeImmutable("2013/11/15");

        $actual = meetup_day(2013, 11, "third", "Friday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 538ac405-a091-4314-9ccd-920c4e38e85e
     * @testdox when third Friday is some day in the middle of the third week
     */
    public function testThirdFridayOfDecember2013(): void
    {
        $expected = new DateTimeImmutable("2013/12/20");

        $actual = meetup_day(2013, 12, "third", "Friday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 244db35c-2716-4fa0-88ce-afd58e5cf910
     * @testdox when third Saturday is some day in the middle of the third week
     */
    public function testThirdSaturdayOfJanuary2013(): void
    {
        $expected = new DateTimeImmutable("2013/1/19");

        $actual = meetup_day(2013, 1, "third", "Saturday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: dd28544f-f8fa-4f06-9bcd-0ad46ce68e9e
     * @testdox when third Saturday is another day in the middle of the third week
     */
    public function testThirdSaturdayOfFebruary2013(): void
    {
        $expected = new DateTimeImmutable("2013/2/16");

        $actual = meetup_day(2013, 2, "third", "Saturday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: be71dcc6-00d2-4b53-a369-cbfae55b312f
     * @testdox when third Sunday is some day in the middle of the third week
     */
    public function testThirdSundayOfMarch2013(): void
    {
        $expected = new DateTimeImmutable("2013/3/17");

        $actual = meetup_day(2013, 3, "third", "Sunday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: b7d2da84-4290-4ee6-a618-ee124ae78be7
     * @testdox when third Sunday is the 21st, the last day of the third week
     */
    public function testThirdSundayOfApril2013(): void
    {
        $expected = new DateTimeImmutable("2013/4/21");

        $actual = meetup_day(2013, 4, "third", "Sunday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 4276dc06-a1bd-4fc2-b6c2-625fee90bc88
     * @testdox when fourth Monday is some day in the middle of the fourth week
     */
    public function testFourthMondayOfMarch2013(): void
    {
        $expected = new DateTimeImmutable("2013/3/25");

        $actual = meetup_day(2013, 3, "fourth", "Monday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: ddbd7976-2deb-4250-8a38-925ac1a8e9a2
     * @testdox when fourth Monday is the 22nd, the first day of the fourth week
     */
    public function testFourthMondayOfApril2013(): void
    {
        $expected = new DateTimeImmutable("2013/4/22");

        $actual = meetup_day(2013, 4, "fourth", "Monday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: eb714ef4-1656-47cc-913c-844dba4ebddd
     * @testdox when fourth Tuesday is the 28th, the last day of the fourth week
     */
    public function testFourthTuesdayOfMay2013(): void
    {
        $expected = new DateTimeImmutable("2013/5/28");

        $actual = meetup_day(2013, 5, "fourth", "Tuesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 16648435-7937-4d2d-b118-c3e38fd084bd
     * @testdox when fourth Tuesday is some day in the middle of the fourth week
     */
    public function testFourthTuesdayOfJune2013(): void
    {
        $expected = new DateTimeImmutable("2013/6/25");

        $actual = meetup_day(2013, 6, "fourth", "Tuesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: de062bdc-9484-437a-a8c5-5253c6f6785a
     * @testdox when fourth Wednesday is some day in the middle of the fourth week
     */
    public function testFourthWednesdayOfJuly2013(): void
    {
        $expected = new DateTimeImmutable("2013/7/24");

        $actual = meetup_day(2013, 7, "fourth", "Wednesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: c2ce6821-169c-4832-8d37-690ef5d9514a
     * @testdox when fourth Wednesday is the 28th, the last day of the fourth week
     */
    public function testFourthWednesdayOfAugust2013(): void
    {
        $expected = new DateTimeImmutable("2013/8/28");

        $actual = meetup_day(2013, 8, "fourth", "Wednesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: d462c631-2894-4391-a8e3-dbb98b7a7303
     * @testdox when fourth Thursday is some day in the middle of the fourth week
     */
    public function testFourthThursdayOfSeptember2013(): void
    {
        $expected = new DateTimeImmutable("2013/9/26");

        $actual = meetup_day(2013, 9, "fourth", "Thursday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 9ff1f7b6-1b72-427d-9ee9-82b5bb08b835
     * @testdox when fourth Thursday is another day in the middle of the fourth week
     */
    public function testFourthThursdayOfOctober2013(): void
    {
        $expected = new DateTimeImmutable("2013/10/24");

        $actual = meetup_day(2013, 10, "fourth", "Thursday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 83bae8ba-1c49-49bc-b632-b7c7e1d7e35f
     * @testdox when fourth Friday is the 22nd, the first day of the fourth week
     */
    public function testFourthFridayOfNovember2013(): void
    {
        $expected = new DateTimeImmutable("2013/11/22");

        $actual = meetup_day(2013, 11, "fourth", "Friday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: de752d2a-a95e-48d2-835b-93363dac3710
     * @testdox when fourth Friday is some day in the middle of the fourth week
     */
    public function testFourthFridayOfDecember2013(): void
    {
        $expected = new DateTimeImmutable("2013/12/27");

        $actual = meetup_day(2013, 12, "fourth", "Friday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: eedd90ad-d581-45db-8312-4c6dcf9cf560
     * @testdox when fourth Saturday is some day in the middle of the fourth week
     */
    public function testFourthSaturdayOfJanuary2013(): void
    {
        $expected = new DateTimeImmutable("2013/1/26");

        $actual = meetup_day(2013, 1, "fourth", "Saturday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 669fedcd-912e-48c7-a0a1-228b34af91d0
     * @testdox when fourth Saturday is another day in the middle of the fourth week
     */
    public function testFourthSaturdayOfFebruary2013(): void
    {
        $expected = new DateTimeImmutable("2013/2/23");

        $actual = meetup_day(2013, 2, "fourth", "Saturday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 648e3849-ea49-44a5-a8a3-9f2a43b3bf1b
     * @testdox when fourth Sunday is some day in the middle of the fourth week
     */
    public function testFourthSundayOfMarch2013(): void
    {
        $expected = new DateTimeImmutable("2013/3/24");

        $actual = meetup_day(2013, 3, "fourth", "Sunday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: f81321b3-99ab-4db6-9267-69c5da5a7823
     * @testdox when fourth Sunday is the 28th, the last day of the fourth week
     */
    public function testFourthSundayOfApril2013(): void
    {
        $expected = new DateTimeImmutable("2013/4/28");

        $actual = meetup_day(2013, 4, "fourth", "Sunday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 1af5e51f-5488-4548-aee8-11d7d4a730dc
     * @testdox last Monday in a month with four Mondays
     */
    public function testLastMondayOfMarch2013(): void
    {
        $expected = new DateTimeImmutable("2013/3/25");

        $actual = meetup_day(2013, 3, "last", "Monday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: f29999f2-235e-4ec7-9dab-26f137146526
     * @testdox last Monday in a month with five Mondays
     */
    public function testLastMondayOfApril2013(): void
    {
        $expected = new DateTimeImmutable("2013/4/29");

        $actual = meetup_day(2013, 4, "last", "Monday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 31b097a0-508e-48ac-bf8a-f63cdcf6dc41
     * @testdox last Tuesday in a month with four Tuesdays
     */
    public function testLastTuesdayOfMay2013(): void
    {
        $expected = new DateTimeImmutable("2013/5/28");

        $actual = meetup_day(2013, 5, "last", "Tuesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 8c022150-0bb5-4a1f-80f9-88b2e2abcba4
     * @testdox last Tuesday in another month with four Tuesdays
     */
    public function testLastTuesdayOfJune2013(): void
    {
        $expected = new DateTimeImmutable("2013/6/25");

        $actual = meetup_day(2013, 6, "last", "Tuesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 0e762194-672a-4bdf-8a37-1e59fdacef12
     * @testdox last Wednesday in a month with five Wednesdays
     */
    public function testLastWednesdayOfJuly2013(): void
    {
        $expected = new DateTimeImmutable("2013/7/31");

        $actual = meetup_day(2013, 7, "last", "Wednesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 5016386a-f24e-4bd7-b439-95358f491b66
     * @testdox last Wednesday in a month with four Wednesdays
     */
    public function testLastWednesdayOfAugust2013(): void
    {
        $expected = new DateTimeImmutable("2013/8/28");

        $actual = meetup_day(2013, 8, "last", "Wednesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 12ead1a5-cdf9-4192-9a56-2229e93dd149
     * @testdox last Thursday in a month with four Thursdays
     */
    public function testLastThursdayOfSeptember2013(): void
    {
        $expected = new DateTimeImmutable("2013/9/26");

        $actual = meetup_day(2013, 9, "last", "Thursday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 7db89e11-7fbe-4e57-ae3c-0f327fbd7cc7
     * @testdox last Thursday in a month with five Thursdays
     */
    public function testLastThursdayOfOctober2013(): void
    {
        $expected = new DateTimeImmutable("2013/10/31");

        $actual = meetup_day(2013, 10, "last", "Thursday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: e47a739e-b979-460d-9c8a-75c35ca2290b
     * @testdox last Friday in a month with five Fridays
     */
    public function testLastFridayOfNovember2013(): void
    {
        $expected = new DateTimeImmutable("2013/11/29");

        $actual = meetup_day(2013, 11, "last", "Friday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 5bed5aa9-a57a-4e5d-8997-2cc796a5b0ec
     * @testdox last Friday in a month with four Fridays
     */
    public function testLastFridayOfDecember2013(): void
    {
        $expected = new DateTimeImmutable("2013/12/27");

        $actual = meetup_day(2013, 12, "last", "Friday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 61e54cba-76f3-4772-a2b1-bf443fda2137
     * @testdox last Saturday in a month with four Saturdays
     */
    public function testLastSaturdayOfJanuary2013(): void
    {
        $expected = new DateTimeImmutable("2013/1/26");

        $actual = meetup_day(2013, 1, "last", "Saturday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 8b6a737b-2fa9-444c-b1a2-80ce7a2ec72f
     * @testdox last Saturday in another month with four Saturdays
     */
    public function testLastSaturdayOfFebruary2013(): void
    {
        $expected = new DateTimeImmutable("2013/2/23");

        $actual = meetup_day(2013, 2, "last", "Saturday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 0b63e682-f429-4d19-9809-4a45bd0242dc
     * @testdox last Sunday in a month with five Sundays
     */
    public function testLastSundayOfMarch2013(): void
    {
        $expected = new DateTimeImmutable("2013/3/31");

        $actual = meetup_day(2013, 3, "last", "Sunday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 5232307e-d3e3-4afc-8ba6-4084ad987c00
     * @testdox last Sunday in a month with four Sundays
     */
    public function testLastSundayOfApril2013(): void
    {
        $expected = new DateTimeImmutable("2013/4/28");

        $actual = meetup_day(2013, 4, "last", "Sunday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 0bbd48e8-9773-4e81-8e71-b9a51711e3c5
     * @testdox last Wednesday in February in a leap year is the 29th
     */
    public function testLastWednesdayOfFebruary2012(): void
    {
        $expected = new DateTimeImmutable("2012/2/29");

        $actual = meetup_day(2012, 2, "last", "Wednesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: fe0936de-7eee-4a48-88dd-66c07ab1fefc
     * @testdox last Wednesday in December that is also the last day of the year
     */
    public function testLastWednesdayOfDecember2014(): void
    {
        $expected = new DateTimeImmutable("2014/12/31");

        $actual = meetup_day(2014, 12, "last", "Wednesday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 2ccf2488-aafc-4671-a24e-2b6effe1b0e2
     * @testdox last Sunday in February in a non-leap year is not the 29th
     */
    public function testLastSundayOfFebruary2015(): void
    {
        $expected = new DateTimeImmutable("2015/2/22");

        $actual = meetup_day(2015, 2, "last", "Sunday");

        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 00c3ce9f-cf36-4b70-90d8-92b32be6830e
     * @testdox when first Friday is the 7th, the last day of the first week
     */
    public function testFirstFridayOfDecember2012(): void
    {
        $expected = new DateTimeImmutable("2012/12/7");

        $actual = meetup_day(2012, 12, "first", "Friday");

        $this->assertEquals($expected, $actual);
    }
}
