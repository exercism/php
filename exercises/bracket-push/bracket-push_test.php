<?php

require_once "bracket-push.php";

class BracketTest extends PHPUnit\Framework\TestCase
{
    public function testPairedSquareBrackets()
    {
        $this->assertTrue(brackets_match('[]'));
    }

    public function testEmptyString()
    {
        $this->assertTrue(brackets_match(''));
    }

    public function testUnpairedBrackets()
    {
        $this->assertFalse(brackets_match('[['));
    }

    public function testWrongOrderedBrackets()
    {
        $this->assertFalse(brackets_match('}{'));
    }

    public function testPairedWithWhitespace()
    {
        $this->assertTrue(brackets_match('{ }'));
    }

    public function testSimpleNestedBrackets()
    {
        $this->assertTrue(brackets_match('{[]}'));
    }

    public function testSeveralPairedBrackets()
    {
        $this->assertTrue(brackets_match('{}[]'));
    }

    public function testPairedAndNestedBrackets()
    {
        $this->assertTrue(brackets_match('([{}({}[])])'));
    }

    public function testUnopenedClosingBrackets()
    {
        $this->assertFalse(brackets_match('{[)][]}'));
    }

    public function testUnpairedAndNestedBrackets()
    {
        $this->assertFalse(brackets_match('([{])'));
    }

    public function testPairedAndWrongNestedBrackets()
    {
        $this->assertFalse(brackets_match('[({]})'));
    }

    public function testMathExpression()
    {
        $this->assertTrue(brackets_match('(((185 + 223.85) * 15) - 543)/2'));
    }

    public function testComplexLatexExpression()
    {
        $this->assertTrue(brackets_match(
            "\\left(\\begin{array}{cc} \\frac{1}{3} & x\\\\ "
            . "\\mathrm{e}^{x} &... x^2 \\end{array}\\right)"
        ));
    }
}
