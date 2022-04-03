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

class Matrix
{
    public array $rows = [];
    public array $columns = [];

    public function __construct(string $matrix)
    {
        $this->parseRows($matrix);
        $this->parseColumns($this->rows);
    }

    public function getRow(int $row): array
    {
        return $this->rows[$row - 1];
    }

    public function getColumn(int $column): array
    {
        return $this->columns[$column - 1];
    }

    private function parseRows(string $matrix): void
    {
        foreach (explode("\n", $matrix) as $stringRow) {
            $this->rows[] = array_map(fn(string $value) => (int) $value, explode(' ', $stringRow));
        }
    }

    private function parseColumns(array $rows): void
    {
        foreach ($rows as $parsedRow) {
            foreach ($parsedRow as $index => $row) {
                $this->columns[$index] ??= [];
                $this->columns[$index][] = $row;
            }
        }
    }
}
