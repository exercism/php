<?php

function crypto_square($plaintext)
{
    $normalized = preg_replace('/\W*/', '', strtolower($plaintext));

    $closestSquare = 1;
    while (pow($closestSquare, 2) < strlen($normalized)) {
        $closestSquare++;
    }
    $rows = $cols = $closestSquare;
    if ($cols * ($rows - 1) >= strlen($normalized)) {
        $rows = $rows - 1;
    }

    $encrypted = "";
    $rowlist = [];
    for ($i = 0; $i < $rows; $i++) {
        $rowlist[] = substr($normalized, $i * $cols, $cols);
    }

    for ($i = 0; $i < $cols; $i++) {
        for ($j = 0; $j < count($rowlist); $j++) {
            $encrypted .= ($i < strlen($rowlist[$j])) ? $rowlist[$j][$i] : ' ';
        }
        if ($i < $cols - 1) {
            $encrypted .= ' ';
        }
    }

    return $encrypted;
}
