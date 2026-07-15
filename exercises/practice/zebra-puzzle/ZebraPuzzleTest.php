<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class ZebraPuzzleTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'ZebraPuzzle.php';
    }

    /**
     * uuid: 16efb4e4-8ad7-4d5e-ba96-e5537b66fd42
     */
    #[TestDox('Resident who drinks water')]
    public function testResidentWhoDrinksWater(): void
    {
        $zebraPuzzle = new ZebraPuzzle();
        $this->assertEquals('Norwegian', $zebraPuzzle->waterDrinker());
    }

    /**
     * uuid: 084d5b8b-24e2-40e6-b008-c800da8cd257
     */
    #[TestDox('Resident who owns zebra')]
    public function testResidentWhoOwnsZebra(): void
    {
        $zebraPuzzle = new ZebraPuzzle();
        $this->assertEquals('Japanese', $zebraPuzzle->zebraOwner());
    }
}
