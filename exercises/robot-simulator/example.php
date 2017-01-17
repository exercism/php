<?php

class Robot
{
    const DIRECTION_NORTH = 'north';
    const DIRECTION_EAST = 'east';
    const DIRECTION_SOUTH = 'south';
    const DIRECTION_WEST = 'west';

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
    public function turnRight()
    {
        $this->direction = self::listDirectionsClockwize()[$this->direction];
        return $this;
    }


    /**
     * Turn the Robot counterclockwise
     * @return Robot
     */
    public function turnLeft()
    {
        $this->direction = self::listDirectionsCounterClockwize()[$this->direction];
        return $this;
    }


    /**
     * Advance the Robot one step forward
     * @return Robot
     */
    public function advance()
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
    public static function listDirectionsClockwize()
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
    public static function listDirectionsCounterClockwize()
    {
        return array_flip(self::listDirectionsClockwize());
    }


    /**
     * Translate instructions string to actions
     * @param string $stringInstructions
     * @return string[]
     */
    protected function mapInsructionsToActions($stringInstructions)
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
