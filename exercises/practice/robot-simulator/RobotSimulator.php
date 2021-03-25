<?php

class Robot
{
    /**
     *
     * @var int[]
     */
    protected $position;

    /**
     *
     * @var string
     */
    protected $direction;

    public function __construct(array $position, string $direction)
    {
        \BadMethodCallException("Implement the __construct method");
    }

    public function turnRight(): self
    {
        \BadMethodCallException("Implement the turnRight method");
    }

    public function turnLeft(): self
    {
        \BadMethodCallException("Implement the turnLeft method");
    }

    public function advance(): self
    {
        \BadMethodCallException("Implement the advance method");
    }
}
