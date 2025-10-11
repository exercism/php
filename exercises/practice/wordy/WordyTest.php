<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class WordyTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Wordy.php';
    }

    /** uuid: bb8c655c-cf42-4dfc-90e0-152fcfd8d4e0 */
    #[TestDox('addition')]
    public function testAdd1(): void
    {
        $this->assertEquals(2, calculate('What is 1 plus 1?'));
    }

    /** uuid: 79e49e06-c5ae-40aa-a352-7a3a01f70015 */
    #[TestDox('more addition')]
    public function testAdd2(): void
    {
        $this->assertEquals(55, calculate('What is 53 plus 2?'));
    }

    /** uuid: b345dbe0-f733-44e1-863c-5ae3568f3803 */
    #[TestDox('addition with negative numbers')]
    public function testAddNegativeNumbers(): void
    {
        $this->assertEquals(-11, calculate('What is -1 plus -10?'));
    }

    /** uuid: cd070f39-c4cc-45c4-97fb-1be5e5846f87 */
    #[TestDox('large addition')]
    public function testAddMoreDigits(): void
    {
        $this->assertEquals(45801, calculate('What is 123 plus 45678?'));
    }

    /** uuid: 0d86474a-cd93-4649-a4fa-f6109a011191 */
    #[TestDox('subtraction')]
    public function testSubtract(): void
    {
        $this->assertEquals(16, calculate('What is 4 minus -12?'));
    }

    /** uuid: 30bc8395-5500-4712-a0cf-1d788a529be5 */
    #[TestDox('multiplication')]
    public function testMultiply(): void
    {
        $this->assertEquals(-75, calculate('What is -3 multiplied by 25?'));
    }

    /** uuid: 34c36b08-8605-4217-bb57-9a01472c427f */
    #[TestDox('division')]
    public function testDivide(): void
    {
        $this->assertEquals(-11, calculate('What is 33 divided by -3?'));
    }

    /** uuid: da6d2ce4-fb94-4d26-8f5f-b078adad0596 */
    #[TestDox('multiple additions')]
    public function testAddTwice(): void
    {
        $this->assertEquals(3, calculate('What is 1 plus 1 plus 1?'));
    }

    /** uuid: 7fd74c50-9911-4597-be09-8de7f2fea2bb */
    #[TestDox('addition and subtraction')]
    public function testAddThenSubtract(): void
    {
        $this->assertEquals(8, calculate('What is 1 plus 5 minus -2?'));
    }

    /** uuid: b120ffd5-bad6-4e22-81c8-5512e8faf905 */
    #[TestDox('multiple subtraction')]
    public function testSubtractTwice(): void
    {
        $this->assertEquals(3, calculate('What is 20 minus 4 minus 13?'));
    }

    /** uuid: 4f4a5749-ef0c-4f60-841f-abcfaf05d2ae */
    #[TestDox('subtraction then addition')]
    public function testSubtractThenAdd(): void
    {
        $this->assertEquals(14, calculate('What is 17 minus 6 plus 3?'));
    }

    /** uuid: 312d908c-f68f-42c9-aa75-961623cc033f */
    #[TestDox('multiple multiplication')]
    public function testMultiplyTwice(): void
    {
        $this->assertEquals(-12, calculate('What is 2 multiplied by -2 multiplied by 3?'));
    }

    /** uuid: 38e33587-8940-4cc1-bc28-bfd7e3966276 */
    #[TestDox('addition and multiplication')]
    public function testAddThenMultiply(): void
    {
        $this->assertEquals(-8, calculate('What is -3 plus 7 multiplied by -2?'));
    }

    /** uuid: 3c854f97-9311-46e8-b574-92b60d17d394 */
    #[TestDox('multiple division')]
    public function testDivideTwice(): void
    {
        $this->assertEquals(2, calculate('What is -12 divided by 2 divided by -3?'));
    }

    /** uuid: 3ad3e433-8af7-41ec-aa9b-97b42ab49357 */
    #[TestDox('unknown operation')]
    public function testTooAdvanced(): void
    {
        $this->expectException('InvalidArgumentException');

        calculate('What is 52 cubed?');
    }

    /** uuid: 8a7e85a8-9e7b-4d46-868f-6d759f4648f8 */
    #[TestDox('Non math question')]
    public function testIrrelevant(): void
    {
        $this->expectException('InvalidArgumentException');

        calculate('Who is the president of the United States?');
    }
}
