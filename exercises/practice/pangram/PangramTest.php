<?php

declare(strict_types=1);

class PangramTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Pangram.php';
    }

    /**
     * uuid 64f61791-508e-4f5c-83ab-05de042b0149
     * @testdox Empty sentence
     */
    public function testSentenceEmpty(): void
    {
        $this->assertFalse(isPangram(''));
    }

    /**
     * uuid 74858f80-4a4d-478b-8a5e-c6477e4e4e84
     * @testdox Perfect lower case
     */
    public function testPerfectLowerCase(): void
    {
        $this->assertTrue(isPangram('abcdefghijklmnopqrstuvwxyz'));
    }

    /**
     * uuid 61288860-35ca-4abe-ba08-f5df76ecbdcd
     * @testdox Only lower case
     */
    public function testPangramWithOnlyLowerCase(): void
    {
        $this->assertTrue(isPangram('the quick brown fox jumps over the lazy dog'));
    }

    /**
     * uuid 6564267d-8ac5-4d29-baf2-e7d2e304a743
     * @testdox Missing the letter 'x'
     */
    public function testMissingCharacterX(): void
    {
        $this->assertFalse(isPangram('a quick movement of the enemy will jeopardize five gunboats'));
    }

    /**
     * uuid c79af1be-d715-4cdb-a5f2-b2fa3e7e0de0
     * @testdox Missing the letter 'h'
     */
    public function testMissingCharacterH(): void
    {
        $this->assertFalse(isPangram('five boxing wizards jump quickly at it'));
    }

    /**
     * uuid d835ec38-bc8f-48e4-9e36-eb232427b1df
     * @testdox With underscores
     */
    public function testPangramWithUnderscores(): void
    {
        $this->assertTrue(isPangram('the_quick_brown_fox_jumps_over_the_lazy_dog'));
    }

    /**
     * uuid 8cc1e080-a178-4494-b4b3-06982c9be2a8
     * @testdox With numbers
     */
    public function testPangramWithNumbers(): void
    {
        $this->assertTrue(isPangram('the 1 quick brown fox jumps over the 2 lazy dogs'));
    }

    /**
     * uuid bed96b1c-ff95-45b8-9731-fdbdcb6ede9a
     * @testdox Missing letters replaced by numbers
     */
    public function testMissingLettersReplacedByNumbers(): void
    {
        $this->assertFalse(isPangram('7h3 qu1ck brown fox jumps ov3r 7h3 lazy dog'));
    }

    /**
     * uuid 938bd5d8-ade5-40e2-a2d9-55a338a01030
     * @testdox Mixed case and punctuation
     */
    public function testPangramWithMixedCaseAndPunctuation(): void
    {
        $this->assertTrue(isPangram('"Five quacking Zephyrs jolt my wax bed."'));
    }

    /**
     * uuid 7138e389-83e4-4c6e-8413-1e40a0076951
     * @testdox a-m and A-M are 26 different characters but not a pangram
     */
    public function testEnoughDifferentCharsButOnlyCaseDiffers(): void
    {
        $this->assertFalse(isPangram('abcdefghijklm ABCDEFGHIJKLM'));
    }

    /*
     * PHP track addons
     */

    /**
     * @testdox Unicode mixed into pangram
     */
    public function testPangramMixedWithUnicode(): void
    {
        $this->assertTrue(isPangram('Victor jagt zwölf Boxkämpfer quer über den großen Sylter Deich.'));
    }
}
