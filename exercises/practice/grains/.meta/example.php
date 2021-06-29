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

/**
 *
Here is the simplest solution. But King hates floats.

function square($n)
{
    if ($n < 1 || $n > 64) {
        throw new InvalidArgumentException();
    }
    return pow(2, $n - 1);
}

function total()
{
    return array_reduce(range(1, 64), function ($acc, $n) {
        return $acc += square($n);
    });
}
 */

function square($n)
{
    if ($n < 1 || $n > 64) {
        throw new InvalidArgumentException();
    }

    $result = [1];
    for ($i = $n - 1; $i > 0; $i--) {
        $result = sum($result, $result);
    }

    return implode('', array_reverse($result));
}

function total()
{
    return implode('', array_reverse(
        array_reduce(range(1, 64), function ($acc, $n) {
            return sum($acc, array_reverse(str_split(square($n))));
        }, [])
    ));
}

function sum($x, $y)
{
    $shift = 0;
    $result = array_map(function ($a, $b) use (&$shift) {
        $value = $a + $b + $shift;
        if ($value >= 10) {
            $value -= 10;
            $shift = 1;
        } else {
            $shift = 0;
        }
        return $value;
    }, $x, $y);
    if ($shift) {
        $result[] = $shift;
    }
    return $result;
}
