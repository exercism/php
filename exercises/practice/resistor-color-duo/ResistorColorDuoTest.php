<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
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

    /**
     * uuid ce11995a-5b93-4950-a5e9-93423693b2fc
     */
    #[TestDox('Brown and black')]
    public function testBrownAndBlack(): void
    {
        $this->assertEquals(10, $this->resistor->getColorsValue(['brown', 'black']));
    }

    /**
     * uuid 7bf82f7a-af23-48ba-a97d-38d59406a920
     */
    #[TestDox('Blue and grey')]
    public function testBlueAndGrey(): void
    {
        $this->assertEquals(68, $this->resistor->getColorsValue(['blue', 'grey']));
    }

    /**
     * uuid f1886361-fdfd-4693-acf8-46726fe24e0c
     */
    #[TestDox('Yellow and violet')]
    public function testYellowAndViolet(): void
    {
        $this->assertEquals(47, $this->resistor->getColorsValue(['yellow', 'violet']));
    }

    /**
     * uuid b7a6cbd2-ae3c-470a-93eb-56670b305640
     */
    #[TestDox('White and red')]
    public function testWhiteAndRed(): void
    {
        $this->assertEquals(92, $this->resistor->getColorsValue(['white', 'red']));
    }

    /**
     * uuid 77a8293d-2a83-4016-b1af-991acc12b9fe
     */
    #[TestDox('Orange and orange')]
    public function testOrangeAndOrange(): void
    {
        $this->assertEquals(33, $this->resistor->getColorsValue(['orange', 'orange']));
    }

    /**
     * uuid 0c4fb44f-db7c-4d03-afa8-054350f156a8
     */
    #[TestDox('Ignore additional colors')]
    public function testIgnoreAdditionalColors(): void
    {
        $this->assertEquals(51, $this->resistor->getColorsValue(['green', 'brown', 'orange']));
    }

    /**
     * uuid 4a8ceec5-0ab4-4904-88a4-daf953a5e818
     */
    #[TestDox('Black and brown, one-digit')]
    public function testBlackAndBrownOneDigit(): void
    {
        $this->assertEquals(1, $this->resistor->getColorsValue(['black', 'brown']));
    }
}
