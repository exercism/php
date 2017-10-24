<?php

use Exception;

function slices($series, $size)
{
    if ($size > strlen($series) || $size < 1) {
        throw new Exception();
    }
    $arr = [];
    for ($i = 0; $i <= strlen($series) - $size; $i++) {
        $arr[] = substr($series, $i, $size);
    }
    return $arr;
}
