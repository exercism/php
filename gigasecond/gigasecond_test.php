<?php

require "gigasecond.php";

class GigasecondTest extends \PHPUnit_Framework_TestCase
{
    public function test1()
    {
        $gs = Gigasecond::from(new DateTime("2011-04-25"));

        $this->assertSame($gs->format("Y-m-d"), "2043-01-01");
    }

    public function test2()
    {
        $gs = GigaSecond::from(new DateTime("1977-06-13"));

        $this->assertSame($gs->format("Y-m-d"), "2009-02-19");
    }

    public function test3()
    {
        $gs = Gigasecond::from(new DateTime("1959-7-19"));

        $this->assertSame($gs->format("Y-m-d"), "1991-03-27");
    }

    public function testYourself()
    {
        $your_birthday = new DateTime("your_birthday");

        $gs = Gigasecond::from(new DateTime($your_birthday));

        $this->assertSame($gs->format("Y-m-d"), "2009-01-31");
    }
}
