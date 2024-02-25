<?php

declare(strict_types=1);

namespace App\TrackData;

use App\TrackData\CanonicalData\TestCase;

class CanonicalData {
    /** @param TestCase[] $testCases */
    public function __construct(
        public string $exercise,
        public array $testCases = [],
        public array $comments = [],
    ) {
    }
}
