<?php

require_once "diamond.php";

class DiamondTest extends PHPUnit\Framework\TestCase
{
    public function testDegenerateCaseWithASingleARow()
    {
        $this->assertEquals(diamond("A"), [ "A" ]);
    }

    public function testDegenerateCaseWithNoRowContaining3DistinctGroupsOfSpaces()
    {
        $this->assertEquals(
            diamond("B"),
            [
                " A ",
                "B B",
                " A "
            ]
        );
    }

    public function testSmallestNonDegenerateCaseWithOddDiamondSideLength()
    {
        $this->assertEquals(
            diamond("C"),
            [
                "  A  ",
                " B B ",
                "C   C",
                " B B ",
                "  A  "
            ]
        );
    }

    public function testSmallestNonDegenerateCaseWithEvenDiamondSideLength()
    {
        $this->assertEquals(
            diamond("D"),
            [
                "   A   ",
                "  B B  ",
                " C   C ",
                "D     D",
                " C   C ",
                "  B B  ",
                "   A   "
            ]
        );
    }

    public function testLargestPossibleDiamond()
    {
        $this->assertEquals(
            diamond("Z"),
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
            "                         A                         "
            ]
        );
    }
}
