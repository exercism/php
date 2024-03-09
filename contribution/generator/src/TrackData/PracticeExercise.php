<?php

declare(strict_types=1);

namespace App\TrackData;

use App\Configlet;
use App\TrackData\CanonicalData;
use App\TrackData\CanonicalData\TestCase;
use App\TrackData\Exercise;
use RuntimeException;
use Symfony\Contracts\Service\Attribute\Required;

class PracticeExercise implements Exercise
{
    private const PATH_TO_EXERCISES = '/exercises/practice/';

    private ?Configlet $configlet = null;

    private string $exerciseSlug = '';
    private string $pathToExercise = '';

    public function __construct(private string $trackRoot) {}

    #[Required]
    public function setConfiglet(Configlet $configlet): void
    {
        $this->configlet = $configlet;
    }

    public function forSlug(string $slug): void
    {
        $this->exerciseSlug = $slug;
        $this->pathToExercise =
            $this->trackRoot . self::PATH_TO_EXERCISES . $slug;
    }

    public function pathToExercise(): string
    {
        return $this->pathToExercise;
    }

    public function canonicalData(): CanonicalData
    {
        $this->ensurePracticeExerciseCanBeUsed();

        $canonicalData = $this->loadCanonicalData();

        // TODO: Validate
        // TODO: CanonicalData::from($this->loadCanonicalData())
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

    private function ensurePracticeExerciseCanBeUsed(): void
    {
        if (
            !(
                \is_writable($this->pathToExercise)
                && \is_dir($this->pathToExercise)
            )
        ) {
            throw new RuntimeException(
                'Cannot write to exercise directory. Create exercise with'
                . ' configlet first or check access rights!'
            );
        }
    }

    private function loadCanonicalData(): object
    {
        return \json_decode(
            json: \file_get_contents(
                $this->configlet->pathToCanonicalData($this->exerciseSlug)
            ),
            flags: JSON_THROW_ON_ERROR
        );
    }
}
