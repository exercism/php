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
        $this->markTestSkipped();
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
        $this->markTestSkipped();
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
        $this->markTestSkipped();
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
        $this->markTestSkipped();
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
        $this->markTestSkipped();
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
        $this->markTestSkipped();
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
        $this->markTestSkipped();
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
        $this->markTestSkipped();
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
        $this->markTestSkipped();
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
        $this->markTestSkipped();
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
        $this->markTestSkipped();
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
