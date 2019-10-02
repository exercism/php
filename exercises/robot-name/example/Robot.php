<?php

declare(strict_types=1);

namespace Exercism\RobotName;

class Robot
{
    private $name;

    public function __construct()
    {
        require_once 'NamesRegistry.php';
        $this->reset();
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function reset() : void
    {
        $this->name = NamesRegistry::connect()->getNewName();
    }
}
