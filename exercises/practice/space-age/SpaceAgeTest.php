<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class SpaceAgeTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'SpaceAge.php';
    }

    public const DELTA = 0.01;

    /**
     * uuid 84f609af-5a91-4d68-90a3-9e32d8a5cd34
     */
    #[TestDox('Age on Earth')]
    public function testAgeOnEarth(): void
    {
        $age = new SpaceAge(1000000000);
        $this->assertEqualsWithDelta(31.69, $age->earth(), self::DELTA);
    }

    /**
     * uuid ca20c4e9-6054-458c-9312-79679ffab40b
     */
    #[TestDox('Age on Mercury')]
    public function testAgeOnMercury(): void
    {
        $age = new SpaceAge(2134835688);
        $this->assertEqualsWithDelta(280.88, $age->mercury(), self::DELTA);
    }

    /**
     * uuid 502c6529-fd1b-41d3-8fab-65e03082b024
     */
    #[TestDox('Age on Venus')]
    public function testAgeOnVenus(): void
    {
        $age = new SpaceAge(189839836);
        $this->assertEqualsWithDelta(9.78, $age->venus(), self::DELTA);
    }

    /**
     * uuid 9ceadf5e-a0d5-4388-9d40-2c459227ceb8
     */
    #[TestDox('Age on Mars')]
    public function testAgeOnMars(): void
    {
        $age = new SpaceAge(2129871239);
        $this->assertEqualsWithDelta(35.88, $age->mars(), self::DELTA);
    }

    /**
     * uuid 42927dc3-fe5e-4f76-a5b5-f737fc19bcde
     */
    #[TestDox('Age on Jupiter')]
    public function testAgeOnJupiter(): void
    {
        $age = new SpaceAge(901876382);
        $this->assertEqualsWithDelta(2.41, $age->jupiter(), self::DELTA);
    }

    /**
     * uuid 8469b332-7837-4ada-b27c-00ee043ebcad
     */
    #[TestDox('Age on Saturn')]
    public function testAgeOnSaturn(): void
    {
        $age = new SpaceAge(2000000000);
        $this->assertEqualsWithDelta(2.15, $age->saturn(), self::DELTA);
    }

    /**
     * uuid 999354c1-76f8-4bb5-a672-f317b6436743
     */
    #[TestDox('Age on Uranus')]
    public function testAgeOnUranus(): void
    {
        $age = new SpaceAge(1210123456);
        $this->assertEqualsWithDelta(0.46, $age->uranus(), self::DELTA);
    }

    /**
     * uuid 80096d30-a0d4-4449-903e-a381178355d8
     */
    #[TestDox('Age on Neptune')]
    public function testAgeOnNeptune(): void
    {
        $age = new SpaceAge(1821023456);
        $this->assertEqualsWithDelta(0.35, $age->neptune(), self::DELTA);
    }
}
