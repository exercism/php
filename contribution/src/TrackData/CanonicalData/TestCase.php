<?php

declare(strict_types=1);

namespace App\TrackData\CanonicalData;

class TestCase
{
    /**
     * @param list<string> $comments
     *
     * @mago-expect lint:excessive-parameter-list
     */
    public function __construct(
        public string $uuid,
        public string $description,
        public string $property,
        public mixed $input,
        public mixed $expected,
        public array $comments = [],
    ) {}
}
