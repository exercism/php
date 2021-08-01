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

class DndCharacter
{
    public int $strength;
    public int $dexterity;
    public int $constitution;
    public int $intelligence;
    public int $wisdom;
    public int $charisma;
    public int $hitpoints;

    public function __construct(
        int $strength,
        int $dexterity,
        int $constitution,
        int $intelligence,
        int $wisdom,
        int $charisma
    ) {
        $this->strength     = $strength;
        $this->dexterity    = $dexterity;
        $this->constitution = $constitution;
        $this->intelligence = $intelligence;
        $this->wisdom       = $wisdom;
        $this->charisma     = $charisma;
        $this->hitpoints    = 10 + self::modifier($constitution);
    }

    public static function generate(): DndCharacter
    {
        return new DndCharacter(
            self::ability(),
            self::ability(),
            self::ability(),
            self::ability(),
            self::ability(),
            self::ability()
        );
    }

    public static function modifier(int $score): int
    {
        return (int) floor(($score - 10) / 2.0);
    }

    public static function ability(): int
    {
        $diceRolls = [];

        for ($i = 0; $i < 5; $i++) {
            $diceRolls[] = random_int(1, 6);
        }

        rsort($diceRolls);

        return array_sum(array_splice($diceRolls, 0, 3));
    }
}
