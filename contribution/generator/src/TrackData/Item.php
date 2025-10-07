<?php

declare(strict_types=1);

namespace App\TrackData;

interface Item
{
    /**
     * Produce item instance from the given data or null if not possible
     */
    public static function from(mixed $rawData): ?Item;

    /**
     * Render a PHP code representation of the item and its children (if any)
     */
    public function renderPhpCode(): string;
}
