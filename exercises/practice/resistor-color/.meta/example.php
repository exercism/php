<?php

declare(strict_types=1);

function getAllColors(): array
{
    return ["black", "brown", "red", "orange", "yellow", "green", "blue", "violet", "grey", "white"];
}

function colorCode(string $color)
{
    return array_search($color, getAllColors());
}
