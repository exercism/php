<?php
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * Reset name
     */
    public function reset()
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
    public static function connect()
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
    public function getNewName()
    {
        do {
            shuffle(self::$letters);
            $name = self::$letters[0] . self::$letters[1] . sprintf('%03d', mt_rand(0, 999));
        } while (!empty($this->names[$name]));
        $this->names[$name] = true;
        return $name;
    }
}
