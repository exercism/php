<?php

namespace App\Tests\TestGeneration\CanonicalData;

use App\Tests\TestGeneration\ScenarioFixture;
use App\TrackData\CanonicalData;
use App\TrackData\Item;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

/**
 * The problem specification has no `testClassName`, `solutionFileName`,
 * `solutionClassName` fields, these are added by the exercise to unify the
 * interface to `Item`. This way, `ItemFactory` can produce a `CanonicalData`
 * item, too.
 */
#[TestDox('Canonical Data (App\Tests\TestGeneration\CanonicalData\CanonicalDataTest)')]
final class CanonicalDataTest extends TestCase
{
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
            'When given object without "testClassName", then returns null'
                => [ 'no-test-class-name' ],
            'When given object without "solutionFileName", then returns null'
                => [ 'no-solution-file-name' ],
            'When given object without "solutionClassName", then returns null'
                => [ 'no-solution-class-name' ],
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
            'When given a valid object with all keys, then renders all non-varying parts where they belong'
                => [ 'non-varying-parts' ],

            // These scenarios assert on the varying part(s)

            'When given a test class name, then renders that test class name into stub'
                => [ 'test-class-name' ],
            'When given a solution file name, then renders that file name into stub'
                => [ 'solution-file-name'],
            'When given a solution class name, then renders that class name into stub'
                => [ 'solution-class-name' ],

            // "exercise" is ignored
            'When given object with no "exercise", then renders only test class stub'
                => [ 'no-exercise' ],
            'When given object with "exercise", then renders only test class stub'
                => [ 'exercise' ],

            'When given object with no unknown key, then renders no multi-line comment'
                => [ 'no-unknown-key' ],
            'When given object with an unknown key, then renders the key as JSON in multi-line comment'
                => [ 'one-unknown-key' ],
            'When given object with many unknown keys, then renders all keys as JSON in multi-line comment'
                => [ 'many-unknown-keys' ],

            'When given a valid object with no "comments", then renders no comments part'
                => [ 'no-comments' ],
            'When given object with singleline "comments", then renders comment in class DocBlock'
                => [ 'one-line-comments' ],
            'When given object with multiline "comments", then renders test class with comments in class DocBlock'
                => [ 'many-line-comments' ],

            // Here we need to check for rendering / not rendering only
            'When given a valid object with no "cases", then renders no cases'
                => [ 'no-cases' ],
            'When given a valid object with "cases", then renders cases'
                => [ 'cases' ],
        ];
    }

    private function subjectFor(string $scenario): ?CanonicalData
    {
        return CanonicalData::from($this->rawDataFor($scenario));
    }
}
