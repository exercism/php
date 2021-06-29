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

    // Prints the board, occasionally useful for debugging.
    // Capital letters indicate a connect flag has been set.
    public function dump(): void
    {
        print "\n";
        for ($y = 0; $y < $this->height; $y++) {
            print str_repeat(" ", $y);
            for ($x = 0; $x < $this->width; $x++) {
                $f = $this->fields[$y][$x];
                if ($f & WHITE) {
                    if ($f & WHITE_CONNECT) {
                        print "O";
                    } else {
                        print "o";
                    }
                } elseif ($f & BLACK) {
                    if ($f & BLACK_CONNECT) {
                        print "X";
                    } else {
                        print "x";
                    }
                } else {
                    print ".";
                }
                print " ";
            }
            print "\n";
        }
    }
}

function resultFor(array $lines)
{
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

function flood($board, $c, $colour_flag, $connect_flag)
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
