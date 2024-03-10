<?php

namespace App\Tests\TestCase;

use App\TrackData\CanonicalData\TestCase;
use PhpParser\PrettyPrinter\Standard;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

#[TestDox('Test Case (App\Tests\TestCase\TestCaseTest)')]
final class TestCaseTest extends PHPUnitTestCase
{
    #[Test]
    #[TestDox('$_dataName')]
    #[DataProvider('nonRenderingScenarios')]
    public function testNonRenderingScenario(
        string $scenario,
    ): void {
        $subject = $this->subjectFor($scenario);

        $this->assertNull($subject);
    }

    public static function nonRenderingScenarios(): array
    {
        return [
            'When given an empty object, then returns null'
                => [ 'empty-object' ],
            'When given object without "uuid", then returns null'
                => [ 'no-uuid' ],
            'When given object without "description", then returns null'
                => [ 'no-description' ],
            'When given object without "property", then returns null'
                => [ 'no-property' ],
            'When given object without "input", then returns null'
                => [ 'no-input' ],
            'When given object without "expected", then returns null'
                => [ 'no-expected' ],
        ];
    }
/*
    #[Test]
    #[TestDox('$_dataName')]
    #[DataProvider('renderingScenarios')]
    public function testRenderingScenario(
        string $scenario,
    ): void {
        $expected =  $this->expectedFor($scenario);
        $subject = $this->subjectFor($scenario);

        $actual = $subject->asClassMethods();

        $this->assertSame($expected, $this->toPhpCode($actual));
    }
*/
    public static function renderingScenarios(): array
    {
        return [
            'When given an empty object, then renders nothing'
                => [ 'empty-object' ],
        ];
    }

    private function expectedFor(string $scenario): string
    {
        return \file_get_contents(
            __DIR__ . '/fixtures/' . $scenario . '/expected.txt'
        );
    }

    private function subjectFor(string $scenario): ?TestCase
    {
        $input = \json_decode(
            json: \file_get_contents(
                __DIR__ . '/fixtures/' . $scenario . '/input.json'
            ),
            flags: JSON_THROW_ON_ERROR
        );

        return TestCase::from($input);
    }

    private function toPhpCode(array $statements): string
    {
        return (new Standard())->prettyPrint($statements);
    }
}
