<?php

require "raindrops.php";

class RaindropsTest extends PHPUnit_Framework_TestCase
{
    public function test1()
    {
        $this->assertSame("1", Raindrops::convert(1));
    }

    public function test3()
    {
        $this->assertSame("Pling", Raindrops::convert(3));
    }

    public function test5()
    {
        $this->assertSame("Plang", Raindrops::convert(5));
    }

    public function test7()
    {
        $this->assertSame("Plong", Raindrops::convert(7));
    }

    public function test6()
    {
        $this->assertSame("Pling", Raindrops::convert(6));
    }

    public function test10()
    {
        $this->assertSame("Plang", Raindrops::convert(10));
    }

    public function test14()
    {
        $this->assertSame("Plong", Raindrops::convert(14));
    }

    public function test15()
    {
        $this->assertSame("PlingPlang", Raindrops::convert(15));
    }

    public function test21()
    {
        $this->assertSame("PlingPlong", Raindrops::convert(21));
    }

    public function test25()
    {
        $this->assertSame("Plang", Raindrops::convert(25));
    }

    public function test35()
    {
        $this->assertSame("PlangPlong", Raindrops::convert(35));
    }

    public function test49()
    {
        $this->assertSame("Plong", Raindrops::convert(49));
    }

    public function test52()
    {
        $this->assertSame("52", Raindrops::convert(52));
    }

    public function test105()
    {
        $this->assertSame("PlingPlangPlong", Raindrops::convert(105));
    }

    public function test12121()
    {
        $this->assertSame("12121", Raindrops::convert(12121));
    }
}
