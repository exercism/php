<?php

/*
 * By adding type hints and enabling strict type checking, code can become easier to read,
 * self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt to
 * change the original type to match the type specified by the type-declaration.
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 * To enable strict mode, a single declare directive must be placed at the top of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also a function's
 * return type.
 *
 * For more info review the Concept on strict type checking in the PHP track <link>.
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class SpaceAge
{
    public function __construct(int $seconds)
    {
        throw new \BadMethodCallException("Implement the __construct method");
    }

    public function seconds(): int
    {
        throw new \BadMethodCallException("Implement the seconds method");
    }

    public function earth(): float
    {
        throw new \BadMethodCallException("Implement the earth method");
    }

    public function mercury(): float
    {
        throw new \BadMethodCallException("Implement the mercury method");
    }

    public function venus(): float
    {
        throw new \BadMethodCallException("Implement the venus method");
    }

    public function mars(): float
    {
        throw new \BadMethodCallException("Implement the mars method");
    }

    public function jupiter(): float
    {
        throw new \BadMethodCallException("Implement the jupiter method");
    }

    public function saturn(): float
    {
        throw new \BadMethodCallException("Implement the saturn method");
    }

    public function uranus(): float
    {
        throw new \BadMethodCallException("Implement the uranus method");
    }

    public function neptune(): float
    {
        throw new \BadMethodCallException("Implement the neptune method");
    }
}
