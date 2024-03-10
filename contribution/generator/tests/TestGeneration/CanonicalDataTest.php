<?php

namespace App\Tests;

use App\TrackData\CanonicalData;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

final class CanonicalDataTest extends TestCase
{
    #[Test]
    #[TestDox('$_dataName')]
    #[DataProvider('renderingScenarios')]
    public function testRenderingScenario(
        string $scenario,
    ): void {
        $expected =  $this->expectedFor($scenario);
        $subject = $this->subjectFor($scenario);

        $actual = $subject->toPhpCode(
            'SomeTestClass',
            'SomeSolutionFile.ext',
            'SomeSolutionClass',
        );

        $this->assertSame($expected, $actual);
    }

    public static function renderingScenarios(): array
    {
        return [
            'When given an empty object, then renders only test class stub'
                => [ 'empty-object' ],
            'When given object with only unknown keys, then renders JSON in multi-line comment'
                => [ 'only-unknown-keys' ],
            'When given object with multiline "comments", then renders test class with comments in class DocBlock'
                => [ 'only-multiline-comments' ],
        ];
    }

    private function expectedFor(string $scenario): string
    {
        return \file_get_contents(
            __DIR__ . '/fixtures/' . $scenario . '/expected.txt'
        );
    }

    private function subjectFor(string $scenario): CanonicalData
    {
        $input = \json_decode(
            json: \file_get_contents(
                __DIR__ . '/fixtures/' . $scenario . '/input.json'
            ),
            flags: JSON_THROW_ON_ERROR
        );

        return CanonicalData::from($input);
    }
}
