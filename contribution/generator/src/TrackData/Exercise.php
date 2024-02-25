<?php

declare(strict_types=1);

namespace App\TrackData;

interface Exercise
{
    /**
     * @param string $trackRoot  The absolute location of the track tree
     * @param string $exerciseSlug  The slug of this exercise used in the track tree
     */
    public function __construct(
        string $trackRoot,
        string $exerciseSlug,
    );

    /** The location of this exercises files in the track tree */
    public function pathToExercise(): string;

    /** The content of the canonical data from the problem specification */
    public function canonicalData(): CanonicalData;
}
