<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ResistorColorDuoTest extends TestCase
{
    private ResistorColorDuo $resistor;

    public static function setUpBeforeClass(): void
    {
        require_once 'ResistorColorDuo.php';
    }

    public function setUp(): void
    {
        $this->resistor = new ResistorColorDuo();
    }

    public function testBrownAndBlack(): void
    {
        $this->assertEquals(10, $this->resistor->getColorsValue(['brown', 'black']));
    }

    public function testBlueAndGrey(): void
    {
        $this->assertEquals(68, $this->resistor->getColorsValue(['blue', 'grey']));
    }

    public function testYellowAndViolet(): void
    {
        $this->assertEquals(47, $this->resistor->getColorsValue(['yellow', 'violet']));
    }

    public function testWhiteAndRed(): void
    {
        $this->assertEquals(92, $this->resistor->getColorsValue(['white', 'red']));
    }

    public function testOrangeAndOrange(): void
    {
        $this->assertEquals(33, $this->resistor->getColorsValue(['orange', 'orange']));
    }

    public function testAdditionalColorsAreIgnored(): void
    {
        $this->assertEquals(51, $this->resistor->getColorsValue(['green', 'brown', 'orange']));
    }

    public function testBlackAndBrownSingleDigit(): void
    {
        $this->assertEquals(1, $this->resistor->getColorsValue(['black', 'brown']));
    }
}
