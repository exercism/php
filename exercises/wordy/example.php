<?php

function calculate($question = "")
{
    preg_match(
        "/What is (-?\d+) (plus|minus|multiplied by|divided by) "
        . "(-?\d+)(?: (plus|minus|multiplied by|divided by) (-?\d+))?\?/",
        $question,
        $matches
    );

    if (empty($matches[2])) {
        throw new InvalidArgumentException();
    }

    switch ($matches[2]) {
        case 'plus':
            $number = $matches[1] + $matches[3];
            break;
        case 'minus':
            $number = $matches[1] - $matches[3];
            break;
        case 'multiplied by':
            $number = $matches[1] * $matches[3];
            break;
        case 'divided by':
            $number = $matches[1] / $matches[3];
            break;
        default:
            $number = 0;
    }

    if (isset($matches[4]) && isset($matches[5])) {
        switch ($matches[4]) {
            case 'plus':
                $number += $matches[5];
                break;
            case 'minus':
                $number -= $matches[5];
                break;
            case 'multiplied by':
                $number *= $matches[5];
                break;
            case 'divided by':
                $number /= $matches[5];
                break;
        }
    }

    return $number;
}
