<?php

declare(strict_types=1);

class BufferFullError extends Exception
{
}

class BufferEmptyError extends Exception
{
}

class CircularBuffer
{
    private int $capacity;
    private array $buffer;
    private int $readPosition;
    private int $writePosition;

    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->buffer = array_fill(0, $capacity, null);
        $this->readPosition = 0;
        $this->writePosition = 0;
    }

    /**
     * @throws BufferEmptyError
     */
    public function read()
    {
        if ($this->isEmpty()) {
            throw new BufferEmptyError();
        }
        $value = $this->buffer[$this->readPosition];
        $this->buffer[$this->readPosition] = null;
        $this->readPosition = ($this->readPosition + 1) % $this->capacity;
        return $value;
    }

    /**
     * @throws BufferFullError
     */
    public function write($item): void
    {
        if ($this->isFull()) {
            throw new BufferFullError();
        }
        $this->buffer[$this->writePosition] = $item;
        $this->writePosition = ($this->writePosition + 1) % $this->capacity;
    }

    /**
     * @throws BufferEmptyError
     * @throws BufferFullError
     */
    public function forceWrite($item): void
    {
        if ($this->isFull()) {
            $this->read();
        }
        $this->write($item);
    }

    public function clear(): void
    {
        $this->buffer = array_fill(0, $this->capacity, null);
        $this->readPosition = 0;
        $this->writePosition = 0;
    }

    private function isEmpty(): bool
    {
        return $this->buffer[$this->readPosition] === null;
    }

    private function isFull(): bool
    {
        return $this->buffer[$this->writePosition] !== null;
    }
}
