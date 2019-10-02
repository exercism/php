<?php

declare(strict_types=1);

namespace Exercism\RobotName;

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
    public static function connect() : self
    {
        if (empty(self::$registry)) {
            self::$registry = new self();
            self::$letters = range('A', 'Z');
        }
        return self::$registry;
    }

    /**
     * Get new unique robot name
     *
     * @todo Names rotation not implemented. Task requires all robots
     *       to have unique names even if there are obsolete names.
     * @todo If there are plans to use Robot::reset() more than at least 200-300k times,
     *       it should be better to generate the full list of possible names at __construct
     *       and randomly reduce it on demand.
     * @todo No fallback in case of over 676000 names.
     *
     * @return string New Robot name     *
     */
    public function getNewName() : string
    {
        do {
            shuffle(self::$letters);
            $name = self::$letters[0] . self::$letters[1] . sprintf('%03d', mt_rand(0, 999));
        } while (!empty($this->names[$name]));
        $this->names[$name] = true;
        return $name;
    }
}
