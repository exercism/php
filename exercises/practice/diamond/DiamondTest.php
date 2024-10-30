<?php

declare(strict_types=1);

class DiamondTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Diamond.php';
    }

    /**
     * uuid: 202fb4cc-6a38-4883-9193-a29d5cb92076
     * @testdox Degenerate case with a single 'A' row
     */
    public function testDegenerateCaseWithASingleARow(): void
    {
        $this->assertEquals(["A"], diamond("A"));
    }

    /**
     * uuid: bd6a6d78-9302-42e9-8f60-ac1461e9abae
     * @testdox Degenerate case with no row containing 3 distinct groups of spaces
     */
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

    /**
     * uuid: af8efb49-14ed-447f-8944-4cc59ce3fd76
     * @testdox Smallest non-degenerate case with odd diamond side length
     */
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

    /**
     * uuid: e0c19a95-9888-4d05-86a0-fa81b9e70d1d
     * @testdox Smallest non-degenerate case with even diamond side length
     */
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

    /**
     * uuid: 82ea9aa9-4c0e-442a-b07e-40204e925944
     * @testdox Largest possible diamond
     */
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
