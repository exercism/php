<?php

class HammingComparator
{
    /**
     * @param string $a
     * @param string $b
     * @return int distance
     */
    public static function distance($a, $b)
    {
        $shortest = min(array(mb_strlen($a), mb_strlen($b)));
        return count(
            array_diff_assoc(
                str_split(mb_substr($a, 0, $shortest)),
                str_split(mb_substr($b, 0, $shortest))
            )
        );
    }
}
