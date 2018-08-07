<?php

require "isogram.php";

class IsogramTest extends PHPUnit\Framework\TestCase
{
    public function testIsogram()
    {
        $this->assertTrue(isIsogram('duplicates'));
    }

    public function testNotIsogram()
    {
        $this->assertFalse(isIsogram('eleven'));
    }

    public function testMediumLongIsogram()
    {
        $this->assertTrue(isIsogram('subdermatoglyphic'));
    }

    public function testCaseInsensitive()
    {
        $this->assertFalse(isIsogram('Alphabet'));
    }

    public function testIsogramWithHyphen()
    {
        $this->assertTrue(isIsogram('thumbscrew-japingly'));
    }

    public function testIgnoresMultipleHyphens()
    {
        $this->assertTrue(isIsogram('Hjelmqvist-Gryb-Zock-Pfund-Wax'));
    }

    public function testWorksWithGermanLetters()
    {
        $this->assertTrue(isIsogram('Heizölrückstoßabdämpfung'));
    }

    public function testIgnoresSpaces()
    {
        $this->assertFalse(isIsogram('the quick brown fox'));
    }

    public function testIgnoresSpaces2()
    {
        $this->assertTrue(isIsogram('Emily Jung Schwartzkopf'));
    }

    public function testDuplicateAccentedLetters()
    {
        $this->assertFalse(isIsogram('éléphant'));
    }
}
