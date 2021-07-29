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

class LinkedList
{
    private ?Node $head = null;

    public function push($data): void
    {
        if (!$this->head) {
            $this->head = new Node($data);
            return;
        }

        $last             = $this->head->next;
        $new              = new Node($data, $last, $this->head);
        $last->prev       = $new;
        $this->head->next = $new;
    }

    public function pop()
    {
        $this->head = $this->head->next;

        return $this->shift();
    }

    public function unshift($data): void
    {
        $this->push($data);
        $this->head = $this->head->next;
    }

    public function shift()
    {
        $data = $this->head->data;
        $last = $this->head->next;

        if ($last === $this->head) {
            $this->head = null;

            return $data;
        }

        $last->prev       = $this->head->prev;
        $last->prev->next = $last;
        $this->head       = $this->head->prev;

        return $data;
    }
}

class Node
{
    public ?Node $prev;
    public ?Node $next;
    public $data;

    public function __construct($data, ?Node $next = null, ?Node $prev = null)
    {
        $this->data = $data;
        $this->next = $next ?? $this;
        $this->prev = $prev ?? $this;
    }
}
