<?php

class IsogramTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'isogram.php';
    }

    public function testIsogram() : void
    {
        $this->assertTrue(isIsogram('duplicates'));
    }

    public function testNotIsogram() : void
    {
        $this->assertFalse(isIsogram('eleven'));
    }

    public function testMediumLongIsogram() : void
    {
        $this->assertTrue(isIsogram('subdermatoglyphic'));
    }

    public function testCaseInsensitive() : void
    {
        $this->assertFalse(isIsogram('Alphabet'));
    }

    public function testIsogramWithHyphen() : void
    {
        $this->assertTrue(isIsogram('thumbscrew-japingly'));
    }

    public function testIgnoresMultipleHyphens() : void
    {
        $this->assertTrue(isIsogram('Hjelmqvist-Gryb-Zock-Pfund-Wax'));
    }

    public function testWorksWithGermanLetters() : void
    {
        $this->assertTrue(isIsogram('Heizölrückstoßabdämpfung'));
    }

    public function testIgnoresSpaces() : void
    {
        $this->assertFalse(isIsogram('the quick brown fox'));
    }

    public function testIgnoresSpaces2() : void
    {
        $this->assertTrue(isIsogram('Emily Jung Schwartzkopf'));
    }

    public function testDuplicateAccentedLetters() : void
    {
        $this->assertFalse(isIsogram('éléphant'));
    }
}
