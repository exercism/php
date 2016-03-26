<?php

class Robot
{
    protected $name = null;

    protected $alphabet = '';

    public function __construct()
    {
        $this->alphabet = array_flip(str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'));
    }

    public function getName()
    {
        if (is_null($this->name)) {
            $this->name = sprintf('%s%s', $this->getPrefix(), $this->getSuffix());
        }

        return $this->name;
    }

    protected function getPrefix()
    {
        return implode('', array_rand($this->alphabet, 2));
    }

    protected function getSuffix()
    {
        return strval(rand(100, 999));
    }

    public function reset()
    {
        $this->name = null;
    }
}
