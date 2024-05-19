<?php

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
