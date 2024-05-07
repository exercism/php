<?php

declare(strict_types=1);

class ZebraPuzzleTest extends PHPUnit\Framework\TestCase
{
    private ZebraPuzzle $zebraPuzzle;

    public static function setUpBeforeClass(): void
    {
        require_once 'ZebraPuzzle.php';
    }

    public function setUp(): void
    {
        $this->zebraPuzzle = new ZebraPuzzle();
    }

    /**
     * uuid: 16efb4e4-8ad7-4d5e-ba96-e5537b66fd42
     * @testdox Resident who drinks water
     */
    public function testResidentWhoDrinksWater(): void
    {
        $this->assertEquals('Norwegian', $this->zebraPuzzle->waterDrinker());
    }

    /**
     * uuid: 084d5b8b-24e2-40e6-b008-c800da8cd257
     * @testdox Resident who owns zebra
     */
    public function testResidentWhoOwnsZebra(): void
    {
        $this->assertEquals('Japanese', $this->zebraPuzzle->zebraOwner());
    }
}
