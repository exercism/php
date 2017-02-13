<?php

require "pangram.php";

class PangramTest extends PHPUnit\Framework\TestCase
{
    public function testSentenceEmpty()
    {
        $this->assertFalse(isPangram(''));
    }

    public function testPangramWithOnlyLowerCase()
    {
        $this->markTestSkipped();
        $this->assertTrue(isPangram('the quick brown fox jumps over the lazy dog'));
    }

    public function testMissingCharacterX()
    {
        $this->markTestSkipped();
        $this->assertFalse(isPangram('a quick movement of the enemy will jeopardize five gunboats'));
    }

    public function testAnotherMissingCharacterX()
    {
        $this->markTestSkipped();
        $this->assertFalse(isPangram('the quick brown fish jumps over the lazy dog'));
    }

    public function testPangramWithUnderscores()
    {
        $this->markTestSkipped();
        $this->assertTrue(isPangram('the_quick_brown_fox_jumps_over_the_lazy_dog'));
    }

    public function testPangramWithNumbers()
    {
        $this->markTestSkipped();
        $this->assertTrue(isPangram('the 1 quick brown fox jumps over the 2 lazy dogs'));
    }

    public function testMissingLettersReplacedByNumbers()
    {
        $this->markTestSkipped();
        $this->assertFalse(isPangram('7h3 qu1ck brown fox jumps ov3r 7h3 lazy dog'));
    }

    public function testPangramWithMixedCaseAndPunctuation()
    {
        $this->markTestSkipped();
        $this->assertTrue(isPangram('\Five quacking Zephyrs jolt my wax bed.\\'));
    }

    public function testPangramWithNonAsciiCharacters()
    {
        $this->markTestSkipped();
        $this->assertTrue(isPangram('Victor jagt zwölf Boxkämpfer quer über den großen Sylter Deich.'));
    }
}
