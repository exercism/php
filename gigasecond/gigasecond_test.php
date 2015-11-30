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

        $this->assertSame("2043-01-01 01:46:40", $gs->format("Y-m-d H:i:s"));
    }

    public function test2()
    {
        $this->markTestSkipped();
        $date = GigasecondTest::dateSetup("1977-06-13");
        $gs = from($date);

        $this->assertSame("2009-02-19 01:46:40", $gs->format("Y-m-d H:i:s"));
    }

    public function test3()
    {
        $this->markTestSkipped();
        $date = GigasecondTest::dateSetup("1959-7-19");
        $gs = from($date);

        $this->assertSame("1991-03-27 01:46:40", $gs->format("Y-m-d H:i:s"));
    }

    public function test4()
    {
        $this->markTestSkipped();
        $date = GigasecondTest::dateSetup("2015-01-24 22:00:00");
        $gs = from($date);

        $this->assertSame("2046-10-02 23:46:40", $gs->format("Y-m-d H:i:s"));
    }

    public function test5()
    {
        $this->markTestSkipped();
        $date = GigasecondTest::dateSetup("2015-01-24 23:59:59");
        $gs = from($date);

        $this->assertSame("2046-10-03 01:46:39", $gs->format("Y-m-d H:i:s"));
    }

    public function test6()
    {
        $this->markTestSkipped();
        $date = GigasecondTest::dateSetup("2015-01-24");
        $gs = from($date);

        $this->assertNotEquals($date, $gs);
    }

    public function testYourself()
    {
        $this->markTestSkipped("Skip");
        $your_birthday = GigasecondTest::dateSetup("your_birthday");
        $gs = from($your_birthday);

        $this->assertSame("2046-10-03 01:46:39", $gs->format("Y-m-d H:i:s"));
    }
}
