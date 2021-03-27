<?php

class Robot
{
    public function getName(): string
    {
        throw new \BadMethodCallException("Implement the getName method");
    }

    public function reset(): void
    {
        throw new \BadMethodCallException("Implement the reset method");
    }
}
