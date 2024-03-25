<?php

declare(strict_types=1);

namespace App\TrackData;

class MetaConfigFiles
{
    /**
     * @param string[] $solutionFiles
     * @param string[] $testFiles
     * @param string[] $exampleFiles
     */
    public function __construct(
        public array $solutionFiles = [],
        public array $testFiles = [],
        public array $exampleFiles = [],
    ) {
    }
}
