<?php
function factors($n)
{
    $factorList = [];
    $limit = sqrt($n) * 10;
    for ($i = 2; $i <= $limit && $n > 1; $i++) {
        while ($n > 1 &&  $n % $i === 0) {
            $factorList[] = $i;
            $n = $n / $i;
        }
    }
    return $factorList;
}
