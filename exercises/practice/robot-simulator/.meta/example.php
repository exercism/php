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
    public const DIRECTION_NORTH = 'north';
    public const DIRECTION_EAST = 'east';
    public const DIRECTION_SOUTH = 'south';
    public const DIRECTION_WEST = 'west';

    /**
     *
     * @var int[]
     */
    protected $position;

    /**
     *
     * @var string
     */
    protected $direction;

    public function __construct(array $position, string $direction)
    {
        $this->position = $position;
        $this->direction = $direction;
    }

    /**
     * Make protected properties read-only.
     * __get() is slow, but it's ok for the given task.
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return property_exists(self::class, $name) ? $this->$name : null;
    }

    /**
     * Turn the Robot clockwise
     * @return Robot
     */
    public function turnRight(): \Robot
    {
        $this->direction = self::listDirectionsClockwize()[$this->direction];
        return $this;
    }

    /**
     * Turn the Robot counterclockwise
     * @return Robot
     */
    public function turnLeft(): \Robot
    {
        $this->direction = self::listDirectionsCounterClockwize()[$this->direction];
        return $this;
    }

    /**
     * Advance the Robot one step forward
     * @return Robot
     */
    public function advance(): \Robot
    {
        switch ($this->direction) {
            case self::DIRECTION_NORTH:
                $this->position[1]++;
                break;

            case self::DIRECTION_EAST:
                $this->position[0]++;
                break;

            case self::DIRECTION_SOUTH:
                $this->position[1]--;
                break;

            case self::DIRECTION_WEST:
                $this->position[0]--;
                break;
        }
        return $this;
    }

    /**
     * Move the Robot according to instructions: R = Turn Right, L = Turn Left and A = Advance
     */
    public function instructions($instructions)
    {
        if (!preg_match('/^[LAR]+$/', $instructions)) {
            throw new InvalidArgumentException('Malformed instructions');
        }

        foreach ($this->mapInsructionsToActions($instructions) as $action) {
            $this->$action();
        }
        return $this;
    }

    /**
     * List all possible clockwise turn combinations
     * @return array
     */
    public static function listDirectionsClockwize(): array
    {
        return [
            self::DIRECTION_NORTH => self::DIRECTION_EAST,
            self::DIRECTION_EAST => self::DIRECTION_SOUTH,
            self::DIRECTION_SOUTH => self::DIRECTION_WEST,
            self::DIRECTION_WEST => self::DIRECTION_NORTH,
        ];
    }

    /**
     * List all possible counterclockwise turn combinations
     * @return array
     */
    public static function listDirectionsCounterClockwize(): array
    {
        return array_flip(self::listDirectionsClockwize());
    }

    /**
     * Translate instructions string to actions
     * @param string $stringInstructions
     * @return string[]
     */
    protected function mapInsructionsToActions($stringInstructions): array
    {
        return array_map(function ($x) {
            return [
                'L' => 'turnLeft',
                'R' => 'turnRight',
                'A' => 'advance',
            ][$x];
        }, str_split($stringInstructions));
    }
}
