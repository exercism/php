<?php

function transform($old)
{
    $new = [];
    foreach ($old as $points => $letters) {
        foreach ($letters as $letter) {
            $new[strtolower($letter)] = $points;
        }
    }
    return $new;
}
