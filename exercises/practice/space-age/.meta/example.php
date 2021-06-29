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

class SpaceAge
{
    public $seconds;

    public const EARTH_YEAR_IN_SECONDS = 31557600;
    public const MERCURY_YEAR_IN_EY    = 0.2408467;
    public const VENUS_YEAR_IN_EY      = 0.61519726;
    public const MARS_YEAR_IN_EY       = 1.8808158;
    public const JUPITER_YEAR_IN_EY    = 11.862615;
    public const SATURN_YEAR_IN_EY     = 29.447498;
    public const URANUS_YEAR_IN_EY     = 84.016846;
    public const NEPTUNE_YEAR_IN_EY    = 164.79132;

    public function __construct($seconds)
    {
        $this->seconds = $seconds;
    }

    public function seconds()
    {
        return $this->seconds;
    }

    public function earth()
    {
        return $this->seconds / self::EARTH_YEAR_IN_SECONDS;
    }

    public function mercury()
    {
        return $this->earth() / self::MERCURY_YEAR_IN_EY;
    }

    public function venus()
    {
        return $this->earth() / self::VENUS_YEAR_IN_EY;
    }

    public function mars()
    {
        return $this->earth() / self::MARS_YEAR_IN_EY;
    }

    public function jupiter()
    {
        return $this->earth() / self::JUPITER_YEAR_IN_EY;
    }

    public function saturn()
    {
        return $this->earth() / self::SATURN_YEAR_IN_EY;
    }

    public function uranus()
    {
        return $this->earth() / self::URANUS_YEAR_IN_EY;
    }

    public function neptune()
    {
        return $this->earth() / self::NEPTUNE_YEAR_IN_EY;
    }
}
