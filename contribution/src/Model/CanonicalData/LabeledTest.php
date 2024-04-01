<?php

declare(strict_types=1);

namespace App\Model\CanonicalData;

class LabeledTest implements LabeledTestItem
{
    /**
     * @param array<string, mixed> $input
     * @param list<string> $comments
     * @param list<'big-integer'|'concurrent'|'date'|'datetime'|'floating-point'|'immutable'|'input-validation'|'library-test'|'local-scope'|'random'|'runtime-validation'|'unicode'> $scenarios
     *
     * @mago-expect lint:excessive-parameter-list
     */
    public function __construct(
        public string $uuid,
        public string $description,
        public string $property,
        public array $input,
        public mixed $expected,
        public ?string $reimplements = null,
        public array $comments = [],
        public array $scenarios = [],
    ) {}
}
