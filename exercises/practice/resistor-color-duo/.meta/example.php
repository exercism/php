<?php

declare(strict_types=1);

class ResistorColorDuo
{
    public function getAllColors(): array
    {
        return ["black", "brown", "red", "orange", "yellow", "green", "blue", "violet", "grey", "white"];
    }

    /**
     * @param string[] $colors
     */
    public function getColorsValue(array $colors): int
    {
        $allColors = $this->getAllColors();

        if (count($colors) === 1) {
            return array_search(current($colors), $allColors);
        }

        return array_search($colors[0], $allColors) * 10 + array_search($colors[1], $allColors);
    }
}
