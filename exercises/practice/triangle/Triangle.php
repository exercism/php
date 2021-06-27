<?php

declare(strict_types=1);

class Triangle
{
    public function __construct(int $a, int $b, int $c)
    {
        throw new \BadMethodCallException("Implement the __construct method");
    }

    public function kind(): string
    {
        throw new \BadMethodCallException("Implement the kind method");
    }
}
