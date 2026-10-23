<?php

namespace App\Tests\TestGeneration;

use ReflectionClass;

trait ScenarioFixture
{
    private function rawDataFor(string $scenario): mixed
    {
        $file = $this->pathToScenarioFixtures($scenario) . '/input.json';

        if (!\file_exists($file)) {
            $this->fail('Input fixture file of scenario not found: ' . $file);
        }

        return \json_decode(
            json: \file_get_contents($file),
            flags: JSON_THROW_ON_ERROR
        );
    }

    private function assertStringContainsAllOfScenario(
        string $scenario,
        string $actual,
        string $message = '',
    ):void {
        $scenarioExpectations = \glob(
            $this->pathToScenarioFixtures($scenario) . '/*.txt'
        );

        if (empty($scenarioExpectations)) {
            $this->fail('Scenario ' . $scenario . ' contains no expectation files *.txt');
        }

        foreach ($scenarioExpectations as $scenarioExpectation) {
            $this->assertStringContainsString(
                \file_get_contents($scenarioExpectation),
                $actual,
                $message,
            );
        }
    }

    private function pathToScenarioFixtures(string $scenario): string
    {
        return $this->pathToFixtures() . '/' . $scenario;
    }

    private function pathToFixtures(): string
    {
        $classReflector = new ReflectionClass($this);

        return \dirname($classReflector->getFileName()) . '/fixtures';
    }
}
