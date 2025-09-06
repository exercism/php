<?php

declare(strict_types=1);

function flatten($array = [])
{
    $return = [];
    array_walk_recursive($array, function ($x) use (&$return) {
        return !is_null($x) ? $return[] = $x : [];
    });
    return $return;
}
