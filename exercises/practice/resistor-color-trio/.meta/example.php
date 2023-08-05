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

class ResistorColorTrio
{
    public const GIGA_BREAKPOINT = 1000000000;
    public const MEGA_BREAKPOINT = 1000000;
    public const KILO_BREAKPOINT = 1000;

    private function getAllColors(): array
    {
        return ['black', 'brown', 'red', 'orange', 'yellow', 'green', 'blue', 'violet', 'grey', 'white'];
    }

    public function label(array $colors): string
    {
        $value = $this->getColorValue($colors);
        $label = $this->getValueLabel($value);

        switch ($label) {
            case 'gigaohms':
                $unit = $value / static::GIGA_BREAKPOINT;
                return sprintf('%d %s', $unit, $label);
            case 'megaohms':
                $unit = $value / static::MEGA_BREAKPOINT;
                return sprintf('%d %s', $unit, $label);
            case 'kiloohms':
                $unit = $value / static::KILO_BREAKPOINT;
                return sprintf('%d %s', $unit, $label);
            default:
                return sprintf('%d %s', $value, $label);
        }
    }

    private function getColorValue(array $colors): int
    {
        return (($this->resistorValue($colors[0]) * 10) + $this->resistorValue($colors[1])) *
            (int) pow(10, $this->resistorValue($colors[2]));
    }

    private function getValueLabel(int $value): string
    {
        if ($value >= static::GIGA_BREAKPOINT) {
            return 'gigaohms';
        }

        if ($value >= static::MEGA_BREAKPOINT) {
            return 'megaohms';
        }

        if ($value >= static::KILO_BREAKPOINT) {
            return 'kiloohms';
        }

        return 'ohms';
    }

    private function resistorValue(string $color): int
    {
        return array_search($color, $this->getAllColors());
    }
}
