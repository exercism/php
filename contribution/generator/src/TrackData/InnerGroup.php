<?php

declare(strict_types=1);

namespace App\TrackData;

use App\TrackData\Item;

/**
 * Represents a list of Items
 */
class InnerGroup implements Item
{
    /**
     * PHP_EOL is CRLF on Windows, we always want LF
     * @see https://www.php.net/manual/en/reserved.constants.php#constant.php-eol
     */
    private const LF = "\n";

    private function __construct(
        private array $cases,
    ) {
    }

    public static function from(mixed $rawData): ?Item
    {
        if (!\is_array($rawData))
            return null;

        $itemFactory = new ItemFactory();

        return new static(\array_map(
            fn ($rawCase): Item => $itemFactory->from($rawCase),
            $rawData,
        ));
    }

    public function renderPhpCode(): string
    {
        return \implode(self::LF, \array_map(
            fn ($case): string => $case->renderPhpCode(),
            $this->cases,
        ));
    }
}
