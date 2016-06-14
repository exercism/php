<?php

require "isogram.php";

class IsogramTest extends PHPUnit_Framework_TestCase
{
    public function testIsogram()
    {
        $this->assertTrue(isIsogram('duplicates'));
    }

    public function testNotIsogram()
    {
        $this->markTestSkipped();
        $this->assertFalse(isIsogram('eleven'));
    }

    public function testMediumLongIsogram()
    {
        $this->markTestSkipped();
        $this->assertTrue(isIsogram('subdermatoglyphic'));
    }

    public function testCaseInsensitive()
    {
        $this->markTestSkipped();
        $this->assertFalse(isIsogram('Alphabet'));
    }

    public function testIsogramWithHyphen()
    {
        $this->markTestSkipped();
        $this->assertTrue(isIsogram('thumbscrew-japingly'));
    }

    public function testIgnoresMultipleHyphens()
    {
        $this->markTestSkipped();
        $this->assertTrue(isIsogram('Hjelmqvist-Gryb-Zock-Pfund-Wax'));
    }

    public function testWorksWithGermanLetters()
    {
        $this->markTestSkipped();
        $this->assertTrue(isIsogram('Heizölrückstoßabdämpfung'));
    }

    public function testIgnoresSpaces()
    {
        $this->markTestSkipped();
        $this->assertFalse(isIsogram('the quick brown fox'));
    }

    public function testIgnoresSpaces2()
    {
        $this->markTestSkipped();
        $this->assertTrue(isIsogram('Emily Jung Schwartzkopf'));
    }

    public function testDuplicateAccentedLetters()
    {
        $this->markTestSkipped();
        $this->assertFalse(isIsogram('éléphant'));
    }
}
