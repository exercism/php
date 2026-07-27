<?php

declare(strict_types=1);

class WordSearch
{
    private const NEIGHBORHOOD = [
        [-1, -1], [-1, 0], [-1, 1],
        [ 0, -1],          [ 0, 1],
        [ 1, -1], [ 1, 0], [ 1, 1],
    ];

    private int $width;
    private int $height;

    public function __construct(private array $grid)
    {
        $this->width  = strlen($this->grid[0]);
        $this->height = count($this->grid);
    }

    public function search(string $word): ?Result
    {
        for ($X = 0; $X < $this->width; $X++) {
            for ($Y = 0; $Y < $this->height; $Y++) {
                foreach (self::NEIGHBORHOOD as [$checkX, $checkY]) {
                    $search = $this->find($word, $X, $Y, $checkX, $checkY);

                    if (isset($search)) {
                        return $search;
                    }
                }
            }
        }

        return null;
    }

    private function find(string $word, int $X, int $Y, int $nextX, int $nextY): ?Result
    {
        $currentX = $X;
        $currentY = $Y;

        for ($i = 0; $i < strlen($word); $i++) {
            if ($this->findNextLetter($currentX, $currentY) !== $word[$i]) {
                return null;
            }

            $currentX +=  $nextX;
            $currentY +=  $nextY;
        }

        return new Result(
            new Location($X + 1, $Y + 1),
            new Location($currentX + 1 - $nextX, $currentY + 1 - $nextY)
        );
    }

    private function findNextLetter(int $X, int $Y): ?string
    {
        if ($X < 0 || $Y < 0 || $X >= $this->width || $Y >= $this->height) {
            return null;
        }

        return $this->grid[$Y][$X];
    }
}

class Result
{
    public function __construct(private Location $start, private Location $end)
    {
    }
}

class Location
{
    public function __construct(private int $column, private int $row)
    {
        return [
            "column:" => $this->column,
            "row:" => $this->row
        ];
    }
}
