<?php

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
        assert("$this->height > 0");
        $this->width = strlen($lines[0]);
        assert("$this->width > 0");
        $this->fields = array_map(function ($line) {
            $row = array();
            for ($i = 0; $i < strlen($line); $i++) {
                switch ($line[$i])
                {
                    case "O":
                        array_push($row, WHITE);
                        break;
                    case "X":
                        array_push($row, BLACK);
                        break;
                    default:
                        array_push($row, NOTHING);
                }
            }
            return $row;
        }, $lines);
    }

    public function at($c)
    {
        return $this->fields[$c[1]][$c[0]];
    }

    public function update($c, $flag)
    {
        $this->fields[$c[1]][$c[0]] |= $flag;
    }

    public function neighbours($c)
    {
        $coords = array(
            array($c[0]+1, $c[1]),
            array($c[0]-1, $c[1]),
            array($c[0],   $c[1]+1),
            array($c[0],   $c[1]-1),
            array($c[0]-1, $c[1]+1),
            array($c[0]+1, $c[1]-1)
        );
        $validCoord = function ($c) {
            return $c[0] >= 0 && $c[0] < $this->width && $c[1] >= 0 && $c[1] < $this->height;
        };
        return array_filter($coords, $validCoord);
    }

    public function isGoalEdge($c, $color)
    {
        if ($color === WHITE) {
            return $c[1] === $this->height - 1;
        } else {
            return $c[0] === $this->width - 1;
        }
    }

    public function whiteStartCoords()
    {
        $coords = array();
        for ($i = 0; $i < $this->width; $i++) {
            array_push($coords, array($i, 0));
        }
        return $coords;
    }

    public function blackStartCoords()
    {
        $coords = array();
        for ($i = 0; $i < $this->height; $i++) {
            array_push($coords, array(0, $i));
        }
        return $coords;
    }

    // Prints the board, occasionally useful for debugging.
    // Capital letters indicate a connect flag has been set.
    public function dump()
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
