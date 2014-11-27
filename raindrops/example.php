<?php

function raindrops($num)
{
    $sound =
        function ($divisor) use ($num) {
            return !($num % $divisor);
        };

    $string = $sound(3) ? 'Pling' : '';
    $string .= $sound(5) ? 'Plang' : '';
    $string .= $sound(7) ? 'Plong' : '';

    return $string ? $string : strval($num);
}
