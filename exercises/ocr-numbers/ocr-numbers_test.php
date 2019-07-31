<?php

class OcrNumbersTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'ocr-numbers.php';
    }

    /**
     * Recognition result should be returned as a string
     */

    public function testRecognizes0() : void
    {
        $input = [
            " _ ",
            "| |",
            "|_|",
            "   ",
        ];
        $this->assertSame('0', recognize($input));
    }

    public function testRecognizes1() : void
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
    public function testUnreadable() : void
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
     */
    public function testErrorWrongNumberOfLines() : void
    {
        $this->expectException(InvalidArgumentException::class);

        $input = [
            " _ ",
            "| |",
            "   ",
        ];
        recognize($input);
    }

    /**
     * Input with a number of columns that is not a multiple of three raises an error
     */
    public function testErrorWrongNumberOfColumns() : void
    {
        $this->expectException(InvalidArgumentException::class);

        $input = [
            "    ",
            "   |",
            "   |",
            "    ",
        ];
        recognize($input);
    }

    public function testRecognizes110101100() : void
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
    public function testGarbled() : void
    {
        $input = [
            "       _     _           _ ",
            "  |  || |  || |     || || |",
            "  |  | _|  ||_|  |  ||_||_|",
            "                           ",
        ];
        $this->assertSame('11?10?1?0', recognize($input));
    }

    public function testRecognizes2() : void
    {
        $input = [
            " _ ",
            " _|",
            "|_ ",
            "   ",
        ];
        $this->assertSame('2', recognize($input));
    }

    public function testRecognizes3() : void
    {
        $input = [
            " _ ",
            " _|",
            " _|",
            "   ",
        ];
        $this->assertSame('3', recognize($input));
    }

    public function testRecognizes4() : void
    {
        $input = [
            "   ",
            "|_|",
            "  |",
            "   ",
        ];
        $this->assertSame('4', recognize($input));
    }

    public function testRecognizes5() : void
    {
        $input = [
            " _ ",
            "|_ ",
            " _|",
            "   ",
        ];
        $this->assertSame('5', recognize($input));
    }

    public function testRecognizes6() : void
    {
        $input = [
            " _ ",
            "|_ ",
            "|_|",
            "   ",
        ];
        $this->assertSame('6', recognize($input));
    }

    public function testRecognizes7() : void
    {
        $input = [
            " _ ",
            "  |",
            "  |",
            "   ",
        ];
        $this->assertSame('7', recognize($input));
    }

    public function testRecognizes8() : void
    {
        $input = [
            " _ ",
            "|_|",
            "|_|",
            "   ",
        ];
        $this->assertSame('8', recognize($input));
    }

    public function testRecognizes9() : void
    {
        $input = [
            " _ ",
            "|_|",
            " _|",
            "   ",
        ];
        $this->assertSame('9', recognize($input));
    }

    public function testRecognizesStringOfDecimalNumbers() : void
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
    public function testLinesWithCommas() : void
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
