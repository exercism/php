<?php

require "gigasecond.php";

class GigasecondTest extends \PHPUnit_Framework_TestCase
{

    public function dateSetup($date)
    {
        $UTC = new DateTimeZone("UTC");
        $date = new DateTime($date, $UTC);
        return $date;
    }

    public function test1()
    {
        $date = GigasecondTest::dateSetup("2011-04-25");
        $gs = from($date);

        $this->assertSame($gs->format("Y-m-d"), "2043-01-01");
    }

    public function test2()
    {
        $date = GigasecondTest::dateSetup("1977-06-13");
        $gs = from($date);

        $this->assertSame($gs->format("Y-m-d"), "2009-02-19");
    }

    public function test3()
    {
        $date = GigasecondTest::dateSetup("1959-7-19");
        $gs = from($date);

        $this->assertSame($gs->format("Y-m-d"), "1991-03-27");
    }

    public function testYourself()
    {
        $this->markTestSkipped();
        $your_birthday = GigasecondTest::dateSetup("your_birthday");
        $gs = from($your_birthday);

        $this->assertSame($gs->format("Y-m-d"), "2009-01-31");
    }
}
