<?php

namespace App\Tests\TestGeneration\TestCase;

use App\Tests\TestGeneration\AssertStringOrder;
use App\Tests\TestGeneration\ScenarioFixture;
use App\TrackData\Item;
use App\TrackData\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

#[TestDox('Test Case (App\Tests\TestGeneration\TestCase\TestCaseTest)')]
final class TestCaseTest extends PHPUnitTestCase
{
    use AssertStringOrder;
    use ScenarioFixture;

    #[Test]
    public function implementsItemInterface(): void
    {
        $subject = $this->subjectFor('non-varying-parts');

        $this->assertInstanceOf(Item::class, $subject);
    }

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
            'When given no object, then returns null'
                => [ 'no-object' ],
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
            'When given a valid object and an unknown key, then renders all non-varying parts where they belong'
                => [ 'non-varying-parts' ],
            // These scenarios assert on the varying part(s)
            'When given a valid object, then renders uuid'
                => [ 'uuid' ],
            'When given a valid object, then renders description as @testdox and method name'
                => [ 'description' ],
            'When given a valid object with problematic chars in description, then renders @testdox with and method name without those'
                => [ 'description-with-problematic-chars' ],
            'When given a valid object, then renders input object as PHP literal value'
                => [ 'input' ],
            'When given no "error" in "expected", then renders "expected" as PHP literal value and asserts on it'
                => [ 'expect-returned-value' ],
            'When given "error" in "expected", then renders assertion on expected Exception'
                => [ 'expect-exception-thrown' ],
            'When given a different message in "error", then renders that message'
                => [ 'expect-different-exception-message' ],
            'When given a valid object, then renders property as method call on subject'
                => [ 'property' ],
            'When given a valid object and an unknown key, then renders unknown key as JSON'
                => [ 'unknown' ],
            'When given a valid object and no unknown key, then renders no JSON'
                => [ 'no-unknown' ],
        ];
    }

    #[Test]
    #[TestDox('When given "error" in "expected", then renders the exception expectation before the invocation')]
    public function renderingExceptionExpectationOrder(): void
    {
        $subject = $this->subjectFor('expect-exception-thrown');

        $actual = $subject->renderPhpCode();

        $this->assertStringContainsStringBeforeString(
            '$this->expectException',
            '$this->subject->',
            $actual,
        );
    }

    private function subjectFor(string $scenario): ?TestCase
    {
        return TestCase::from($this->rawDataFor($scenario));
    }
}
