<?php

namespace App\Tests;

use App\TrackData\CanonicalData;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

final class CanonicalDataTest extends TestCase
{
    #[Test]
    #[TestDox('When given an empty object, then returns null')]
    public function whenEmptyObject_thenNull(): void
    {
        $subject = CanonicalData::from((object)[]);
        $this->assertNull($subject);
    }
}
