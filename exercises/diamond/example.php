<?php

function diamond($limit)
{
    $alphabet = range('A', $limit);
    $rows     = count($alphabet);
    $columns  = $rows*2-1;

    return array_merge(
        array_map(
            function ($l, $a) use ($columns, $rows) {
                $row = str_repeat(' ', $columns);
                $row[$rows-1-$l] = $a;
                $row[$rows-1+$l] = $a;
                return $row;
            },
            array_keys($alphabet),
            $alphabet
        ),
        array_map(
            function ($l, $a) use ($columns, $rows) {
                $row = str_repeat(' ', $columns);
                $row[$rows-1-$l] = $a;
                $row[$rows-1+$l] = $a;
                return $row;
            },
            array_reverse(array_keys(array_slice($alphabet, 0, -1))),
            array_reverse(array_slice($alphabet, 0, -1))
        )
    );
}
