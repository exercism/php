<?php

declare(strict_types=1);

namespace App\TrackData\CanonicalData;

class TestCase
{
    public function __construct(
        public string $uuid,
        public string $description,
        public string $property,
        public mixed $input,
        public mixed $expected,
        public array $comments = [],
        private ?object $unknown = null,
    ) {
    }

    public static function from(object $rawData): self
    {
        return new static(
            uuid: '',
            description: '',
            property: '',
            input: '',
            expected: '',
            unknown: empty(\get_object_vars($rawData)) ? null : $rawData,
        );
    }

    public function asClassMethods(): array
    {
        $topLevelStatements = [];
        return $topLevelStatements;
    }
}
