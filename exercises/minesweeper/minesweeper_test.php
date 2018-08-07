<?php

require 'minesweeper.php';

class MinesweeperTest extends PHPUnit\Framework\TestCase
{
    public function testAnEmptyBoard()
    {
        $emptyBoard = '
+--+
|  |
+--+
';
        $this->assertSame($emptyBoard, solve($emptyBoard));
    }

    public function testAnIncompleteSideBorderThrowsAnException()
    {
        $incompleteBoard = '
+--+
   |
+--+
';
        $this->expectException('InvalidArgumentException');

        solve($incompleteBoard);
    }

    public function testAnIncompleteTopBorderThrowsAnException()
    {
        $incompleteBoard = '
+ -+
|  |
+--+
';
        $this->expectException('InvalidArgumentException');

        solve($incompleteBoard);
    }

    public function testAMissingCornerThrowsAnException()
    {
        $incompleteBoard = '
+--
|  |
+--+
';
        $this->expectException('InvalidArgumentException');

        solve($incompleteBoard);
    }

    public function testABoardWithLessThan2SquaresThrowsAnException()
    {
        $tinyBoard = '
+-+
| |
+-+
';
        $this->expectException('InvalidArgumentException');

        solve($tinyBoard);
    }

    public function testRowsOfSameLength($value = '')
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

    public function testCanOnlyContainMines($value = '')
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

    public function testBoardWithOneMineToLeft()
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

    public function testBoardWithOneMineToRight()
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

    public function testBoardWithAMineToTopAndRight()
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

    public function testBoardWithAMineToBottomAndLeftAndDiagonal()
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

    public function testAComplicatedBoard()
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
