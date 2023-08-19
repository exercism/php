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

class ResistorColorDuoTest extends PHPUnit\Framework\TestCase
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
