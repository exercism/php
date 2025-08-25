<?php

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

    public function count(): int
    {
        if (!$this->head) {
            return 0;
        }

        $count = 1;
        $current = $this->head->next;

        while ($current !== $this->head) {
            $count++;
            $current = $current->next;
        }

        return $count;
    }

    public function delete($value): void
    {
        if (!$this->head) {
            return;
        }

        $current = $this->head;
        do {
            if ($current->data === $value) {
                if ($current->next === $current) {
                    $this->head = null;
                    return;
                }

                $current->prev->next = $current->next;
                $current->next->prev = $current->prev;

                if ($current === $this->head) {
                    $this->head = $current->next;
                }

                return;
            }
            $current = $current->next;
        } while ($current !== $this->head);
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
