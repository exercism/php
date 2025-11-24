<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class IsbnVerifierTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'IsbnVerifier.php';
    }

    /**
     * uuid: 0caa3eac-d2e3-4c29-8df8-b188bc8c9292
     */
    #[TestDox('Valid ISBN')]
    public function testValidIsbn(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(true, $isbnVerifier->isValid('3-598-21508-8'));
    }

    /**
     * uuid: 19f76b53-7c24-45f8-87b8-4604d0ccd248
     */
    #[TestDox('Invalid ISBN check digit')]
    public function testInvalidIsbnCheckDigit(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('3-598-21508-9'));
    }

    /**
     * uuid: 4164bfee-fb0a-4a1c-9f70-64c6a1903dcd
     */
    #[TestDox('Valid ISBN with a check digit of 10')]
    public function testValidIsbnWithACheckDigitOf10(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(true, $isbnVerifier->isValid('3-598-21507-X'));
    }

    /**
     * uuid: 3ed50db1-8982-4423-a993-93174a20825c
     */
    #[TestDox('Check digit is a character other than X')]
    public function testCheckDigitIsACharacterOtherThanX(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('3-598-21507-A'));
    }

    /**
     * uuid: 9416f4a5-fe01-4b61-a07b-eb75892ef562
     */
    #[TestDox('Invalid check digit in ISBN is not treated as zero')]
    public function testInvalidCheckDigitInIsbnIsNotTreatedAsZero(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('4-598-21507-B'));
    }

    /**
     * uuid: c19ba0c4-014f-4dc3-a63f-ff9aefc9b5ec
     */
    #[TestDox('Invalid character in ISBN is not treated as zero')]
    public function testInvalidCharacterInIsbnIsNotTreatedAsZero(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('3-598-P1581-X'));
    }

    /**
     * uuid: 28025280-2c39-4092-9719-f3234b89c627
     */
    #[TestDox('X is only valid as a check digit')]
    public function testXIsOnlyValidAsACheckDigit(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('3-598-2X507-9'));
    }

    /**
     * uuid: 8005b57f-f194-44ee-88d2-a77ac4142591
     */
    #[TestDox('Only one check digit is allowed')]
    public function testOnlyOneCheckDigitIsAllowed(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('3-598-21508-96'));
    }

    /**
     * uuid: fdb14c99-4cf8-43c5-b06d-eb1638eff343
     */
    #[TestDox('X is not substituted by the value 10')]
    public function testXIsNotSubstitutedByTheValue10(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('3-598-2X507-5'));
    }

    /**
     * uuid: f6294e61-7e79-46b3-977b-f48789a4945b
     */
    #[TestDox('Valid ISBN without separating dashes')]
    public function testValidIsbnWithoutSeparatingDashes(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(true, $isbnVerifier->isValid('3598215088'));
    }

    /**
     * uuid: 185ab99b-3a1b-45f3-aeec-b80d80b07f0b
     */
    #[TestDox('ISBN without separating dashes and X as check digit')]
    public function testIsbnWithoutSeparatingDashesAndXAsCheckDigit(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(true, $isbnVerifier->isValid('359821507X'));
    }

    /**
     * uuid: 7725a837-ec8e-4528-a92a-d981dd8cf3e2
     */
    #[TestDox('ISBN without check digit and dashes')]
    public function testIsbnWithoutCheckDigitAndDashes(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('359821507'));
    }

    /**
     * uuid: 47e4dfba-9c20-46ed-9958-4d3190630bdf
     */
    #[TestDox('Too long ISBN and no dashes')]
    public function testTooLongIsbnAndNoDashes(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('3598215078X'));
    }

    /**
     * uuid: 737f4e91-cbba-4175-95bf-ae630b41fb60
     */
    #[TestDox('Too short ISBN')]
    public function testTooShortIsbn(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('00'));
    }

    /**
     * uuid: 5458a128-a9b6-4ff8-8afb-674e74567cef
     */
    #[TestDox('ISBN without check digit')]
    public function testIsbnWithoutCheckDigit(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('3-598-21507'));
    }

    /**
     * uuid: 70b6ad83-d0a2-4ca7-a4d5-a9ab731800f7
     */
    #[TestDox('Check digit of X should not be used for 0')]
    public function testCheckDigitOfXShouldNotBeUsedForZero(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('3-598-21515-X'));
    }

    /**
     * uuid: 94610459-55ab-4c35-9b93-ff6ea1a8e562
     */
    #[TestDox('Empty ISBN')]
    public function testEmptyIsbn(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid(''));
    }

    /**
     * uuid: 7bff28d4-d770-48cc-80d6-b20b3a0fb46c
     */
    #[TestDox('Input is 9 characters')]
    public function testInputIs9Characters(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('134456729'));
    }

    /**
     * uuid: ed6e8d1b-382c-4081-8326-8b772c581fec
     */
    #[TestDox('Invalid characters are not ignored after checking length')]
    public function testInvalidCharactersAreNotIgnoredAfterCheckingLength(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('3132P34035'));
    }

    /**
     * uuid: daad3e58-ce00-4395-8a8e-e3eded1cdc86
     */
    #[TestDox('Invalid characters are not ignored before checking length')]
    public function testCatchInvalidCharactersInOnOtherwiseValidIsbn(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('3598P215088'));
    }

    /**
     * uuid: fb5e48d8-7c03-4bfb-a088-b101df16fdc3
     */
    #[TestDox('Input is too long but contains a valid ISBN')]
    public function testInputIsTooLongButContainsAValidIsbn(): void
    {
        $isbnVerifier = new IsbnVerifier();
        $this->assertSame(false, $isbnVerifier->isValid('98245726788'));
    }
}
