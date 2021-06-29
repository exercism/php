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

class AccumulateTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Accumulate.php';
    }

    public function testAccumulateEmpty(): void
    {
        $accumulator = function ($value) {
            return $value ** 2;
        };

        $this->assertEquals([], accumulate([], $accumulator));
    }

    public function testAccumulateSquares(): void
    {
        $accumulator = function ($value) {
            return $value ** 2;
        };

        $this->assertEquals([1, 4, 9], accumulate([1, 2, 3], $accumulator));
    }

    public function testAccumulateUpperCases(): void
    {
        $accumulator = function ($string) {
            return mb_strtoupper($string);
        };

        $this->assertEquals(['HELLO', 'WORLD!'], accumulate(['Hello', 'World!'], $accumulator));
    }

    public function testAccumulateReversedStrings(): void
    {
        $accumulator = function ($string) {
            return strrev($string);
        };

        $this->assertEquals(['Hello', 'World!'], accumulate(['olleH', '!dlroW'], $accumulator));
    }

    public function testAccumulateConstants(): void
    {
        $accumulator = function () {
            return 1;
        };

        $this->assertEquals([1, 1], accumulate(['Hello', 'World!'], $accumulator));
    }

    public function testAccumulateWithinAccumulate(): void
    {
        $chars = ['a', 'b', 'c'];
        $digits = [1, 2, 3];
        $expected = [['a1', 'a2', 'a3'], ['b1', 'b2', 'b3'], ['c1', 'c2', 'c3']];

        $this->assertEquals(
            $expected,
            accumulate($chars, function ($char) use ($digits) {
                return accumulate($digits, function ($digit) use ($char) {
                    return $char . $digit;
                });
            })
        );
    }

    // Additional points for making the following tests pass

    public function testAccumulateUsingBuiltInFunction(): void
    {
        $this->assertEquals(['Hello', 'World!'], accumulate([" Hello\t", "\t World!\n "], 'trim'));
    }

    public function testAccumulateUsingStaticMethod(): void
    {
        $this->assertEquals([5, 6], accumulate(['Hello', 'World!'], 'Str::len'));
    }

    public function testAccumulateUsingInvoke(): void
    {
        $this->assertEquals([['f', 'o', 'o']], accumulate(['foo'], new StrSpliter()));
    }

    public function testAccumulateUsingObjectAndArrayNotation(): void
    {
        $this->assertEquals([true, false, false], accumulate(['Yes', 0, []], [new Is(), 'truthy']));
    }
}

class Str
{
    public static function len($string): int
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
    public function truthy($value): bool
    {
        return boolval($value);
    }
}
