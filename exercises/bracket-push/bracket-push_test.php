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
        $this->markTestSkipped();
        $this->assertTrue(brackets_match(''));
    }

    public function testUnpairedBrackets()
    {
        $this->markTestSkipped();
        $this->assertFalse(brackets_match('[['));
    }

    public function testWrongOrderedBrackets()
    {
        $this->markTestSkipped();
        $this->assertFalse(brackets_match('}{'));
    }

    public function testPairedWithWhitespace()
    {
        $this->markTestSkipped();
        $this->assertTrue(brackets_match('{ }'));
    }

    public function testSimpleNestedBrackets()
    {
        $this->markTestSkipped();
        $this->assertTrue(brackets_match('{[]}'));
    }

    public function testSeveralPairedBrackets()
    {
        $this->markTestSkipped();
        $this->assertTrue(brackets_match('{}[]'));
    }

    public function testPairedAndNestedBrackets()
    {
        $this->markTestSkipped();
        $this->assertTrue(brackets_match('([{}({}[])])'));
    }

    public function testUnopenedClosingBrackets()
    {
        $this->markTestSkipped();
        $this->assertFalse(brackets_match('{[)][]}'));
    }

    public function testUnpairedAndNestedBrackets()
    {
        $this->markTestSkipped();
        $this->assertFalse(brackets_match('([{])'));
    }

    public function testPairedAndWrongNestedBrackets()
    {
        $this->markTestSkipped();
        $this->assertFalse(brackets_match('[({]})'));
    }

    public function testMathExpression()
    {
        $this->markTestSkipped();
        $this->assertTrue(brackets_match('(((185 + 223.85) * 15) - 543)/2'));
    }

    public function testComplexLatexExpression()
    {
        $this->markTestSkipped();
        $this->assertTrue(brackets_match(
            "\\left(\\begin{array}{cc} \\frac{1}{3} & x\\\\ "
            . "\\mathrm{e}^{x} &... x^2 \\end{array}\\right)"
        ));
    }
}
