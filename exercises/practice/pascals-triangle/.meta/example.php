<?php

declare(strict_types=1);

function pascalsTriangleRows($rowCount)
{
    if ($rowCount < 0 || $rowCount === null) {
        return -1;
    }
    $output = [];
    if ($rowCount === 0) {
        return $output;
    }
    foreach (range(0, $rowCount - 1) as $rowNum) {
        $output[] = pascalRow($rowNum);
    }
    return $output;
}

function pascalRow($n)
{
    $line = [1];
    if ($n === 0) {
        return $line;
    }
    foreach (range(0, $n - 1) as $k) {
        $line[] = $line[$k] * ($n - $k) / ($k + 1);
    }
    return $line;
}
