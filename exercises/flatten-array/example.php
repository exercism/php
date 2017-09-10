<?php

function flatten($array = [])
{
    $return = array();
    array_walk_recursive($array, function($x) use (&$return) { return !is_null($x) ? $return[] = $x : []; });
    return $return;
}
