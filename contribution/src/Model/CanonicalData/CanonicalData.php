<?php

declare(strict_types=1);

namespace App\Model\CanonicalData;

/**
 * Represents https://github.com/exercism/problem-specifications/blob/main/canonical-data.schema.json
 * @mago-ignore analyzer:mixed-argument,possibly-undefined-string-array-index -- tedious to fix
 */
class CanonicalData
{
    /**
     * @param list<LabeledTestItem> $cases
     * @param list<string> $comments
     */
    public function __construct(
        public string $exercise,
        public array $cases,
        public array $comments = [],
    ) {}

    /**
     * @param array $canonicalDataJson
     */
    public static function from(array $canonicalDataJson): self
    {
        return new self(
            $canonicalDataJson['exercise'],
            self::canonicalDataParseCases($canonicalDataJson['cases']),
            $canonicalDataJson['comments'] ?? [],
        );
    }

    /**
     * @param list<mixed> $cases
     * @return list<LabeledTestItem>
     */
    private static function canonicalDataParseCases(array $cases): array
    {
        return array_map(static function (array $case) {
            if (array_key_exists('cases', $case)) {
                return new LabeledTestGroup(
                    $case['description'],
                    self::canonicalDataParseCases($case['cases']),
                    $case['comments'] ?? [],
                    $case['scenarios'] ?? [],
                );
            }

            return new LabeledTest(
                $case['uuid'],
                $case['description'],
                $case['property'],
                $case['input'],
                $case['expected'],
                $case['reimplements'] ?? null,
                $case['comments'] ?? [],
                $case['scenarios'] ?? [],
            );
        }, $cases);
    }
}
