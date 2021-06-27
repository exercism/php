<?php

declare(strict_types=1);

class DiamondTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Diamond.php';
    }

    public function testDegenerateCaseWithASingleARow(): void
    {
        $this->assertEquals(["A"], diamond("A"));
    }

    public function testDegenerateCaseWithNoRowContaining3DistinctGroupsOfSpaces(): void
    {
        $this->assertEquals(
            [
                " A ",
                "B B",
                " A ",
            ],
            diamond("B")
        );
    }

    public function testSmallestNonDegenerateCaseWithOddDiamondSideLength(): void
    {
        $this->assertEquals(
            [
                "  A  ",
                " B B ",
                "C   C",
                " B B ",
                "  A  ",
            ],
            diamond("C")
        );
    }

    public function testSmallestNonDegenerateCaseWithEvenDiamondSideLength(): void
    {
        $this->assertEquals(
            [
                "   A   ",
                "  B B  ",
                " C   C ",
                "D     D",
                " C   C ",
                "  B B  ",
                "   A   ",
            ],
            diamond("D")
        );
    }

    public function testLargestPossibleDiamond(): void
    {
        $this->assertEquals(
            [
                "                         A                         ",
                "                        B B                        ",
                "                       C   C                       ",
                "                      D     D                      ",
                "                     E       E                     ",
                "                    F         F                    ",
                "                   G           G                   ",
                "                  H             H                  ",
                "                 I               I                 ",
                "                J                 J                ",
                "               K                   K               ",
                "              L                     L              ",
                "             M                       M             ",
                "            N                         N            ",
                "           O                           O           ",
                "          P                             P          ",
                "         Q                               Q         ",
                "        R                                 R        ",
                "       S                                   S       ",
                "      T                                     T      ",
                "     U                                       U     ",
                "    V                                         V    ",
                "   W                                           W   ",
                "  X                                             X  ",
                " Y                                               Y ",
                "Z                                                 Z",
                " Y                                               Y ",
                "  X                                             X  ",
                "   W                                           W   ",
                "    V                                         V    ",
                "     U                                       U     ",
                "      T                                     T      ",
                "       S                                   S       ",
                "        R                                 R        ",
                "         Q                               Q         ",
                "          P                             P          ",
                "           O                           O           ",
                "            N                         N            ",
                "             M                       M             ",
                "              L                     L              ",
                "               K                   K               ",
                "                J                 J                ",
                "                 I               I                 ",
                "                  H             H                  ",
                "                   G           G                   ",
                "                    F         F                    ",
                "                     E       E                     ",
                "                      D     D                      ",
                "                       C   C                       ",
                "                        B B                        ",
                "                         A                         ",
            ],
            diamond("Z")
        );
    }
}
