<?php

require_once 'accumulate.php';

class AccumulateTest extends PHPUnit\Framework\TestCase
{
    public function testAccumulateEmpty()
    {
        $accumulator = function ($value) {
            return $value ** 2;
        };

        $this->assertEquals([], accumulate([], $accumulator));
    }

    public function testAccumulateSquares()
    {
        $accumulator = function ($value) {
            return $value ** 2;
        };

        $this->assertEquals([1, 4, 9], accumulate([1, 2, 3], $accumulator));
    }

    public function testAccumulateUpperCases()
    {
        $accumulator = function ($string) {
            return mb_strtoupper($string);
        };

        $this->assertEquals(['HELLO', 'WORLD!'], accumulate(['Hello', 'World!'], $accumulator));
    }

    public function testAccumulateReversedStrings()
    {
        $accumulator = function ($string) {
            return strrev($string);
        };

        $this->assertEquals(['Hello', 'World!'], accumulate(['olleH', '!dlroW'], $accumulator));
    }

    public function testAccumulateConstants()
    {
        $accumulator = function () {
            return 1;
        };

        $this->assertEquals([1, 1], accumulate(['Hello', 'World!'], $accumulator));
    }

    public function testAccumulateWithinAccumulate()
    {
        $chars = ['a', 'b', 'c'];
        $digits = [1, 2, 3];
        $expected = [['a1', 'a2', 'a3'], ['b1', 'b2', 'b3'], ['c1', 'c2', 'c3']];

        $this->assertEquals(
            $expected,
            accumulate($chars, function ($char) use ($digits) {
                return accumulate($digits, function ($digit) use ($char) {
                    return $char.$digit;
                });
            })
        );
    }

    // Additional points for making the following tests pass

    public function testAccumulateUsingBuiltInFunction()
    {
        $this->assertEquals(['Hello', 'World!'], accumulate([" Hello\t", "\t World!\n "], 'trim'));
    }

    public function testAccumulateUsingStaticMethod()
    {
        $this->assertEquals([5, 6], accumulate(['Hello', 'World!'], 'Str::len'));
    }

    public function testAccumulateUsingInvoke()
    {
        $this->assertEquals([['f', 'o', 'o']], accumulate(['foo'], new StrSpliter()));
    }

    public function testAccumulateUsingObjectAndArrayNotation()
    {
        $this->assertEquals([true, false, false], accumulate(['Yes', 0, []], [new Is(), 'truthy']));
    }
}

class Str
{
    public static function len($string)
    {
        return strlen($string);
    }
}

class StrSpliter
{
    public function __invoke($value)
    {
        return str_split($value);
    }
}

class Is
{
    public function truthy($value)
    {
        return $value ? true : false;
    }
}
