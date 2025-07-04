<?php

declare(strict_types=1);

class FlowerField
{
    // In PHP < 8.1 `readonly` is unknown
    private array $garden;
    private array $annotatedFlowerfield = [];

    public function __construct(array $input)
    {
        $this->gardenFrom($input);
    }

    public function annotate(): array
    {
        if (empty($this->annotatedFlowerfield)) {
            $this->annotateFlowerfield();
        }

        return $this->asAnnotatedFlowerfield();
    }

    private function gardenFrom(array $input): void
    {
        $this->garden = \array_map(
            // In PHP < 8.2, str_split returns [''] for empty strings.
            // In PHP >= 8.2 it returns the required [].
            fn ($row) => empty($row) ? [] : \str_split($row),
            $input,
        );
    }

    private function asAnnotatedFlowerfield(): array
    {
        return \array_map(
            fn ($row) => \implode('', $row),
            $this->annotatedFlowerfield,
        );
    }

    private function annotateFlowerfield(): void
    {
        $this->annotatedFlowerfield = $this->garden;

        foreach (\array_keys($this->garden) as $row) {
            foreach (\array_keys($this->garden[$row]) as $col) {
                if (!$this->isFlower($row, $col)) {
                    $flowerCount = $this->countFlowersAround($row, $col);
                    $this->annotatedFlowerfield[$row][$col] =
                        $flowerCount > 0 ? $flowerCount : ' ';
                }
            }
        }
    }

    private function countFlowersAround(int $row, int $col): int
    {
        $flowerCount = 0;
        if ($row > 0) {
            $flowerCount += $this->countFlowersOfRowAroundCol($row - 1, $col);
        }

        $flowerCount += $this->countFlowersOfRowAroundCol($row, $col);

        if ($row < \count($this->garden) - 1) {
            $flowerCount += $this->countFlowersOfRowAroundCol($row + 1, $col);
        }

        return $flowerCount;
    }

    private function countFlowersOfRowAroundCol(int $row, int $col): int
    {
        $flowerCount = 0;
        if ($col > 0) {
            $flowerCount += $this->flowerScore($row, $col - 1);
        }

        $flowerCount += $this->flowerScore($row, $col);

        if ($col < \count($this->garden[$row]) - 1) {
            $flowerCount += $this->flowerScore($row, $col + 1);
        }

        return $flowerCount;
    }

    private function flowerScore(int $row, int $col): int
    {
        return $this->isFlower($row, $col) ? 1 : 0;
    }

    private function isFlower(int $row, int $col): bool
    {
        return $this->garden[$row][$col] === '*';
    }
}
