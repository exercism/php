<?php

declare(strict_types=1);

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
        throw new \BadMethodCallException("Implement the __construct method");
    }

    public function turnRight(): self
    {
        throw new \BadMethodCallException("Implement the turnRight method");
    }

    public function turnLeft(): self
    {
        throw new \BadMethodCallException("Implement the turnLeft method");
    }

    public function advance(): self
    {
        throw new \BadMethodCallException("Implement the advance method");
    }
}
