<?php

function accumulate(array $input, callable $accumulator)
{
    return array_map($accumulator, $input);
}
