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

    /** The content of the canonical data from the problem specification */
    public function canonicalData(): CanonicalData;
}
