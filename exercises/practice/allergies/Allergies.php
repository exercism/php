<?php

declare(strict_types=1);

class Allergies
{
    public function __construct(int $score)
    {
        throw new \BadMethodCallException("Implement the __construct method");
    }

    public function isAllergicTo(Allergen $allergen): bool
    {
        throw new \BadMethodCallException("Implement the isAllergicTo method");
    }

    public function getList(): array
    {
        throw new \BadMethodCallException("Implement the getList method");
    }
}

class Allergen
{
    public static function allergenList(): array
    {
        throw new \BadMethodCallException("Implement the allergenList method");
    }
}
