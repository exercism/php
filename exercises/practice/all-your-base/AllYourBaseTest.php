<?php

declare(strict_types=1);

class AllYourBaseTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'AllYourBase.php';
    }

    /**
     * uuid 5ce422f9-7a4b-4f44-ad29-49c67cb32d2c
     * @testdox Single bit one to decimal
     */
    public function testSingleBitOneToDecimal(): void
    {
        $this->assertEquals([1], rebase(2, [1], 10));
    }

    /**
     * uuid 0cc3fea8-bb79-46ac-a2ab-5a2c93051033
     * @testdox Binary to single decimal
     */
    public function testBinaryToSingleDecimal(): void
    {
        $this->assertEquals([5], rebase(2, [1, 0, 1], 10));
    }

    /**
     * uuid f12db0f9-0d3d-42c2-b3ba-e38cb375a2b8
     * @testdox Single decimal to binary
     */
    public function testSingleDecimalToBinary(): void
    {
        $this->assertEquals([1, 0, 1], rebase(10, [5], 2));
    }

    /**
     * uuid 2c45cf54-6da3-4748-9733-5a3c765d925b
     * @testdox Binary to multiple decimal
     */
    public function testBinaryToMultipleDecimal(): void
    {
        $this->assertEquals([4, 2], rebase(2, [1, 0, 1, 0, 1, 0], 10));
    }

    /**
     * uuid 65ddb8b4-8899-4fcc-8618-181b2cf0002d
     * @testdox Decimal to binary
     */
    public function testDecimalToBinary(): void
    {
        $this->assertEquals([1, 0, 1, 0, 1, 0], rebase(10, [4, 2], 2));
    }

    /**
     * uuid 8d418419-02a7-4824-8b7a-352d33c6987e
     * @testdox Trinary to hexadecimal
     */
    public function testTrinaryToHexadecimal(): void
    {
        $this->assertEquals([2, 10], rebase(3, [1, 1, 2, 0], 16));
    }

    /**
     * uuid d3901c80-8190-41b9-bd86-38d988efa956
     * @testdox Hexadecimal to trinary
     */
    public function testHexadecimalToTrinary(): void
    {
        $this->assertEquals([1, 1, 2, 0], rebase(16, [2, 10], 3));
    }

    /**
     * uuid 5d42f85e-21ad-41bd-b9be-a3e8e4258bbf
     * @testdox 15-bit integer
     */
    public function test15BitIntegers(): void
    {
        $this->assertEquals([6, 10, 45], rebase(97, [3, 46, 60], 73));
    }

    /**
     * uuid d68788f7-66dd-43f8-a543-f15b6d233f83
     * @testdox Empty list
     */
    public function testEmptyList(): void
    {
        $this->assertEquals([0], rebase(2, [], 10));
    }

    /**
     * uuid 5e27e8da-5862-4c5f-b2a9-26c0382b6be7
     * @testdox Single zero
     */
    public function testSingleZero(): void
    {
        $this->assertEquals([0], rebase(10, [0], 2));
    }

    /**
     * uuid 2e1c2573-77e4-4b9c-8517-6c56c5bcfdf2
     * @testdox Multiple zeros
     */
    public function testMultipleZeros(): void
    {
        $this->assertEquals([0], rebase(10, [0, 0, 0], 2));
    }

    /**
     * uuid 3530cd9f-8d6d-43f5-bc6e-b30b1db9629b
     * @testdox Leading zeros
     */
    public function testLeadingZeros(): void
    {
        $this->assertEquals([4, 2], rebase(7, [0, 6, 0], 10));
    }

    /**
     * uuid a6b476a1-1901-4f2a-92c4-4d91917ae023
     * @testdox Input base is one
     */
    public function testFirstBaseIsOne(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('input base must be >= 2');

        rebase(1, [0], 10);
    }

    /**
     * uuid e21a693a-7a69-450b-b393-27415c26a016
     * @testdox Input base is zero
     */
    public function testFirstBaseIsZero(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('input base must be >= 2');

        rebase(0, [], 10);
    }

    /**
     * uuid 54a23be5-d99e-41cc-88e0-a650ffe5fcc2
     * @testdox Input base is negative
     */
    public function testFirstBaseIsNegative(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('input base must be >= 2');

        rebase(-2, [1], 10);
    }

    /**
     * uuid 9eccf60c-dcc9-407b-95d8-c37b8be56bb6
     * @testdox Negative digit
     */
    public function testNegativeDigit(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('all digits must satisfy 0 <= d < input base');

        rebase(2, [1, -1, 1, 0, 1, 0], 10);
    }

    /**
     * uuid 232fa4a5-e761-4939-ba0c-ed046cd0676a
     * @testdox Invalid positive digit
     */
    public function testInvalidPositiveDigit(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('all digits must satisfy 0 <= d < input base');

        rebase(2, [1, 2, 1, 0, 1, 0], 10);
    }

    /**
     * uuid 14238f95-45da-41dc-95ce-18f860b30ad3
     * @testdox Output base is one
     */
    public function testSecondBaseIsOne(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('output base must be >= 2');

        rebase(2, [1, 0, 1, 0, 1, 0], 1);
    }

    /**
     * uuid 73dac367-da5c-4a37-95fe-c87fad0a4047
     * @testdox Output base is zero
     */
    public function testSecondBaseIsZero(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('output base must be >= 2');

        rebase(10, [7], 0);
    }

    /**
     * uuid 13f81f42-ff53-4e24-89d9-37603a48ebd9
     * @testdox Output base is negative
     */
    public function testSecondBaseIsNegative(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('output base must be >= 2');

        rebase(2, [1], -7);
    }

    /**
     * uuid 0e6c895d-8a5d-4868-a345-309d094cfe8d
     * @testdox Both bases are negative
     */
    public function testBothBasesIsNegative(): void
    {
        $this->expectException(InvalidArgumentException::class);

        rebase(-2, [1], -7);
    }
}
