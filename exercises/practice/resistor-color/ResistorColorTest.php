<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ResistorColorTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'ResistorColor.php';
    }

    /**
     * uuid: 581d68fa-f968-4be2-9f9d-880f2fb73cf7
     */
    #[TestDox('Colors')]
    public function testColors(): void
    {
        $this->assertEquals([
            "black",
            "brown",
            "red",
            "orange",
            "yellow",
            "green",
            "blue",
            "violet",
            "grey",
            "white"
        ], getAllColors());
    }

    /**
     * uuid: 49eb31c5-10a8-4180-9f7f-fea632ab87ef
     */
    #[TestDox('Black')]
    public function testBlackColorCode(): void
    {
        $this->assertEquals(0, colorCode("black"));
    }

    /**
     * uuid: 5f81608d-f36f-4190-8084-f45116b6f380
     */
    #[TestDox('Orange')]
    public function testOrangeColorCode(): void
    {
        $this->assertEquals(3, colorCode("orange"));
    }

    /**
     * uuid: 0a4df94b-92da-4579-a907-65040ce0b3fc
     */
    #[TestDox('White')]
    public function testWhiteColorCode(): void
    {
        $this->assertEquals(9, colorCode("white"));
    }
}
