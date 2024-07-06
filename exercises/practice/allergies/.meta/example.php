<?php

declare(strict_types=1);

class Allergies
{
    private $score;

    public function __construct($score)
    {
        $this->score = $score;
    }

    public function getList(): array
    {
        $score = $this->score;
        return array_filter(Allergen::allergenList(), function ($allergen) use ($score) {
            return $this->isAllergicTo($allergen);
        });
    }

    public function isAllergicTo(Allergen $allergen): bool
    {
        return ($this->score & $allergen->getScore()) == $allergen->getScore();
    }
}

class Allergen
{
    public const EGGS = 1;
    public const PEANUTS = 2;
    public const SHELLFISH = 4;
    public const STRAWBERRIES = 8;
    public const TOMATOES = 16;
    public const CHOCOLATE = 32;
    public const POLLEN = 64;
    public const CATS = 128;

    private $score;

    public function __construct($score)
    {
        $this->score = $score;
    }

    public function getScore()
    {
        return $this->score;
    }

    public static function allergenList(): array
    {
        return [
            new Allergen(self::CATS),
            new Allergen(self::CHOCOLATE),
            new Allergen(self::EGGS),
            new Allergen(self::PEANUTS),
            new Allergen(self::POLLEN),
            new Allergen(self::SHELLFISH),
            new Allergen(self::STRAWBERRIES),
            new Allergen(self::TOMATOES),
        ];
    }
}
