<?php

class LinkedList
{
    protected $head = null;
    protected $size = 0;

    public function size()
    {
        return $this->size;
    }

    public function push($x)
    {
        $elm = new Element($x);
        $this->size++;
        if (is_null($this->head)) {
            $this->head = $elm;
            return;
        }
        $elm->next  = $this->head;
        $this->head = $elm;
    }

    public function pop()
    {
        if (is_null($this->head)) {
            throw new \Exception("This list is empty");
        }

        $ret        = $this->head;
        $this->head = $this->head->next;
        $this->size--;
        return $ret->value;
    }

    public function reverse()
    {
        $current  = $this->head;
        $previous = null;

        while (!is_null($current)) {
            $next          = $current->next;
            $current->next = $previous;
            $previous      = $current;
            $current       = $next;
        }

        $this->head = $previous;
    }

    public function asArray()
    {
        $ret     = [];
        $current = $this->head;

        while (!is_null($current)) {
            $ret[]   = $current->value;
            $current = $current->next;
        }

        return $ret;
    }
}

class Element
{
    public $next = null;
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
}
