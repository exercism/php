<?php

declare(strict_types=1);

namespace App\TrackData;

interface Exercise
{
    /**
     * @param string $trackRoot  The absolute location of the track tree
     */
    public function __construct(
        string $trackRoot,
    );

    /**
     * @param string $slug  The slug of this exercise used in the track tree
     */
    public function forSlug(string $slug): void;

    /** The location of this exercises files in the track tree */
    public function pathToExercise(): string;

    /** The location of this exercises test file in the track tree */
    public function pathToTestFile(): string;

    /** The unqualified class name of this exercises tests */
    public function testClassName(): string;

    /** The unqualified class name of this exercises solution */
    public function solutionClassName(): string;

    /** The name of this exercises solution file */
    public function solutionFileName(): string;

    /** The content of the canonical data from the problem specification */
    public function canonicalData(): CanonicalData;
}
