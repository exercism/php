<?php

declare(strict_types=1);

namespace App\TrackData;

use App\TrackData\CanonicalData;
use App\TrackData\CanonicalData\TestCase;
use App\TrackData\Exercise;
use RuntimeException;

class PracticeExercise implements Exercise {
    private string $pathToConfiglet = '';
    private string $pathToPracticeExercises = '';
    private string $pathToExercise = '';
    private string $pathToCanonicalData = '';

    public function __construct(
        private string $trackRoot,
        private string $exerciseSlug,
    ) {
        $this->pathToConfiglet = $trackRoot . '/bin/configlet';
        $this->pathToPracticeExercises = $trackRoot . '/exercises/practice/';
        $this->pathToExercise =
            $this->pathToPracticeExercises . $this->exerciseSlug;
    }

    public function pathToExercise(): string
    {
        return $this->pathToExercise;
    }

    public function canonicalData(): CanonicalData
    {
        $this->ensureConfigletCanBeUsed();
        $this->ensurePracticeExerciseCanBeUsed();
        $this->pathToCachedCanonicalDataFromConfiglet();
        $this->ensurePathToCanonicalDataCanBeUsed();

        return $this->hydratedCanonicalData();
    }

    private function hydratedCanonicalData(): CanonicalData
    {
        $canonicalData = \json_decode(
            json: \file_get_contents($this->pathToCanonicalData),
            flags: JSON_THROW_ON_ERROR
        );

        // TODO: Validate
        return new CanonicalData(
            $canonicalData->exercise,
            $this->hydrateTestCasesFrom($canonicalData->cases),
            $canonicalData->comments,
        );
    }

    private function hydrateTestCasesFrom(array $rawData): array
    {
        // TODO: Validate
        return array_map(fn ($case) => new TestCase(
            $case->uuid ?? null,
            $case->description ?? null,
            $case->property ?? null,
            $case->input ?? null,
            $case->expected ?? null,
            $case->comments ?? [],
        ), $rawData);
    }

    private function ensureConfigletCanBeUsed(): void
    {
        if (
            !(
                is_executable($this->pathToConfiglet)
                && is_file($this->pathToConfiglet)
            )
        ) {
            throw new RuntimeException(
                'configlet not found. Run the generator from track root.'
                . ' Fetch configlet and create exercise with configlet first!'
            );
        }
    }

    private function ensurePracticeExerciseCanBeUsed(): void
    {
        if (
            !(
                is_writable($this->pathToExercise)
                && is_dir($this->pathToExercise)
            )
        ) {
            throw new RuntimeException(
                'Cannot write to exercise directory. Create exercise with'
                . ' configlet first or check access rights!'
            );
        }
    }

    private function pathToCachedCanonicalDataFromConfiglet(): void
    {
        $command = 'bash -c \'set -eo pipefail; '
            . $this->pathToConfiglet
            . ' -v d -t '
            . $this->trackRoot
            . ' info -o | head -1 | cut -d " " -f 5\''
            ;
        $resultCode = 1;

        $configletCache = \exec(command: $command, result_code: $resultCode);
        if ($configletCache === false || $resultCode !== 0) {
            throw new RuntimeException(
                '"configlet" could not provide cached canonical data.'
                . ' Create exercise with configlet first!'
            );
        }

        $this->pathToCanonicalData = \sprintf(
            '%1$s/exercises/%2$s/canonical-data.json',
            $configletCache,
            $this->exerciseSlug
        );
    }

    private function ensurePathToCanonicalDataCanBeUsed(): void
    {
        if (
            !(
                is_readable($this->pathToCanonicalData)
                && is_file($this->pathToCanonicalData)
            )
        ) {
            throw new RuntimeException(
                'Cannot read "configlet" provided cached canonical data from '
                . $this->pathToCanonicalData
                .'. Check exercise slug or access rights!'
            );
        }
    }
}
