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

    #[Test]
    #[TestDox('When given object with only unknown keys, then renders only JSON in multi-line comment')]
    public function whenObjectWithOnlyUnknownKeys_thenRendersOnlyMultiLineComment(): void
    {
        $input = \json_decode(
            json: \file_get_contents(__DIR__ . '/fixtures/only-unknown-keys/input.json'),
            flags: JSON_THROW_ON_ERROR
        );
        $expected =  \file_get_contents(__DIR__ . '/fixtures/only-unknown-keys/expected.txt');
        $subject = CanonicalData::from($input);

        $actual = $subject->toPhpCode();

        $this->assertSame($expected, $actual);
    }
}
