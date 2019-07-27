<?php

class MinesweeperTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'minesweeper.php';
    }

    public function testAnEmptyBoard() : void
    {
        $emptyBoard = '
+--+
|  |
+--+
';
        $this->assertSame($emptyBoard, solve($emptyBoard));
    }

    public function testAnIncompleteSideBorderThrowsAnException() : void
    {
        $incompleteBoard = '
+--+
   |
+--+
';
        $this->expectException('InvalidArgumentException');

        solve($incompleteBoard);
    }

    public function testAnIncompleteTopBorderThrowsAnException() : void
    {
        $incompleteBoard = '
+ -+
|  |
+--+
';
        $this->expectException('InvalidArgumentException');

        solve($incompleteBoard);
    }

    public function testAMissingCornerThrowsAnException() : void
    {
        $incompleteBoard = '
+--
|  |
+--+
';
        $this->expectException('InvalidArgumentException');

        solve($incompleteBoard);
    }

    public function testABoardWithLessThan2SquaresThrowsAnException() : void
    {
        $tinyBoard = '
+-+
| |
+-+
';
        $this->expectException('InvalidArgumentException');

        solve($tinyBoard);
    }

    public function testRowsOfSameLength($value = '') : void
    {
        $unequalBoard = '
+---+
|   |
| |
+---+
';

        $this->expectException('InvalidArgumentException');

        solve($unequalBoard);
    }

    public function testCanOnlyContainMines($value = '') : void
    {
        $badBoard = '
+---+
|  *|
| * |
| ? |
+---+
';

        $this->expectException('InvalidArgumentException');

        solve($badBoard);
    }

    public function testBoardWithOneMineToLeft() : void
    {
        $oneMine = '
+--+
|* |
+--+
';

        $expected = '
+--+
|*1|
+--+
';

        $this->assertEquals($expected, solve($oneMine));
    }

    public function testBoardWithOneMineToRight() : void
    {
        $oneMine = '
+--+
| *|
+--+
';

        $expected = '
+--+
|1*|
+--+
';

        $this->assertEquals($expected, solve($oneMine));
    }

    public function testBoardWithAMineToTopAndRight() : void
    {
        $twoMines = '
+--+
|* |
| *|
+--+
';

        $expected = '
+--+
|*2|
|2*|
+--+
';

        $this->assertEquals($expected, solve($twoMines));
    }

    public function testBoardWithAMineToBottomAndLeftAndDiagonal() : void
    {
        $threeMines = '
+--+
|* |
|**|
+--+
';

        $expected = '
+--+
|*3|
|**|
+--+
';

        $this->assertEquals($expected, solve($threeMines));
    }

    public function testAComplicatedBoard() : void
    {
        $fourMines = '
+-----+
| * * |
|  *  |
|  *  |
|     |
+-----+
';

        $expected = '
+-----+
|1*3*1|
|13*31|
| 2*2 |
| 111 |
+-----+
';

        $this->assertEquals($expected, solve($fourMines));
    }
}
