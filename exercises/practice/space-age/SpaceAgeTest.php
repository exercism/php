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

class SpaceAgeTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'SpaceAge.php';
    }

    public const DELTA = 0.01;

    public function testAgeInSeconds(): void
    {
        $age = new SpaceAge(1000000);
        $this->assertEquals(1000000, $age->seconds());
    }

    public function testAgeOnEarth(): void
    {
        $age = new SpaceAge(1000000000);
        $this->assertEqualsWithDelta(31.69, $age->earth(), self::DELTA);
    }

    public function testAgeOnMercury(): void
    {
        $age = new SpaceAge(2134835688);
        $this->assertEqualsWithDelta(280.88, $age->mercury(), self::DELTA);
    }

    public function testAgeOnVenus(): void
    {
        $age = new SpaceAge(189839836);
        $this->assertEqualsWithDelta(9.78, $age->venus(), self::DELTA);
    }

    public function testAgeOnMars(): void
    {
        $age = new SpaceAge(2329871239);
        $this->assertEqualsWithDelta(39.25, $age->mars(), self::DELTA);
    }

    public function testAgeOnJupiter(): void
    {
        $age = new SpaceAge(901876382);
        $this->assertEqualsWithDelta(2.41, $age->jupiter(), self::DELTA);
    }

    public function testAgeOnSaturn(): void
    {
        $age = new SpaceAge(3000000000);
        $this->assertEqualsWithDelta(3.23, $age->saturn(), self::DELTA);
    }

    public function testAgeOnUranus(): void
    {
        $age = new SpaceAge(3210123456);
        $this->assertEqualsWithDelta(1.21, $age->uranus(), self::DELTA);
    }

    public function testAgeOnNeptune(): void
    {
        $age = new SpaceAge(8210123456);
        $this->assertEqualsWithDelta(1.58, $age->neptune(), self::DELTA);
    }
}
