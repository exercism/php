<?php

include_once 'ocr-numbers.php';

class OcrNumbersTest extends PHPUnit\Framework\TestCase
{

    /**
     * Recognition result should be returned as a string
     */

    public function testRecognizes0()
    {
        $input = [
            " _ ",
            "| |",
            "|_|",
            "   ",
        ];
        $this->assertSame('0', recognize($input));
    }

    public function testRecognizes1()
    {
        $input = [
            "   ",
            "  |",
            "  |",
            "   ",
        ];
        $this->assertSame('1', recognize($input));
    }

    /**
     * Unreadable but correctly sized inputs return ?
     */
    public function testUnreadable()
    {
        $input = [
            "   ",
            "  _",
            "  |",
            "   ",
        ];
        $this->assertSame('?', recognize($input));
    }

    /**
     * Input with a number of lines that is not a multiple of four raises an error
     * @expectedException InvalidArgumentException
     */
    public function testErrorWrongNumberOfLines()
    {
        $input = [
            " _ ",
            "| |",
            "   ",
        ];
        recognize($input);
    }

    /**
     * Input with a number of columns that is not a multiple of three raises an error
     * @expectedException InvalidArgumentException
     */
    public function testErrorWrongNumberOfColumns()
    {
        $input = [
            "    ",
            "   |",
            "   |",
            "    ",
        ];
        recognize($input);
    }

    public function testRecognizes110101100()
    {
        $input = [
            "       _     _        _  _ ",
            "  |  || |  || |  |  || || |",
            "  |  ||_|  ||_|  |  ||_||_|",
            "                           ",
        ];
        $this->assertSame('110101100', recognize($input));
    }

    /**
     * Garbled numbers in a string are replaced with ?
     */
    public function testGarbled()
    {
        $input = [
            "       _     _           _ ",
            "  |  || |  || |     || || |",
            "  |  | _|  ||_|  |  ||_||_|",
            "                           ",
        ];
        $this->assertSame('11?10?1?0', recognize($input));
    }

    public function testRecognizes2()
    {
        $input = [
            " _ ",
            " _|",
            "|_ ",
            "   ",
        ];
        $this->assertSame('2', recognize($input));
    }

    public function testRecognizes3()
    {
        $input = [
            " _ ",
            " _|",
            " _|",
            "   ",
        ];
        $this->assertSame('3', recognize($input));
    }

    public function testRecognizes4()
    {
        $input = [
            "   ",
            "|_|",
            "  |",
            "   ",
        ];
        $this->assertSame('4', recognize($input));
    }

    public function testRecognizes5()
    {
        $input = [
            " _ ",
            "|_ ",
            " _|",
            "   ",
        ];
        $this->assertSame('5', recognize($input));
    }

    public function testRecognizes6()
    {
        $input = [
            " _ ",
            "|_ ",
            "|_|",
            "   ",
        ];
        $this->assertSame('6', recognize($input));
    }

    public function testRecognizes7()
    {
        $input = [
            " _ ",
            "  |",
            "  |",
            "   ",
        ];
        $this->assertSame('7', recognize($input));
    }

    public function testRecognizes8()
    {
        $input = [
            " _ ",
            "|_|",
            "|_|",
            "   ",
        ];
        $this->assertSame('8', recognize($input));
    }

    public function testRecognizes9()
    {
        $input = [
            " _ ",
            "|_|",
            " _|",
            "   ",
        ];
        $this->assertSame('9', recognize($input));
    }

    public function testRecognizesStringOfDecimalNumbers()
    {
        $input = [
            "    _  _     _  _  _  _  _  _ ",
            "  | _| _||_||_ |_   ||_||_|| |",
            "  ||_  _|  | _||_|  ||_| _||_|",
            "                              ",
        ];
        $this->assertSame('1234567890', recognize($input));
    }

    /**
     * Numbers separated by empty lines are recognized. Lines are joined by commas.
     */
    public function testLinesWithCommas()
    {
        $input = [
            "    _  _ ",
            "  | _| _|",
            "  ||_  _|",
            "         ",
            "    _  _ ",
            "|_||_ |_ ",
            "  | _||_|",
            "         ",
            " _  _  _ ",
            "  ||_||_|",
            "  ||_| _|",
            "         ",
        ];
        $this->assertSame('123,456,789', recognize($input));
    }
}
