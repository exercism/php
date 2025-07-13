<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class MatchingBracketsTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'MatchingBrackets.php';
    }

    /**
     * uuid 81ec11da-38dd-442a-bcf9-3de7754609a5
     */
    #[TestDox('Paired square brackets')]
    public function testPairedSquareBrackets(): void
    {
        $this->assertTrue(brackets_match('[]'));
    }

    /**
     * uuid 287f0167-ac60-4b64-8452-a0aa8f4e5238
     */
    #[TestDox('Empty string')]
    public function testEmptyString(): void
    {
        $this->assertTrue(brackets_match(''));
    }

    /**
     * uuid 6c3615a3-df01-4130-a731-8ef5f5d78dac
     */
    #[TestDox('Unpaired brackets')]
    public function testUnpairedBrackets(): void
    {
        $this->assertFalse(brackets_match('[['));
    }

    /**
     * uuid 9d414171-9b98-4cac-a4e5-941039a97a77
     */
    #[TestDox('Wrong ordered brackets')]
    public function testWrongOrderedBrackets(): void
    {
        $this->assertFalse(brackets_match('}{'));
    }

    /**
     * uuid f0f97c94-a149-4736-bc61-f2c5148ffb85
     */
    #[TestDox('Wrong closing bracket')]
    public function testWrongClosingBracket(): void
    {
        $this->assertFalse(brackets_match('{]'));
    }

    /**
     * uuid 754468e0-4696-4582-a30e-534d47d69756
     */
    #[TestDox('Paired with whitespace')]
    public function testPairedWithWhitespace(): void
    {
        $this->assertTrue(brackets_match('{ }'));
    }

    /**
     * uuid ba84f6ee-8164-434a-9c3e-b02c7f8e8545
     */
    #[TestDox('Partially paired brackets')]
    public function testPartiallyPairedBrackets(): void
    {
        $this->assertFalse(brackets_match('{[])'));
    }

    /**
     * uuid 3c86c897-5ff3-4a2b-ad9b-47ac3a30651d
     */
    #[TestDox('Simple nested brackets')]
    public function testSimpleNestedBrackets(): void
    {
        $this->assertTrue(brackets_match('{[]}'));
    }

    /**
     * uuid 2d137f2c-a19e-4993-9830-83967a2d4726
     */
    #[TestDox('Several paired brackets')]
    public function testSeveralPairedBrackets(): void
    {
        $this->assertTrue(brackets_match('{}[]'));
    }

    /**
     * uuid 2e1f7b56-c137-4c92-9781-958638885a44
     */
    #[TestDox('Paired and nested brackets')]
    public function testPairedAndNestedBrackets(): void
    {
        $this->assertTrue(brackets_match('([{}({}[])])'));
    }

    /**
     * uuid 84f6233b-e0f7-4077-8966-8085d295c19b
     */
    #[TestDox('Unopened closing brackets')]
    public function testUnopenedClosingBrackets(): void
    {
        $this->assertFalse(brackets_match('{[)][]}'));
    }

    /**
     * uuid 9b18c67d-7595-4982-b2c5-4cb949745d49
     */
    #[TestDox('Unpaired and nested brackets')]
    public function testUnpairedAndNestedBrackets(): void
    {
        $this->assertFalse(brackets_match('([{])'));
    }

    /**
     * uuid a0205e34-c2ac-49e6-a88a-899508d7d68e
     */
    #[TestDox('Paired and wrong nested brackets')]
    public function testPairedAndWrongNestedBrackets(): void
    {
        $this->assertFalse(brackets_match('[({]})'));
    }

    /**
     * uuid 1d5c093f-fc84-41fb-8c2a-e052f9581602
     */
    #[TestDox('Paired and wrong nested brackets but innermost are correct')]
    public function testPairedAndWrongNestedBracketsButInnermostAreCorrect(): void
    {
        $this->assertFalse(brackets_match('[({}])'));
    }

    /**
     * uuid ef47c21b-bcfd-4998-844c-7ad5daad90a8
     */
    #[TestDox('Paired and incomplete brackets')]
    public function testPairedAndIncompleteBrackets(): void
    {
        $this->assertFalse(brackets_match('{}['));
    }

    /**
     * uuid a4675a40-a8be-4fc2-bc47-2a282ce6edbe
     */
    #[TestDox('Too many closing brackets')]
    public function testTooManyClosingBrackets(): void
    {
        $this->assertFalse(brackets_match('[]]'));
    }

    /**
     * uuid a345a753-d889-4b7e-99ae-34ac85910d1a
     */
    #[TestDox('Early unexpected brackets')]
    public function testEarlyUnexpectedBrackets(): void
    {
        $this->assertFalse(brackets_match(')()'));
    }

    /**
     * uuid 21f81d61-1608-465a-b850-baa44c5def83
     */
    #[TestDox('Early mismatched brackets')]
    public function testEarlyMismatchedBrackets(): void
    {
        $this->assertFalse(brackets_match('{)()'));
    }

    /**
     * uuid 99255f93-261b-4435-a352-02bdecc9bdf2
     */
    #[TestDox('Math expression')]
    public function testMathExpression(): void
    {
        $this->assertTrue(brackets_match('(((185 + 223.85) * 15) - 543)/2'));
    }

    /**
     * uuid 8e357d79-f302-469a-8515-2561877256a1
     */
    #[TestDox('Complex latex expression')]
    public function testComplexLatexExpression(): void
    {
        $this->assertTrue(brackets_match(
            "\\left(\\begin{array}{cc} \\frac{1}{3} & x\\\\ "
            . "\\mathrm{e}^{x} &... x^2 \\end{array}\\right)"
        ));
    }
}
