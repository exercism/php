<?php

declare(strict_types=1);

namespace App\TrackData;

use App\Configlet;
use App\TrackData\CanonicalData\TestCase;
use RuntimeException;

class PracticeExercise implements Exercise
{
    private Configlet $configlet;
    private string $pathToPracticeExercises;
    private string $pathToExercise;

    public function __construct(
        string $trackRoot,
        private string $exerciseSlug,
    ) {
        $this->configlet = new Configlet($trackRoot . '/bin/configlet');
        $this->pathToPracticeExercises = $trackRoot . '/exercises/practice/';
        $this->pathToExercise = $this->pathToPracticeExercises . $this->exerciseSlug;
    }

    #[\Override]
    public function pathToExercise(): string
    {
        return $this->pathToExercise;
    }

    /**
     * @throws RuntimeException
     */
    #[\Override]
    public function canonicalData(): CanonicalData
    {
        // https://github.com/exercism/problem-specifications?tab=readme-ov-file#test-data-format
        /** @var array{exercise: string, comments?: list<string>, cases: list<array{uuid: string, description: string, property: string, input: mixed, expected: mixed, comments?: list<string>}>} $canonicalData */
        $canonicalData = \json_decode(
            $this->configlet->canonicalDataRaw($this->exerciseSlug),
            true,
            flags: JSON_THROW_ON_ERROR,
        );

        // TODO(@homersimpsons): Handle recursive cases
        return new CanonicalData(
            $canonicalData['exercise'],
            array_map(
                static fn($case) => new TestCase(
                    $case['uuid'],
                    $case['description'],
                    $case['property'],
                    $case['input'],
                    $case['expected'],
                    $case['comments'] ?? [],
                ),
                $canonicalData['cases'],
            ),
            $canonicalData['comments'] ?? [],
        );
    }
}
