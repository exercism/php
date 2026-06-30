<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ResistorColorTrioTest extends TestCase
{
    private ResistorColorTrio $resistor;

    public static function setUpBeforeClass(): void
    {
        require_once 'ResistorColorTrio.php';
    }

    public function setUp(): void
    {
        $this->resistor = new ResistorColorTrio();
    }

    public function testOrangeOrangeAndBlack(): void
    {
        $this->assertEquals('33 ohms', $this->resistor->label(['orange', 'orange', 'black']));
    }

    public function testBlueGreyAndBrown(): void
    {
        $this->assertEquals('680 ohms', $this->resistor->label(['blue', 'grey', 'brown']));
    }

    public function testRedBlackAndRed(): void
    {
        $this->assertEquals('2 kiloohms', $this->resistor->label(['red', 'black', 'red']));
    }

    public function testGreenBrownAndOrange(): void
    {
        $this->assertEquals('51 kiloohms', $this->resistor->label(['green', 'brown', 'orange']));
    }

    public function testYellowVioletAndYellow(): void
    {
        $this->assertEquals('470 kiloohms', $this->resistor->label(['yellow', 'violet', 'yellow']));
    }

    public function testBlueVioletAndBlue(): void
    {
        $this->assertEquals('67 megaohms', $this->resistor->label(['blue', 'violet', 'blue']));
    }

    public function testMinimumPossibleValue(): void
    {
        $this->assertEquals('0 ohms', $this->resistor->label(['black', 'black', 'black']));
    }

    public function testMaximumPossibleValue(): void
    {
        $this->assertEquals('99 gigaohms', $this->resistor->label(['white', 'white', 'white']));
    }

    public function testFirstTwoNumbersAreInvalidOctal(): void
    {
        $this->assertEquals('8 ohms', $this->resistor->label(['black', 'grey', 'black']));
    }

    public function testIgnoreExtraColors(): void
    {
        $this->assertEquals('650 kiloohms', $this->resistor->label(['blue', 'green', 'yellow', 'orange']));
    }
}
