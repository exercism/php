<?php

namespace App\Tests\TestCase;

use App\TrackData\CanonicalData\Unknown;
use PhpParser\PrettyPrinter\Standard;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

#[TestDox('Unknown (App\Tests\TestCase\UnknownTest)')]
final class UnknownTest extends PHPUnitTestCase
{
    #[Test]
    #[TestDox('$_dataName')]
    #[DataProvider('renderingScenarios')]
    public function testRenderingScenario(
        string $scenario,
    ): void {
        $expected =  $this->expectedFor($scenario);
        $subject = $this->subjectFor($scenario);

        $actual = $subject->asAst();

        $this->assertSame($expected, $this->toPhpCode($actual));
    }

    public static function renderingScenarios(): array
    {
        return [
            'When given an empty object, then renders multiline comment with JSON'
                => [ 'empty-object' ],
            'When given any object, then renders multiline comment with JSON'
                => [ 'any-object' ],
        ];
    }

    private function expectedFor(string $scenario): string
    {
        return \file_get_contents(
            __DIR__ . '/fixtures/' . $scenario . '/expected.txt'
        );
    }

    private function subjectFor(string $scenario): Unknown
    {
        $input = \json_decode(
            json: \file_get_contents(
                __DIR__ . '/fixtures/' . $scenario . '/input.json'
            ),
            flags: JSON_THROW_ON_ERROR
        );

        return Unknown::from($input);
    }

    private function toPhpCode(array $statements): string
    {
        return (new Standard())->prettyPrint($statements);
    }
}
