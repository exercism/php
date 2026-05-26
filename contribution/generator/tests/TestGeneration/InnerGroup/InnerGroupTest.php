<?php

namespace App\Tests\TestGeneration\Group;

use App\Tests\TestGeneration\AssertStringOrder;
use App\Tests\TestGeneration\ScenarioFixture;
use App\TrackData\InnerGroup;
use App\TrackData\Item;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

#[TestDox('InnerGroup (App\Tests\TestGeneration\InnerGroup\InnerGroupTest)')]
final class InnerGroupTest extends PHPUnitTestCase
{
    use AssertStringOrder;
    use ScenarioFixture;

    #[Test]
    public function implementsItemInterface(): void
    {
        $subject = $this->subjectFor('empty-list');

        $this->assertInstanceOf(Item::class, $subject);
    }

    #[Test]
    #[TestDox('When given $_dataName, then returns null')]
    #[DataProvider('nonRenderingScenarios')]
    public function testNonRenderingScenario(
        mixed $rawData,
    ): void {
        $subject = InnerGroup::from($rawData);

        $this->assertNull($subject);
    }

    public static function nonRenderingScenarios(): array
    {
        // All possible types in JSON, but not array
        return [
            'an object' => [ (object)[] ],
            'a bool' => [ true ],
            'a string' => [ 'some string' ],
            'an int' => [ 0 ],
            'a float' => [ 0.0 ],
            'null' => [ null ],
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
            'When given an empty list, then renders empty string'
                => [ 'empty-list' ],

            'When given one unknown item in list, then renders unknown item'
                => [ 'one-unknown-case' ],
            'When given many unknown items in list, then renders all items'
                => [ 'many-unknown-cases' ],

            'When given one test case in list, then renders the test case'
                => [ 'one-test-case' ],
            'When given many test cases in list, then renders all test cases'
                => [ 'many-test-cases' ],

            'When given one group in list, then renders the group'
                => [ 'one-group' ],

            'When given many mixed cases in list, then renders all cases'
                => [ 'many-mixed-cases' ],
        ];
    }

    #[Test]
    #[TestDox('When given many unknown items in list, then renders the unknown items in order of input')]
    public function testRenderingUnknownOrder(): void
    {
        $subject = $this->subjectFor('many-unknown-cases');

        $actual = $subject->renderPhpCode();

        $this->assertStringContainsStringBeforeString(
            '"an-unknown-item"',
            '"another-unknown-item"',
            $actual,
        );
        $this->assertStringContainsStringBeforeString(
            '"another-unknown-item"',
            '"a-last-unknown-item"',
            $actual,
        );
    }

    #[Test]
    #[TestDox('When given many test cases in list, then renders the test cases in order of input')]
    public function testRenderingTestCaseOrder(): void
    {
        $subject = $this->subjectFor('many-test-cases');

        $actual = $subject->renderPhpCode();

        $this->assertStringContainsStringBeforeString(
            'uuid: 31a673f2-5e54-49fe-bd79-1c1dae476c9c',
            'uuid: 4f99b933-367b-404b-8c6d-36d5923ee476',
            $actual,
        );
        $this->assertStringContainsStringBeforeString(
            'uuid: 4f99b933-367b-404b-8c6d-36d5923ee476',
            'uuid: 91122d10-5ec7-47cb-b759-033756375869',
            $actual,
        );
    }

    #[Test]
    #[TestDox('When given many mixed items in list, then renders the mixed items in order of input')]
    public function testRenderingMixedOrder(): void
    {
        $subject = $this->subjectFor('many-mixed-cases');

        $actual = $subject->renderPhpCode();

        $this->assertStringContainsStringBeforeString(
            '"an-unknown-item"',
            'uuid: 31a673f2-5e54-49fe-bd79-1c1dae476c9c',
            $actual,
        );
        $this->assertStringContainsStringBeforeString(
            'uuid: 31a673f2-5e54-49fe-bd79-1c1dae476c9c',
            'section title',
            $actual,
        );
        $this->assertStringContainsStringBeforeString(
            'section title',
            'uuid: 4f99b933-367b-404b-8c6d-36d5923ee476',
            $actual,
        );
        $this->assertStringContainsStringBeforeString(
            'uuid: 4f99b933-367b-404b-8c6d-36d5923ee476',
            '"also-unknown"',
            $actual,
        );
        $this->assertStringContainsStringBeforeString(
            '"also-unknown"',
            'uuid: 91122d10-5ec7-47cb-b759-033756375869',
            $actual,
        );
    }

    private function subjectFor(string $scenario): ?InnerGroup
    {
        return InnerGroup::from($this->rawDataFor($scenario));
    }
}
