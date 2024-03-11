<?php

namespace App\Tests;

use App\TrackData\CanonicalData;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('Canonical Data (App\Tests\CanonicalDataTest)')]
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
            'When given object with "exercise", then ignores it'
                => [ 'ignore-exercise' ],
            'When given object with only unknown keys, then renders JSON in multi-line comment'
                => [ 'only-unknown-keys' ],
            'When given object with singleline "comments", then renders test class with comment in class DocBlock'
                => [ 'only-singleline-comment' ],
            'When given object with multiline "comments", then renders test class with comments in class DocBlock'
                => [ 'only-multiline-comments' ],
            'When given object with one unknown item in "cases", then renders the item into the test class stub'
                => [ 'one-unknown-case' ],
            'When given object with many unknown items in "cases", then renders the items into the test class stub'
                => [ 'many-unknown-cases' ],
            'When given object with one test case in "cases", then renders the test case into the test class stub'
                => [ 'one-test-case' ],
            'When given object with many test cases in "cases", then renders the test cases into the test class stub'
                => [ 'many-test-cases' ],
            'When given object with mixed test case and unknown in "cases", then renders everything in order of input into the test class stub'
                => [ 'mixed-up-cases' ],
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
