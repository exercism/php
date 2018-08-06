<?php

require "space-age.php";

class SpaceAgeTester extends PHPUnit\Framework\TestCase
{
    const DELTA = 0.01;

    public function testAgeInSeconds()
    {
        $age = new SpaceAge(1000000);
        $this->assertEquals(1000000, $age->seconds());
    }

    public function testAgeOnEarth()
    {
        $age = new SpaceAge(1000000000);
        $this->assertEquals(31.69, $age->earth(), '', self::DELTA);
    }

    public function testAgeOnMercury()
    {
        $age = new SpaceAge(2134835688);
        $this->assertEquals(280.88, $age->mercury(), '', self::DELTA);
    }

    public function testAgeOnVenus()
    {
        $age = new SpaceAge(189839836);
        $this->assertEquals(9.78, $age->venus(), '', self::DELTA);
    }

    public function testAgeOnMars()
    {
        $age = new SpaceAge(2329871239);
        $this->assertEquals(39.25, $age->mars(), '', self::DELTA);
    }

    public function testAgeOnJupiter()
    {
        $age = new SpaceAge(901876382);
        $this->assertEquals(2.41, $age->jupiter(), '', self::DELTA);
    }

    public function testAgeOnSaturn()
    {
        $age = new SpaceAge(3000000000);
        $this->assertEquals(3.23, $age->saturn(), '', self::DELTA);
    }

    public function testAgeOnUranus()
    {
        $age = new SpaceAge(3210123456);
        $this->assertEquals(1.21, $age->uranus(), '', self::DELTA);
    }

    public function testAgeOnNeptune()
    {
        $age = new SpaceAge(8210123456);
        $this->assertEquals(1.58, $age->neptune(), '', self::DELTA);
    }
}
