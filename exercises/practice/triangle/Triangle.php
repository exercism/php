<?php

class Triangle
{
    public function __construct(int $a, int $b, int $c)
    {
        \BadMethodCallException("Implement the __construct method");
    }

    public function kind(): string
    {
        \BadMethodCallException("Implement the kind method");
    }
}
