<?php

class Allergies
{
    private $score;

    public function __construct($score)
    {
        $this->score = $score;
    }

    public function getList()
    {
        $score = $this->score;
        return array_filter(Allergen::allergenList(), function ($allergen) use ($score) {
            return $this->isAllergicTo($allergen);
        });
    }

    public function isAllergicTo(Allergen $allergen)
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

    public static function allergenList()
    {
        return [
            new Allergen(Allergen::CATS),
            new Allergen(Allergen::CHOCOLATE),
            new Allergen(Allergen::EGGS),
            new Allergen(Allergen::PEANUTS),
            new Allergen(Allergen::POLLEN),
            new Allergen(Allergen::SHELLFISH),
            new Allergen(Allergen::STRAWBERRIES),
            new Allergen(Allergen::TOMATOES),
        ];
    }
}
