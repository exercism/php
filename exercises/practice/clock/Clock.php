<?php

declare(strict_types=1);

class Clock
{
    public function __toString(): string
    {
        throw new \BadMethodCallException("Implement the __toString function");
    }
}
