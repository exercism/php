<?php

declare(strict_types=1);

class Bob
{
    public function respondTo(string $str): string
    {
        throw new \BadMethodCallException("Implement the toOrdinal function");
    }
}
