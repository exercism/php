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

    public function instructions(string $instructions): void
    {
        if (!preg_match('/^[RLA]+$/', $instructions)) {
            throw new InvalidArgumentException('Malformed instructions');
        }

        foreach (str_split($instructions) as $instruction) {
            match ($instruction) {
                'R' => $this->turnRight(),
                'L' => $this->turnLeft(),
                'A' => $this->advance(),
            };
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
        match ($this->direction) {
            self::DIRECTION_NORTH => $this->position[1]++,
            self::DIRECTION_EAST => $this->position[0]++,
            self::DIRECTION_SOUTH => $this->position[1]--,
            self::DIRECTION_WEST => $this->position[0]--,
        };
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
