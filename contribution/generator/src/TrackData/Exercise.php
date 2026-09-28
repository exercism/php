<?php

declare(strict_types=1);

namespace App\TrackData;

use App\TrackData\ItemFactory;

interface Exercise
{
    /**
     * @param string $trackRoot  The absolute location of the track tree
     */
    public function __construct(
        string $trackRoot,
        ItemFactory $itemFactory,
    );

    /**
     * @param string $slug  The slug of this exercise used in the track tree
     */
    public function forSlug(string $slug): void;

    /** The location of this exercises files in the track tree */
    public function pathToExercise(): string;

    /** The location of this exercises test file in the track tree */
    public function pathToTestFile(): string;

    /** The content of this exercises test file */
    public function testFileContent(): string;

    /** The location of this exercises solution file in the track tree */
    public function pathToSolutionFile(): string;

    /** The content of this exercises solution file */
    public function solutionFileContent(): string;
}
