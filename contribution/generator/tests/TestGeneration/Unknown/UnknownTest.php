<?php

namespace App\Tests\TestGeneration\Unknown;

use App\Tests\TestGeneration\ScenarioFixture;
use App\TrackData\Item;
use App\TrackData\Unknown;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

#[TestDox('Unknown (App\Tests\TestGeneration\Unknown\UnknownTest)')]
final class UnknownTest extends PHPUnitTestCase
{
    use ScenarioFixture;

    #[Test]
    public function implementsItemInterface(): void
    {
        $this->assertInstanceOf(Item::class, Unknown::from((object)[]));
    }

    #[Test]
    #[TestDox('$_dataName')]
    #[DataProvider('renderingScenarios')]
    public function testRenderingScenario(
        string $scenario,
    ): void {
        $subject = $this->subjectFor($scenario);

        $actual = $subject->renderPhpCode();

        $this->assertStringContainsAllOfScenario($scenario, $actual);
    }

    public static function renderingScenarios(): array
    {
        return [
            // This scenario asserts on the constant parts and their position in relation to the varying part(s)
            'When given an empty object, then renders multiline comment with JSON'
                => [ 'non-varying-parts' ],
            // These scenarios assert on the varying part(s)
            'When given an empty object, then renders it as JSON for a multiline comment'
                => [ 'empty-object' ],
            'When given any object, then renders it as JSON for a multiline comment'
                => [ 'any-object' ],
            'When given an array, then renders it as JSON for a multiline comment'
                => [ 'array' ],
            'When given a bool, then renders it as JSON for a multiline comment'
                => [ 'bool' ],
            'When given a string, then renders it as JSON for a multiline comment'
                => [ 'string' ],
            'When given an int, then renders it as JSON for a multiline comment'
                => [ 'int' ],
            'When given a float, then renders it as JSON for a multiline comment'
                => [ 'float' ],
            'When given null, then renders it as JSON for a multiline comment'
                => [ 'null' ],
        ];
    }

    private function subjectFor(string $scenario): Unknown
    {
        return Unknown::from($this->rawDataFor($scenario));
    }
}
