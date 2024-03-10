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

    private function subjectFor(string $scenario): TestCase
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
