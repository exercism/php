<?php

declare(strict_types=1);

class Matrix
{
    public function __construct(string $matrix)
    {
        throw new \BadFunctionCallException("Please implement the Matrix class!");
    }

    public function getRow(int $rowId): array
    {
        throw new \BadFunctionCallException("Please implement the getRow method!");
    }

    public function getColumn(int $columnId): array
    {
        throw new \BadFunctionCallException("Please implement the getColumn method!");
    }
}
