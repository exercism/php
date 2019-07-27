<?php

class BracketTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'matching-brackets.php';
    }

    public function testPairedSquareBrackets() : void
    {
        $this->assertTrue(brackets_match('[]'));
    }

    public function testEmptyString() : void
    {
        $this->assertTrue(brackets_match(''));
    }

    public function testUnpairedBrackets() : void
    {
        $this->assertFalse(brackets_match('[['));
    }

    public function testWrongOrderedBrackets() : void
    {
        $this->assertFalse(brackets_match('}{'));
    }

    public function testPairedWithWhitespace() : void
    {
        $this->assertTrue(brackets_match('{ }'));
    }

    public function testSimpleNestedBrackets() : void
    {
        $this->assertTrue(brackets_match('{[]}'));
    }

    public function testSeveralPairedBrackets() : void
    {
        $this->assertTrue(brackets_match('{}[]'));
    }

    public function testPairedAndNestedBrackets() : void
    {
        $this->assertTrue(brackets_match('([{}({}[])])'));
    }

    public function testUnopenedClosingBrackets() : void
    {
        $this->assertFalse(brackets_match('{[)][]}'));
    }

    public function testUnpairedAndNestedBrackets() : void
    {
        $this->assertFalse(brackets_match('([{])'));
    }

    public function testPairedAndWrongNestedBrackets() : void
    {
        $this->assertFalse(brackets_match('[({]})'));
    }

    public function testMathExpression() : void
    {
        $this->assertTrue(brackets_match('(((185 + 223.85) * 15) - 543)/2'));
    }

    public function testComplexLatexExpression() : void
    {
        $this->assertTrue(brackets_match(
            "\\left(\\begin{array}{cc} \\frac{1}{3} & x\\\\ "
            . "\\mathrm{e}^{x} &... x^2 \\end{array}\\right)"
        ));
    }
}
