<?php

class StrSpliter
{
    public function __invoke($value)
    {
        return str_split($value);
    }
}
