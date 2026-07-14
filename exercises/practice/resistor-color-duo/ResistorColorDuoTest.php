<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class ResistorColorDuoTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'ResistorColorDuo.php';
    }

    /**
     * uuid ce11995a-5b93-4950-a5e9-93423693b2fc
     */
    #[TestDox('Brown and black')]
    public function testBrownAndBlack(): void
    {
        $resistor = new ResistorColorDuo();
        $this->assertEquals(10, $resistor->getColorsValue(['brown', 'black']));
    }

    /**
     * uuid 7bf82f7a-af23-48ba-a97d-38d59406a920
     */
    #[TestDox('Blue and grey')]
    public function testBlueAndGrey(): void
    {
        $resistor = new ResistorColorDuo();
        $this->assertEquals(68, $resistor->getColorsValue(['blue', 'grey']));
    }

    /**
     * uuid f1886361-fdfd-4693-acf8-46726fe24e0c
     */
    #[TestDox('Yellow and violet')]
    public function testYellowAndViolet(): void
    {
        $resistor = new ResistorColorDuo();
        $this->assertEquals(47, $resistor->getColorsValue(['yellow', 'violet']));
    }

    /**
     * uuid b7a6cbd2-ae3c-470a-93eb-56670b305640
     */
    #[TestDox('White and red')]
    public function testWhiteAndRed(): void
    {
        $resistor = new ResistorColorDuo();
        $this->assertEquals(92, $resistor->getColorsValue(['white', 'red']));
    }

    /**
     * uuid 77a8293d-2a83-4016-b1af-991acc12b9fe
     */
    #[TestDox('Orange and orange')]
    public function testOrangeAndOrange(): void
    {
        $resistor = new ResistorColorDuo();
        $this->assertEquals(33, $resistor->getColorsValue(['orange', 'orange']));
    }

    /**
     * uuid 0c4fb44f-db7c-4d03-afa8-054350f156a8
     */
    #[TestDox('Ignore additional colors')]
    public function testIgnoreAdditionalColors(): void
    {
        $resistor = new ResistorColorDuo();
        $this->assertEquals(51, $resistor->getColorsValue(['green', 'brown', 'orange']));
    }

    /**
     * uuid 4a8ceec5-0ab4-4904-88a4-daf953a5e818
     */
    #[TestDox('Black and brown, one-digit')]
    public function testBlackAndBrownOneDigit(): void
    {
        $resistor = new ResistorColorDuo();
        $this->assertEquals(1, $resistor->getColorsValue(['black', 'brown']));
    }
}
