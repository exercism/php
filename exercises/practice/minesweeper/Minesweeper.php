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

class Minesweeper
{
    private readonly array $minefield;
    private array $annotatedMinefield = [];

    public function __construct(array $input)
    {
        $this->minefieldFrom($input);
    }

    public function annotate(): array
    {
        if (empty($this->annotatedMinefield)) {
            $this->annotateMinefield();
        }

        return $this->asAnnotatedMinefield();
    }

    private function minefieldFrom(array $input): void
    {
        $this->minefield = \array_map(
            fn ($row) => \str_split($row),
            $input,
        );
    }

    private function asAnnotatedMinefield(): array
    {
        return \array_map(
            fn ($row) => \implode('', $row),
            $this->annotatedMinefield,
        );
    }

    private function annotateMinefield(): void
    {
        $this->annotatedMinefield = $this->minefield;

        foreach(\array_keys($this->minefield) as $row) {
            foreach(\array_keys($this->minefield[$row]) as $col) {
                if (!$this->isMine($row, $col)) {
                    $mineCount = $this->countMinesAround($row, $col);
                    $this->annotatedMinefield[$row][$col] =
                        $mineCount > 0 ? $mineCount : ' ';
                }
            }
        }
    }

    private function countMinesAround(int $row, int $col): int
    {
        $mineCount = 0;
        if ($row > 0) {
            $mineCount += $this->countMinesOfRowAroundCol($row - 1, $col);
        }

        $mineCount += $this->countMinesOfRowAroundCol($row, $col);

        if ($row < \count($this->minefield) - 1) {
            $mineCount += $this->countMinesOfRowAroundCol($row + 1, $col);
        }

        return $mineCount;
    }

    private function countMinesOfRowAroundCol(int $row, int $col): int
    {
        $mineCount = 0;
        if ($col > 0) {
            $mineCount += $this->mineScore($row, $col - 1);
        }

        $mineCount += $this->mineScore($row, $col);

        if ($col < \count($this->minefield[$row]) - 1) {
            $mineCount += $this->mineScore($row, $col + 1);
        }

        return $mineCount;
    }

    private function mineScore(int $row, int $col): int
    {
        return $this->isMine($row, $col) ? 1 : 0;
    }

    private function isMine(int $row, int $col): bool
    {
        return $this->minefield[$row][$col] === '*';
    }
}
