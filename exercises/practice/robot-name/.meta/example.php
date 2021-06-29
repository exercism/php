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

class Robot
{
    private $name;

    public function __construct()
    {
        $this->reset();
    }

    /**
     * Get Robot name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Reset name
     */
    public function reset(): void
    {
        $this->name = NamesRegistry::connect()->getNewName();
    }
}

class NamesRegistry
{
    private $names = [];
    private static $letters;
    private static $registry;

    private function __construct()
    {
    }

    /**
     * Get NamesRegistry singleton
     *
     * @return NamesRegistry
     */
    public static function connect(): \NamesRegistry
    {
        if (empty(self::$registry)) {
            self::$registry = new NamesRegistry();
            self::$letters = range('A', 'Z');
        }
        return self::$registry;
    }

    /**
     * Get new unique robot name
     *
     * @todo Names rotation not implemented. Task requires all robots
     * to have unique names even if there are obsolete names.
     * @todo If there are plans to use Robot::reset() more than at least 200-300k times,
     * it should be better to generate the full list of possible names at __construct
     * and randomly reduce it on demand.
     * @todo No fallback in case of over 676000 names.
     *
     * @return string New Robot name     *
     */
    public function getNewName(): string
    {
        do {
            shuffle(self::$letters);
            $name = self::$letters[0] . self::$letters[1] . sprintf('%03d', mt_rand(0, 999));
        } while (!empty($this->names[$name]));
        $this->names[$name] = true;
        return $name;
    }
}
