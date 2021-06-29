<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

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
