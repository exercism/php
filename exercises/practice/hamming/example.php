<?php

/**
 * @param string $a
 * @param string $b
 * @return int distance
 */
function distance($a, $b)
{
    if (strlen($a) !== strlen($b)) {
        throw new InvalidArgumentException('DNA strands must be of equal length.');
    }

    return count(
        array_diff_assoc(
            str_split($a),
            str_split($b)
        )
    );
}
