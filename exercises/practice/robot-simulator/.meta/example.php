<?php

declare(strict_types=1);

class RobotSimulator
{
    private const DIRECTION_NORTH = 'north';
    private const DIRECTION_EAST = 'east';
    private const DIRECTION_SOUTH = 'south';
    private const DIRECTION_WEST = 'west';

    /** @param int[] $position */
    public function __construct(
        private array $position,
        private string $direction,
    ) {
    }

    /**
     * Move the Robot according to instructions: R = Turn Right, L = Turn Left and A = Advance
     */
    public function instructions(string $instructions): void
    {
        if (!preg_match('/^[LAR]+$/', $instructions)) {
            throw new InvalidArgumentException('Malformed instructions');
        }

        foreach ($this->mapInstructionsToActions($instructions) as $action) {
            $this->$action();
        }
    }

    /** @return int[] */
    public function getPosition(): array
    {
        return $this->position;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    /** @return string[] */
    private function mapInstructionsToActions(string $instructions): array
    {
        return array_map(function ($x) {
            return [
                'L' => 'turnLeft',
                'R' => 'turnRight',
                'A' => 'advance',
            ][$x];
        }, str_split($instructions));
    }

    private function turnRight(): void
    {
        $this->direction = $this->listDirectionsClockwize()[$this->direction];
    }

    private function turnLeft(): void
    {
        $this->direction = $this->listDirectionsCounterClockwize()[$this->direction];
    }

    private function advance(): void
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
    }

    /** @return Array<string, string> */
    private function listDirectionsClockwize(): array
    {
        return [
            self::DIRECTION_NORTH => self::DIRECTION_EAST,
            self::DIRECTION_EAST => self::DIRECTION_SOUTH,
            self::DIRECTION_SOUTH => self::DIRECTION_WEST,
            self::DIRECTION_WEST => self::DIRECTION_NORTH,
        ];
    }

    /** @return Array<string, string> */
    private function listDirectionsCounterClockwize(): array
    {
        return array_flip($this->listDirectionsClockwize());
    }
}
