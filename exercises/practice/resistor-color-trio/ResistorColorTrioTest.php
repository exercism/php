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

class ResistorColorTrioTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'ResistorColorTrio.php';
    }

    public function testOrangeOrangeAndBlack(): void
    {
        $this->assertEquals('33 ohms', ResistorColorTrio::label(['orange', 'orange', 'black']));
    }

    public function testBlueGreyAndBrown(): void
    {
        $this->assertEquals('680 ohms', ResistorColorTrio::label(['blue', 'grey', 'brown']));
    }

    public function testRedBlackAndRed(): void
    {
        $this->assertEquals('2 kiloohms', ResistorColorTrio::label(['red', 'black', 'red']));
    }

    public function testGreenBrownAndOrange(): void
    {
        $this->assertEquals('51 kiloohms', ResistorColorTrio::label(['green', 'brown', 'orange']));
    }

    public function testYellowVioletAndYellow(): void
    {
        $this->assertEquals('470 kiloohms', ResistorColorTrio::label(['yellow', 'violet', 'yellow']));
    }

    public function testBlueVioletAndBlue(): void
    {
        $this->assertEquals('67 megaohms', ResistorColorTrio::label(['blue', 'violet', 'blue']));
    }

    public function testMinimumPossibleValue(): void
    {
        $this->assertEquals('0 ohms', ResistorColorTrio::label(['black', 'black', 'black']));
    }

    public function testMaximumPossibleValue(): void
    {
        $this->assertEquals('99 gigaohms', ResistorColorTrio::label(['white', 'white', 'white']));
    }

    public function testFirstTwoNumbersAreInvalidOctal(): void
    {
        $this->assertEquals('8 ohms', ResistorColorTrio::label(['black', 'grey', 'black']));
    }

    public function testIgnoreExtraColors(): void
    {
        $this->assertEquals('650 kiloohms', ResistorColorTrio::label(['blue', 'green', 'yellow', 'orange']));
    }
}
