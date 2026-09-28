<?php

declare(strict_types=1);

namespace App\TrackData;

use App\Configlet;
use App\TrackData\CanonicalData;
use App\TrackData\Exercise;
use RuntimeException;
use Symfony\Contracts\Service\Attribute\Required;

class PracticeExercise implements Exercise
{
    private const PATH_TO_EXERCISES = '/exercises/practice/';
    private const PATH_TO_CONFIG = '/.meta/config.json';

    private ?Configlet $configlet = null;
    private ?MetaConfigFiles $configFiles = null;

    private string $exerciseSlug = '';
    private string $pathToExercise = '';

    public function __construct(
        private string $trackRoot,
        private ItemFactory $itemFactory,
    ) {}

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

    public function pathToTestFile(): string
    {
        return $this->pathToExercise . '/' . $this->testFileName();
    }

    public function testFileContent(): string
    {
        $this->ensurePracticeExerciseCanBeUsed();

        // This returns an object derived from stdClass, so adding keys is safe
        $rawData = $this->loadCanonicalData();
        $rawData->testClassName = $this->classNameFrom($this->testFileName());
        $rawData->solutionFileName = $this->solutionFileName();
        $rawData->solutionClassName = $this->classNameFrom($this->solutionFileName());

        return $this->itemFactory->from($rawData)->renderPhpCode();
    }

    public function pathToSolutionFile(): string
    {
        return $this->pathToExercise . '/' . $this->solutionFileName();
    }

    public function solutionFileContent(): string
    {
        $this->ensurePracticeExerciseCanBeUsed();

        // TODO: Implement this...
        return 'To be defined';
    }

    private function testFileName(): string
    {
        return $this->metaConfigFiles()->testFiles[0];
    }

    private function solutionFileName(): string
    {
        return $this->metaConfigFiles()->solutionFiles[0];
    }

    private function classNameFrom(string $fileName): string
    {
        // This track follows PSR-4 naming convention
        return \str_replace(".php", "", $fileName);
    }

    private function metaConfigFiles(): MetaConfigFiles
    {
        if (!$this->configFiles instanceof MetaConfigFiles)
        {
            $metaConfig = $this->loadMetaConfig();

            $this->configFiles = new MetaConfigFiles(
                $metaConfig->files->solution,
                $metaConfig->files->test,
                $metaConfig->files->example,
            );
        }

        return $this->configFiles;
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
        // TODO: Validate metaConfigFiles(): one test file, one solution file, one example file
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

    private function loadMetaConfig(): object
    {
        return \json_decode(
            json: \file_get_contents(
                $this->pathToExercise . self::PATH_TO_CONFIG
            ),
            flags: JSON_THROW_ON_ERROR
        );
    }
}
