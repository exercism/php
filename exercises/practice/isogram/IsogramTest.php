<?php

declare(strict_types=1);

class IsogramTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Isogram.php';
    }

    /**
     * uuid a0e97d2d-669e-47c7-8134-518a1e2c4555
     * @testdox empty string
     */
    public function testEmptyString(): void
    {
        $this->assertTrue(isIsogram(''));
    }

    /**
     * uuid 9a001b50-f194-4143-bc29-2af5ec1ef652
     * @testdox isogram with only lower case characters
     */
    public function testIsogramWithOnlyLowercaseCharacters(): void
    {
        $this->assertTrue(isIsogram('isogram'));
    }

    /**
     * uuid 8ddb0ca3-276e-4f8b-89da-d95d5bae78a4
     * @testdox word with one duplicated character
     */
    public function testWordWithOneDuplicatedCharacter(): void
    {
        $this->assertFalse(isIsogram('eleven'));
    }

    /**
     * uuid 6450b333-cbc2-4b24-a723-0b459b34fe18
     * @testdox word with one duplicated character from the end of the alphabet
     */
    public function testWordWithOneDuplicatedCharacterFromTheEndOfTheAlphabet(): void
    {
        $this->assertFalse(isIsogram('zzyzx'));
    }

    /**
     * uuid a15ff557-dd04-4764-99e7-02cc1a385863
     * @testdox longest reported english isogram
     */
    public function testLongestReportedEnglishIsogram(): void
    {
        $this->assertTrue(isIsogram('subdermatoglyphic'));
    }

    /**
     * uuid f1a7f6c7-a42f-4915-91d7-35b2ea11c92e
     * @testdox word with duplicated character in mixed case
     */
    public function testWordWithDuplicatedCharacterInMixedCase(): void
    {
        $this->assertFalse(isIsogram('Alphabet'));
    }

    /**
     * uuid 14a4f3c1-3b47-4695-b645-53d328298942
     * @testdox word with duplicated character in mixed case, lowercase first
     */
    public function testWordWithDuplicatedCharacterInMixedCaseLowercaseFirst(): void
    {
        $this->assertFalse(isIsogram('alphAbet'));
    }

    /**
     * uuid 423b850c-7090-4a8a-b057-97f1cadd7c42
     * @testdox hypothetical isogrammic word with hyphen
     */
    public function testHypotheticalIsogrammicWordWithHyphen(): void
    {
        $this->assertTrue(isIsogram('thumbscrew-japingly'));
    }

    /**
     * uuid 93dbeaa0-3c5a-45c2-8b25-428b8eacd4f2
     * @testdox hypothetical word with duplicated character following hyphen
     */
    public function testHypotheticalWordWithDuplicatedCharacterFollowingHyphen(): void
    {
        $this->assertFalse(isIsogram('thumbscrew-jappingly'));
    }

    /**
     * uuid 36b30e5c-173f-49c6-a515-93a3e825553f
     * @testdox isogram with duplicated hyphen
     */
    public function testIsogramWithDuplicatedHyphen(): void
    {
        $this->assertTrue(isIsogram('six-year-old'));
    }

    /**
     * uuid cdabafa0-c9f4-4c1f-b142-689c6ee17d93
     * @testdox made-up name that is an isogram
     */
    public function testMadeupNameThatIsAnIsogram(): void
    {
        $this->assertTrue(isIsogram('Emily Jung Schwartzkopf'));
    }

    /**
     * uuid 5fc61048-d74e-48fd-bc34-abfc21552d4d
     * @testdox duplicated character in the middle
     */
    public function testDuplicatedCharacterInTheMiddle(): void
    {
        $this->assertFalse(isIsogram('accentor'));
    }

    /**
     * uuid 310ac53d-8932-47bc-bbb4-b2b94f25a83e
     * @testdox same first and last characters
     */
    public function testSameFirstAndLastCharacters(): void
    {
        $this->assertFalse(isIsogram('angola'));
    }

    /**
     * uuid 0d0b8644-0a1e-4a31-a432-2b3ee270d847
     * @testdox word with duplicated character and with two hyphens
     *
     * This test aims to catch buggy implementations that check for duplicate spaces or hyphens.
     */
    public function testWordWithDuplicatedCharacterAndWithTwoHyphens(): void
    {
        $this->assertFalse(isIsogram('up-to-date'));
    }
}
