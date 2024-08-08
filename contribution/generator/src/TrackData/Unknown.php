<?php

declare(strict_types=1);

namespace App\TrackData;

use App\TrackData\Item;

/**
 * Represents an Item, that is not one of the known other types
 */
class Unknown implements Item
{
    private function __construct(
        private mixed $data = null,
    ) {
    }

    public static function from(mixed $rawData): ?Item
    {
        return new static($rawData);
    }

    public function renderPhpCode(): string
    {
        return \sprintf(
            $this->template(),
            \json_encode($this->data),
        );
    }

    private function template(): string
    {
        return \file_get_contents(__DIR__ . '/unknown.txt');
    }
}
