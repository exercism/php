<?php

class Robot
{
    public function getName(): string
    {
        \BadMethodCallException("Implement the getName method");
    }

    public function reset(): void
    {
        \BadMethodCallException("Implement the reset method");
    }
}
