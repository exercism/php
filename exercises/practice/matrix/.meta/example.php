<?php

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
