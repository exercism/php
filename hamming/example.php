<?php

/**
 * @param string $a
 * @param string $b
 * @return int distance
 */
function distance($a, $b)
{
    return count(
        array_diff_assoc(
            str_split($a),
            str_split($b)
        )
    );
}
