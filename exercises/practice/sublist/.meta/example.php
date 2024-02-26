<?php

declare(strict_types=1);

class Sublist
{
    public function compare(array $listOne, array $listTwo): string
    {
        if (count($listOne) === 0 && count($listTwo) === 0) {
            return "EQUAL";
        }

        if (count($listOne) > 0 && count($listTwo) === 0) {
            return "SUPERLIST";
        }

        if (count($listOne) === 0 && count($listTwo) > 0) {
            return "SUBLIST";
        }

        $one = implode(',', $listOne) . ',';
        $two = implode(',', $listTwo) . ',';

        if ($one === $two) {
            return "EQUAL";
        }

        if (str_contains($one, $two)) {
            return "SUPERLIST";
        }

        if (str_contains($two, $one)) {
            return "SUBLIST";
        }

        return "UNEQUAL";
    }
}
