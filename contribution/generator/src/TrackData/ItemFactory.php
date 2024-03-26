<?php

declare(strict_types=1);

namespace App\TrackData;

use App\TrackData\CanonicalData;
use App\TrackData\InnerGroup;
use App\TrackData\Item;
use App\TrackData\Unknown;

/**
 * Produces Item instances of whatever type is possible
 */
class ItemFactory
{
    public function from(mixed $rawData): Item
    {
        $case = TestCase::from($rawData);
        if ($case === null)
            // Despite being rare, CanonicalData must be before Group.
            // Otherwise Group handles the CanonicalData with many unknown keys.
            $case = CanonicalData::from($rawData);
        if ($case === null)
            $case = Group::from($rawData);
        if ($case === null)
            $case = InnerGroup::from($rawData);
        if ($case === null)
            $case = Unknown::from($rawData);
        return $case;
    }
}
