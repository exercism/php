<?php

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class LuckyNumbersTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'LuckyNumbers.php';
    }

    /**
     * @task_id 1
     */
    #[TestDox('Sums up two single digit numbers')]
    public function testSumsUpTwoSingleDigitNumbers(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertEquals(9, $luckynumber->sumUp([2], [7]));
    }

    /**
     * @task_id 1
     */
    #[TestDox('Sums up two numbers with two digits each')]
    public function testSumsUpTwoNumbersWithTwoDigitsEach(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertEquals(81, $luckynumber->sumUp([2, 4], [5, 7]));
    }

    /**
     * @task_id 1
     */
    #[TestDox('Sums up two numbers with three digits each')]
    public function testSumsUpTwoNumbersWithThreeDigitsEach(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertEquals(896, $luckynumber->sumUp([5, 3, 4], [3, 6, 2]));
    }

    /**
     * @task_id 1
     */
    #[TestDox('Sums up two numbers when the first contains fewer digits than the second')]
    public function testSumsUpTwoNumbersWhenTheFirstContainsFewerDigitsThanTheSecond(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertEquals(181, $luckynumber->sumUp([2, 4], [1, 5, 7]));
    }

    /**
     * @task_id 1
     */
    #[TestDox('Sums up two numbers when the first contains more digits than the second')]
    public function testSumsUpTwoNumbersWhenTheFirstContainsMoreDigitsThanTheSecond(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertEquals(282, $luckynumber->sumUp([2, 2, 5], [5, 7]));
    }

    /**
     * @task_id 1
     */
    #[TestDox('sumUp method handles overflow')]
    public function testSumUpMethodHandlesOverflow(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertEquals(1100, $luckynumber->sumUp([9, 9, 9], [1, 0, 1]));
    }

    /**
     * @task_id 1
     */
    #[TestDox('sumUp method handles large numbers')]
    public function testSumUpMethodHandlesLargeNumbers(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertEquals(1000000, $luckynumber->sumUp([9, 9, 9, 9, 9, 9], [1]));
    }

    /**
     * @task_id 2
     */
    #[TestDox('Detects a palindromic number consisting of a single zero')]
    public function testDetectsAPalindromicNumberConsistingOfASingleZero(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertTrue($luckynumber->isPalindrome(0));
    }

    /**
     * @task_id 2
     */
    #[TestDox('Detects a palindromic number consisting of a single digit')]
    public function testDetectsAPalindromicNumberConsistingOfASingleDigit(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertTrue($luckynumber->isPalindrome(6));
    }

    /**
     * @task_id 2
     */
    #[TestDox('Detects a palindromic number with two identical digits')]
    public function testDetectsAPalindromicNumberWithTwoIdenticalDigits(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertTrue($luckynumber->isPalindrome(33));
    }

    /**
     * @task_id 2
     */
    #[TestDox('Detects a palindromic number with five symmetric digits')]
    public function testDetectsAPalindromicNumberWithFiveSymmetricDigits(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertTrue($luckynumber->isPalindrome(15651));
    }

    /**
     * @task_id 2
     */
    #[TestDox('Detects a palindromic number with eight symmetric digits')]
    public function testDetectsAPalindromicNumberWithEightSymmetricDigits(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertTrue($luckynumber->isPalindrome(48911984));
    }

    /**
     * @task_id 2
     */
    #[TestDox('Detects a non-palindromic number with two distinct digits')]
    public function testDetectsANonPalindromicNumberWithTwoDistinctDigits(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertFalse($luckynumber->isPalindrome(12));
    }

    /**
     * @task_id 2
     */
    #[TestDox('Detects a non-palindromic number with six asymmetric digits')]
    public function testDetectsANonPalindromicNumberWithSixAsymmetricDigits(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertFalse($luckynumber->isPalindrome(156512));
    }

    /**
     * @task_id 2
     */
    #[TestDox('Detects a non-palindromic number with eight nearly symmetric digits')]
    public function testDetectsANonPalindromicNumberWithEightNearlySymmetricDigits(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertFalse($luckynumber->isPalindrome(48921984));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Error message for an empty input')]
    public function testErrorMessageForAnEmptyInput(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertSame('Required field', $luckynumber->validate(''));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Error message for a string input')]
    public function testErrorMessageForAStringInput(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertSame('Must be a whole number larger than 0', $luckynumber->validate('some text'));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Error message for an alphanumeric input')]
    public function testErrorMessageForAnAlphanumericInput(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertSame('Must be a whole number larger than 0', $luckynumber->validate('f861'));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Error message for a negative number input')]
    public function testErrorMessageForANegativeNumberInput(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertSame('Must be a whole number larger than 0', $luckynumber->validate('-42'));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Error message for zero as a digit input')]
    public function testErrorMessageForZeroAsADigitInput(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertSame('Must be a whole number larger than 0', $luckynumber->validate('0'));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Returns an empty string for a valid digit input')]
    public function testReturnsAnEmptyStringForAValidDigitInput(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertSame('', $luckynumber->validate('1'));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Returns an empty string for a valid number input')]
    public function testReturnsAnEmptyStringForAValidNumberInput(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertSame('', $luckynumber->validate('123456789'));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Returns an empty string for a valid number input with leading and trailing whitespace')]
    public function testReturnsAnEmptyStringForAValidNumberInputWithLeadingAndTrailingWhitespace(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertSame('', $luckynumber->validate('   123    '));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Returns an empty string for a valid number input using lowercase exponent notation')]
    public function testReturnsAnEmptyStringForAValidNumberInputUsingLowercaseExponentNotation(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertSame('', $luckynumber->validate('5e3'));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Returns an empty string for a valid number input using uppercase exponent notation')]
    public function testReturnsAnEmptyStringForAValidNumberInputUsingUppercaseExponentNotation(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertSame('', $luckynumber->validate('4.2E1'));
    }

    /**
     * @task_id 3
     */
    #[TestDox('Returns an empty string for a valid number input using octal notation')]
    public function testReturnsAnEmptyStringForAValidNumberInputUsingOctalNotation(): void
    {
        $luckynumber = new LuckyNumbers();
        $this->assertSame('', $luckynumber->validate('00015-plus'));
    }
}
