<?php

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
            // In PHP < 8.2, str_split returns [''] for empty strings.
            // In PHP >= 8.2 it returns the required [].
            fn ($row) => empty($row) ? [] : \str_split($row),
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

        foreach (\array_keys($this->minefield) as $row) {
            foreach (\array_keys($this->minefield[$row]) as $col) {
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
