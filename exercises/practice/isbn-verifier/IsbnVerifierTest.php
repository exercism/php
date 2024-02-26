<?php

declare(strict_types=1);

class IsbnVerifierTest extends PHPUnit\Framework\TestCase
{
    private IsbnVerifier $isbnVerifier;

    public static function setUpBeforeClass(): void
    {
        require_once 'IsbnVerifier.php';
    }

    public function setUp(): void
    {
        $this->isbnVerifier = new IsbnVerifier();
    }

    /**
     * uuid: 0caa3eac-d2e3-4c29-8df8-b188bc8c9292
     */
    public function testValidIsbn(): void
    {
        $this->assertTrue($this->isbnVerifier->isValid('3-598-21508-8'));
    }

    /**
     * uuid: 19f76b53-7c24-45f8-87b8-4604d0ccd248
     */
    public function testInvalidIsbnCheckDigit(): void
    {
        $this->assertFalse($this->isbnVerifier->isValid('3-598-21508-9'));
    }

    /**
     * uuid: 4164bfee-fb0a-4a1c-9f70-64c6a1903dcd
     */
    public function testValidIsbnWithACheckDigitOf10(): void
    {
        $this->assertTrue($this->isbnVerifier->isValid('3-598-21507-X'));
    }

    /**
     * uuid: 3ed50db1-8982-4423-a993-93174a20825c
     */
    public function testCheckDigitIsACharacterOtherThanX(): void
    {
        $this->assertFalse($this->isbnVerifier->isValid('3-598-21507-A'));
    }

    /**
     * uuid: 9416f4a5-fe01-4b61-a07b-eb75892ef562
     */
    public function testInvalidCheckDigitInIsbnIsNotTreatedAsZero(): void
    {
        $this->assertFalse($this->isbnVerifier->isValid('4-598-21507-B'));
    }

    /**
     * uuid: c19ba0c4-014f-4dc3-a63f-ff9aefc9b5ec
     */
    public function testInvalidCharacterInIsbnIsNotTreatedAsZero(): void
    {
        $this->assertFalse($this->isbnVerifier->isValid('3-598-P1581-X'));
    }

    /**
     * uuid: 28025280-2c39-4092-9719-f3234b89c627
     */
    public function testXIsOnlyValidAsACheckDigit(): void
    {
        $this->assertFalse($this->isbnVerifier->isValid('3-598-2X507-9'));
    }

    /**
     * uuid: f6294e61-7e79-46b3-977b-f48789a4945b
     */
    public function testValidIsbnWithoutSeparatingDashes(): void
    {
        $this->assertTrue($this->isbnVerifier->isValid('3598215088'));
    }

    /**
     * uuid: 185ab99b-3a1b-45f3-aeec-b80d80b07f0b
     */
    public function testIsbnWithoutSeparatingDashesAndXAsCheckDigit(): void
    {
        $this->assertTrue($this->isbnVerifier->isValid('359821507X'));
    }

    /**
     * uuid: 7725a837-ec8e-4528-a92a-d981dd8cf3e2
     */
    public function testIsbnWithoutCheckDigitAndDashes(): void
    {
        $this->assertFalse($this->isbnVerifier->isValid('359821507'));
    }

    /**
     * uuid: 47e4dfba-9c20-46ed-9958-4d3190630bdf
     */
    public function testTooLongIsbnAndNoDashes(): void
    {
        $this->assertFalse($this->isbnVerifier->isValid('3598215078X'));
    }

    /**
     * uuid: 737f4e91-cbba-4175-95bf-ae630b41fb60
     */
    public function testTooShortIsbn(): void
    {
        $this->assertFalse($this->isbnVerifier->isValid('00'));
    }

    /**
     * uuid: 5458a128-a9b6-4ff8-8afb-674e74567cef
     */
    public function testIsbnWithoutCheckDigit(): void
    {
        $this->assertFalse($this->isbnVerifier->isValid('3-598-21507'));
    }

    /**
     * uuid: 70b6ad83-d0a2-4ca7-a4d5-a9ab731800f7
     */
    public function testCheckDigitOfXShouldNotBeUsedForZero(): void
    {
        $this->assertFalse($this->isbnVerifier->isValid('3-598-21515-X'));
    }

    /**
     * uuid: 94610459-55ab-4c35-9b93-ff6ea1a8e562
     */
    public function testEmptyIsbn(): void
    {
        $this->assertFalse($this->isbnVerifier->isValid(''));
    }

    /**
     * uuid: 7bff28d4-d770-48cc-80d6-b20b3a0fb46c
     */
    public function testInputIs9Characters(): void
    {
        $this->assertFalse($this->isbnVerifier->isValid('134456729'));
    }

    /**
     * uuid: ed6e8d1b-382c-4081-8326-8b772c581fec
     */
    public function testInvalidCharactersAreNotIgnoredAfterCheckingLength(): void
    {
        $this->assertFalse($this->isbnVerifier->isValid('3132P34035'));
    }

    /**
     * uuid: daad3e58-ce00-4395-8a8e-e3eded1cdc86
     */
    public function testCatchInvalidCharactersInOnOtherwiseValidIsbn(): void
    {
        $this->assertFalse($this->isbnVerifier->isValid('3598P215088'));
    }

    /**
     * uuid: fb5e48d8-7c03-4bfb-a088-b101df16fdc3
     */
    public function testInputIsTooLongButContainsAValidIsbn(): void
    {
        $this->assertFalse($this->isbnVerifier->isValid('98245726788'));
    }
}
