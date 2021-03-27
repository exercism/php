<?php

class Bob
{
    public function respondTo(string $str): string
    {
        throw new \BadMethodCallException("Implement the toOrdinal function");
    }
}
