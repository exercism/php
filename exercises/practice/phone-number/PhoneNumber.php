<?php

declare(strict_types=1);

class PhoneNumber
{
    public function number(): string
    {
        throw new \BadMethodCallException("Implement the number method");
    }
}
