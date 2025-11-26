<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class OcrNumbersTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'OcrNumbers.php';
    }

    /**
     * uuid: 5ee54e1a-b554-4bf3-a056-9a7976c3f7e8
     */
    #[TestDox('Recognizes 0')]
    public function testRecognizes0(): void
    {
        $input = [
            " _ ",
            "| |",
            "|_|",
            "   ",
        ];
        $this->assertSame('0', recognize($input));
    }

    /**
     * uuid: 027ada25-17fd-4d78-aee6-35a19623639d
     */
    #[TestDox('Recognizes 1')]
    public function testRecognizes1(): void
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
     * uuid: 3cce2dbd-01d9-4f94-8fae-419a822e89bb
     */
    #[TestDox('Unreadable but correctly sized inputs return ?')]
    public function testUnreadableButCorrectlySizedInputsReturnQuestionmark(): void
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
     * uuid: cb19b733-4e36-4cf9-a4a1-6e6aac808b9a
     */
    #[TestDox('Input with a number of lines that is not a multiple of four raises an error')]
    public function testInputWithANumberOfLinesThatIsNotAMultipleOfFourRaisesAnError(): void
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
     * uuid: 235f7bd1-991b-4587-98d4-84206eec4cc6
     */
    #[TestDox('Input with a number of columns that is not a multiple of three raises an error')]
    public function testInputWithANumberOfColumnsThatIsNotAMultipleOfThreeRaisesAnError(): void
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

    /**
     * uuid: 4a841794-73c9-4da9-a779-1f9837faff66
     */
    #[TestDox('Recognizes 110101100')]
    public function testRecognizes110101100(): void
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
     * uuid: 70c338f9-85b1-4296-a3a8-122901cdfde8
     */
    #[TestDox('Garbled numbers in a string are replaced with ?')]
    public function testGarbledNumbersInAStringAreReplacedWithQuestionmark(): void
    {
        $input = [
            "       _     _           _ ",
            "  |  || |  || |     || || |",
            "  |  | _|  ||_|  |  ||_||_|",
            "                           ",
        ];
        $this->assertSame('11?10?1?0', recognize($input));
    }

    /**
     * uuid: ea494ff4-3610-44d7-ab7e-72fdef0e0802
     */
    #[TestDox('Recognizes 2')]
    public function testRecognizes2(): void
    {
        $input = [
            " _ ",
            " _|",
            "|_ ",
            "   ",
        ];
        $this->assertSame('2', recognize($input));
    }

    /**
     * uuid: 1acd2c00-412b-4268-93c2-bd7ff8e05a2c
     */
    #[TestDox('Recognizes 3')]
    public function testRecognizes3(): void
    {
        $input = [
            " _ ",
            " _|",
            " _|",
            "   ",
        ];
        $this->assertSame('3', recognize($input));
    }

    /**
     * uuid: eaec6a15-be17-4b6d-b895-596fae5d1329
     */
    #[TestDox('Recognizes 4')]
    public function testRecognizes4(): void
    {
        $input = [
            "   ",
            "|_|",
            "  |",
            "   ",
        ];
        $this->assertSame('4', recognize($input));
    }

    /**
     * uuid: 440f397a-f046-4243-a6ca-81ab5406c56e
     */
    #[TestDox('Recognizes 5')]
    public function testRecognizes5(): void
    {
        $input = [
            " _ ",
            "|_ ",
            " _|",
            "   ",
        ];
        $this->assertSame('5', recognize($input));
    }

    /**
     * uuid: f4c9cf6a-f1e2-4878-bfc3-9b85b657caa0
     */
    #[TestDox('Recognizes 6')]
    public function testRecognizes6(): void
    {
        $input = [
            " _ ",
            "|_ ",
            "|_|",
            "   ",
        ];
        $this->assertSame('6', recognize($input));
    }

    /**
     * uuid: e24ebf80-c611-41bb-a25a-ac2c0f232df5
     */
    #[TestDox('Recognizes 7')]
    public function testRecognizes7(): void
    {
        $input = [
            " _ ",
            "  |",
            "  |",
            "   ",
        ];
        $this->assertSame('7', recognize($input));
    }

    /**
     * uuid: b79cad4f-e264-4818-9d9e-77766792e233
     */
    #[TestDox('Recognizes 8')]
    public function testRecognizes8(): void
    {
        $input = [
            " _ ",
            "|_|",
            "|_|",
            "   ",
        ];
        $this->assertSame('8', recognize($input));
    }

    /**
     * uuid: 5efc9cfc-9227-4688-b77d-845049299e66
     */
    #[TestDox('Recognizes 9')]
    public function testRecognizes9(): void
    {
        $input = [
            " _ ",
            "|_|",
            " _|",
            "   ",
        ];
        $this->assertSame('9', recognize($input));
    }

    /**
     * uuid: f60cb04a-42be-494e-a535-3451c8e097a4
     */
    #[TestDox('Recognizes string of decimal numbers')]
    public function testRecognizesStringOfDecimalNumbers(): void
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
     * uuid: b73ecf8b-4423-4b36-860d-3710bdb8a491
     */
    #[TestDox('Numbers separated by empty lines are recognized. Lines are joined by commas.')]
    public function testNumbersSeparatedByEmptyLinesAreRecognizedLinesAreJoinedByCommas(): void
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
