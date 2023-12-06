<?php

class ProgramWindow
{
    public $y;
    public $x;
    public $height;
    public $width;

    function __construct()
    {
        $this->y = 0;
        $this->x = 0;
        $this->height = 600;
        $this->width = 800;
    }

    function move(Position $position)
    {
        $this->y = $position->y;
        $this->x = $position->x;
    }

    function resize(Size $size)
    {
        $this->height = $size->height;
        $this->width = $size->width;
    }
}

class Position
{
    public $y;
    public $x;

    function __construct($y, $x)
    {
        $this->y = $y;
        $this->x = $x;
    }
}

class Size
{
    public $height;
    public $width;

    function __construct($height, $width)
    {
        $this->height = $height;
        $this->width = $width;
    }
}
