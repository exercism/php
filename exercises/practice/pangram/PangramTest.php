<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class PangramTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Pangram.php';
    }

    public function testSentenceEmpty(): void
    {
        $this->assertFalse(isPangram(''));
    }

    public function testPangramWithOnlyLowerCase(): void
    {
        $this->assertTrue(isPangram('the quick brown fox jumps over the lazy dog'));
    }

    public function testMissingCharacterX(): void
    {
        $this->assertFalse(isPangram('a quick movement of the enemy will jeopardize five gunboats'));
    }

    public function testAnotherMissingCharacterX(): void
    {
        $this->assertFalse(isPangram('the quick brown fish jumps over the lazy dog'));
    }

    public function testPangramWithUnderscores(): void
    {
        $this->assertTrue(isPangram('the_quick_brown_fox_jumps_over_the_lazy_dog'));
    }

    public function testPangramWithNumbers(): void
    {
        $this->assertTrue(isPangram('the 1 quick brown fox jumps over the 2 lazy dogs'));
    }

    public function testMissingLettersReplacedByNumbers(): void
    {
        $this->assertFalse(isPangram('7h3 qu1ck brown fox jumps ov3r 7h3 lazy dog'));
    }

    public function testPangramWithMixedCaseAndPunctuation(): void
    {
        $this->assertTrue(isPangram('\Five quacking Zephyrs jolt my wax bed.\\'));
    }

    public function testPangramWithNonAsciiCharacters(): void
    {
        $this->assertTrue(isPangram('Victor jagt zwölf Boxkämpfer quer über den großen Sylter Deich.'));
    }

    public function testMissingLetterReplacedWithUpperCaseCharacter(): void
    {
        $this->assertFalse(isPangram("Tthe quick brown fo jumps over the lazy dog"));
    }
}
