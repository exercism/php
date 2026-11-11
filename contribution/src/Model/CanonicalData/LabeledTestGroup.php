<?php

declare(strict_types=1);

namespace App\Model\CanonicalData;

class LabeledTestGroup implements LabeledTestItem
{
    /**
     * @param list<LabeledTestItem> $cases
     * @param list<string> $comments
     * @param list<'big-integer'|'concurrent'|'date'|'datetime'|'floating-point'|'immutable'|'input-validation'|'library-test'|'local-scope'|'random'|'runtime-validation'|'unicode'> $scenarios
     */
    public function __construct(
        public string $description,
        public array $cases,
        public array $comments = [],
        public array $scenarios = [],
    ) {}
}
