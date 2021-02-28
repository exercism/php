<?php

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
