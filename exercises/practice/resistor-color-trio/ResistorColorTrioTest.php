<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class ResistorColorTrioTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'ResistorColorTrio.php';
    }

    /**
     * uuid d6863355-15b7-40bb-abe0-bfb1a25512ed
     */
    #[TestDox('Orange and orange and black')]
    public function testOrangeAndOrangeAndBlack(): void
    {
        $resistor = new ResistorColorTrio();
        $this->assertEquals('33 ohms', $resistor->label(['orange', 'orange', 'black']));
    }

    /**
     * uuid 1224a3a9-8c8e-4032-843a-5224e04647d6
     */
    #[TestDox('Blue and grey and brown')]
    public function testBlueAndGreyAndBrown(): void
    {
        $resistor = new ResistorColorTrio();
        $this->assertEquals('680 ohms', $resistor->label(['blue', 'grey', 'brown']));
    }

    /**
     * uuid b8bda7dc-6b95-4539-abb2-2ad51d66a207
     */
    #[TestDox('Red and black and red')]
    public function testRedAndBlackAndRed(): void
    {
        $resistor = new ResistorColorTrio();
        $this->assertEquals('2 kiloohms', $resistor->label(['red', 'black', 'red']));
    }

    /**
     * uuid 5b1e74bc-d838-4eda-bbb3-eaba988e733b
     */
    #[TestDox('Green and brown and orange')]
    public function testGreenAndBrownAndOrange(): void
    {
        $resistor = new ResistorColorTrio();
        $this->assertEquals('51 kiloohms', $resistor->label(['green', 'brown', 'orange']));
    }

    /**
     * uuid f5d37ef9-1919-4719-a90d-a33c5a6934c9
     */
    #[TestDox('Yellow and violet and yellow')]
    public function testYellowAndVioletAndYellow(): void
    {
        $resistor = new ResistorColorTrio();
        $this->assertEquals('470 kiloohms', $resistor->label(['yellow', 'violet', 'yellow']));
    }

    /**
     * uuid 5f6404a7-5bb3-4283-877d-3d39bcc33854
     */
    #[TestDox('Blue and violet and blue')]
    public function testBlueAndVioletAndBlue(): void
    {
        $resistor = new ResistorColorTrio();
        $this->assertEquals('67 megaohms', $resistor->label(['blue', 'violet', 'blue']));
    }

    /**
     * uuid 7d3a6ab8-e40e-46c3-98b1-91639fff2344
     */
    #[TestDox('Minimum possible value')]
    public function testMinimumPossibleValue(): void
    {
        $resistor = new ResistorColorTrio();
        $this->assertEquals('0 ohms', $resistor->label(['black', 'black', 'black']));
    }

    /**
     * uuid ca0aa0ac-3825-42de-9f07-dac68cc580fd
     */
    #[TestDox('Maximum possible value')]
    public function testMaximumPossibleValue(): void
    {
        $resistor = new ResistorColorTrio();
        $this->assertEquals('99 gigaohms', $resistor->label(['white', 'white', 'white']));
    }

    /**
     * uuid 0061a76c-903a-4714-8ce2-f26ce23b0e09
     */
    #[TestDox('First two colors make an invalid octal number')]
    public function testFirstTwoColorsMakeAnInvalidOctalNumber(): void
    {
        $resistor = new ResistorColorTrio();
        $this->assertEquals('8 ohms', $resistor->label(['black', 'grey', 'black']));
    }

    /**
     * uuid 30872c92-f567-4b69-a105-8455611c10c4
     */
    #[TestDox('Ignore extra colors')]
    public function testIgnoreExtraColors(): void
    {
        $resistor = new ResistorColorTrio();
        $this->assertEquals('650 kiloohms', $resistor->label(['blue', 'green', 'yellow', 'orange']));
    }
}
