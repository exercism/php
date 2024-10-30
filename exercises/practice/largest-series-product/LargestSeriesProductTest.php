<?php

declare(strict_types=1);

class LargestSeriesProductTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'LargestSeriesProduct.php';
    }

    /**
     * Since PHP can only support Integers between +/- 9223372036854775807
     * We will deal with the series of digits as strings to avoid having them cast to floats.
     */

    /**
     * uuid: 7c82f8b7-e347-48ee-8a22-f672323324d4
     * @testdox finds the largest product if span equals length
     */
    public function testFindsTheLargestProductIfSpanEqualsLength(): void
    {
        $series = new Series("29");
        $this->assertEquals(18, $series->largestProduct(2));
    }

    /**
     * uuid: 88523f65-21ba-4458-a76a-b4aaf6e4cb5e
     * @testdox can find the largest product of 2 with numbers in order
     */
    public function testCanFindTheLargestProductOf2WithNumbersInOrder(): void
    {
        // The number starts with a 0, qualifying it to be an octal
        // So it needs to be a string so PHP doesn't complain
        $series = new Series("0123456789");
        $this->assertEquals(72, $series->largestProduct(2));
    }

    /**
     * uuid: f1376b48-1157-419d-92c2-1d7e36a70b8a
     * @testdox can find the largest product of 2
     */
    public function testCanFindTheLargestProductOf2(): void
    {
        $series = new Series("576802143");
        $this->assertEquals(48, $series->largestProduct(2));
    }

    /**
     * uuid: 46356a67-7e02-489e-8fea-321c2fa7b4a4
     * @testdox can find the largest product of 3 with numbers in order
     */
    public function testCanFindTheLargestProductOf3WithNumbersInOrder(): void
    {
        $series = new Series("0123456789");
        $this->assertEquals(504, $series->largestProduct(3));
    }

    /**
     * uuid: a2dcb54b-2b8f-4993-92dd-5ce56dece64a
     * @testdox can find the largest product of 3
     */
    public function testCanFindTheLargestProductOf3(): void
    {
        $series = new Series("1027839564");
        $this->assertEquals(270, $series->largestProduct(3));
    }

    /**
     * uuid: 673210a3-33cd-4708-940b-c482d7a88f9d
     * @testdox can find the largest product of 5 with numbers in order
     */
    public function testCanFindTheLargestProductOf5WithNumbersInOrder(): void
    {
        $series = new Series("0123456789");
        $this->assertEquals(15120, $series->largestProduct(5));
    }

    /**
     * uuid: 02acd5a6-3bbf-46df-8282-8b313a80a7c9
     * @testdox can get the largest product of a big number
     */
    public function testCanGetTheLargestProductOfABigNumber(): void
    {
        $series = new Series("73167176531330624919225119674426574742355349194934");
        $this->assertEquals(23520, $series->largestProduct(6));
    }

    /**
     * uuid: 76dcc407-21e9-424c-a98e-609f269622b5
     * @testdox reports zero if the only digits are zero
     */
    public function testReportsZeroIfTheOnlyDigitsAreZero(): void
    {
        $series = new Series("0000");
        $this->assertEquals(0, $series->largestProduct(2));
    }

    /**
     * uuid: 6ef0df9f-52d4-4a5d-b210-f6fae5f20e19
     * @testdox reports zero if all spans include zero
     */
    public function testReportsZeroIfAllSpansIncludeZero(): void
    {
        $series = new Series("99099");
        $this->assertEquals(0, $series->largestProduct(3));
    }

    /**
     * uuid: 5d81aaf7-4f67-4125-bf33-11493cc7eab7
     * @testdox rejects span longer than string length
     */
    public function testRejectsSpanLongerThanStringLength(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $series = new Series("123");
        $series->largestProduct(4);
    }

    /**
     * uuid: 06bc8b90-0c51-4c54-ac22-3ec3893a079e
     * @testdox reports 1 for empty string and empty product (0 span)
     */
    public function testReportsOneForEmptyStringAndEmptyProductSpanZero(): void
    {
        $series = new Series("");
        $this->assertEquals(1, $series->largestProduct(0));
    }

    /**
     * uuid: 3ec0d92e-f2e2-4090-a380-70afee02f4c0
     * @testdox reports 1 for nonempty string and empty product (0 span)
     */
    public function testReportsOneForNonemptyStringAndEmptyProductSpanZero(): void
    {
        $series = new Series("123");
        $this->assertEquals(1, $series->largestProduct(0));
    }

    /**
     * uuid: 6d96c691-4374-4404-80ee-2ea8f3613dd4
     * @testdox rejects empty string and nonzero span
     */
    public function testRejectsEmptyStringAndNonzeroSpan(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $series = new Series("");
        $series->largestProduct(1);
    }

    /**
     * uuid: 7a38f2d6-3c35-45f6-8d6f-12e6e32d4d74
     * @testdox rejects invalid character in digits
     */
    public function testRejectsInvalidCharacterInDigits(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $series = new Series("1234a5");
        $series->largestProduct(2);
    }

    /**
     * uuid: c859f34a-9bfe-4897-9c2f-6d7f8598e7f0
     * @testdox rejects negative span
     */
    public function testRejectsNegativeSpan(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $series = new Series("12345");
        $series->largestProduct(-1);
    }
}
