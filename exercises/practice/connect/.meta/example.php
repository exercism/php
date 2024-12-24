<?php

declare(strict_types=1);

const NOTHING = 0;
const WHITE = 1;
const BLACK = 2;
const WHITE_CONNECT = 4;
const BLACK_CONNECT = 8;

class Board
{
    private $height;
    private $width;
    private $fields;

    /**
     * Create a board.
     *
     * Assumes the board is at least 1x1 and that it's rectangular
     * (width of each line is the same).
     */
    public function __construct(array $lines)
    {
        $this->height = count($lines);

        $this->width = strlen($lines[0]);

        $this->fields = array_map(function ($line) {
            $row = [];
            for ($i = 0; $i < strlen($line); $i++) {
                switch ($line[$i]) {
                    case "O":
                        $row[] = WHITE;
                        break;
                    case "X":
                        $row[] = BLACK;
                        break;
                    default:
                        $row[] = NOTHING;
                }
            }
            return $row;
        }, $lines);
    }

    public function at($c)
    {
        return $this->fields[$c[1]][$c[0]];
    }

    public function update($c, $flag): void
    {
        $this->fields[$c[1]][$c[0]] |= $flag;
    }

    public function neighbours($c): array
    {
        $coords = [
            [$c[0] + 1, $c[1]],
            [$c[0] - 1, $c[1]],
            [$c[0], $c[1] + 1],
            [$c[0], $c[1] - 1],
            [$c[0] - 1, $c[1] + 1],
            [$c[0] + 1, $c[1] - 1],
        ];
        $validCoord = function ($c) {
            return $c[0] >= 0 && $c[0] < $this->width && $c[1] >= 0 && $c[1] < $this->height;
        };
        return array_filter($coords, $validCoord);
    }

    public function isGoalEdge($c, $color): ?bool
    {
        if ($color === WHITE) {
            return $c[1] === $this->height - 1;
        } else {
            return $c[0] === $this->width - 1;
        }
    }

    public function whiteStartCoords(): array
    {
        $coords = [];
        for ($i = 0; $i < $this->width; $i++) {
            $coords[] = [$i, 0];
        }
        return $coords;
    }

    public function blackStartCoords(): array
    {
        $coords = [];
        for ($i = 0; $i < $this->height; $i++) {
            $coords[] = [0, $i];
        }
        return $coords;
    }
}

function winner(array $lines): ?string
{
    $lines = array_map(function ($line) {
        return str_replace(" ", "", $line);
    }, $lines);

    $board = new Board($lines);
    // Order of checking black and white doesn't matter, only one can win.
    foreach ($board->blackStartCoords() as $c) {
        if (flood($board, $c, BLACK, BLACK_CONNECT)) {
            return "black";
        }
    }
    foreach ($board->whiteStartCoords() as $c) {
        if (flood($board, $c, WHITE, WHITE_CONNECT)) {
            return "white";
        }
    }
    return null;
}

function flood($board, $c, $colour_flag, $connect_flag): bool
{
    $f = $board->at($c);
    $is_colour = $f & $colour_flag;
    $is_connected = $f & $connect_flag;
    if (($f & $colour_flag) && !($f & $connect_flag)) {
        $board->update($c, $connect_flag);
        if ($board->isGoalEdge($c, $colour_flag)) {
            return true;
        }
        foreach ($board->neighbours($c) as $neighbour) {
            if (flood($board, $neighbour, $colour_flag, $connect_flag)) {
                return true;
            }
        }
    }
    return false;
}
