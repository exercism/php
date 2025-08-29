<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HighScoresTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'HighScores.php';
    }

    public function testListOfScores(): void
    {
        $input = [30, 50, 20, 70];
        $this->assertEquals([30, 50, 20, 70], (new HighScores($input))->scores);
    }

    public function testLatestScore(): void
    {
        $input = [100, 0, 90, 30];
        $this->assertEquals(30, (new HighScores($input))->latest);
    }

    public function testPersonalBest(): void
    {
        $input = [40, 100, 70];
        $this->assertEquals(100, (new HighScores($input))->personalBest);
    }

    public function testPersonalTopThreeFromAListOfScores(): void
    {
        $input = [10, 30, 90, 30, 100, 20, 10, 0, 30, 40, 40, 70, 70];
        $this->assertEquals([100, 90, 70], (new HighScores($input))->personalTopThree);
    }

    public function testPersonalTopHighestToLowest(): void
    {
        $input = [20, 10, 30];
        $this->assertEquals([30, 20, 10], (new HighScores($input))->personalTopThree);
    }

    public function testPersonalTopWhenThereIsATie(): void
    {
        $input = [40, 20, 40, 30];
        $this->assertEquals([40, 40, 30], (new HighScores($input))->personalTopThree);
    }

    public function testPersonalTopWhenThereAreLessThan3(): void
    {
        $input = [30, 70];
        $this->assertEquals([70, 30], (new HighScores($input))->personalTopThree);
    }

    public function testPersonalTopWhenThereIsOnlyOne(): void
    {
        $input = [40];
        $this->assertEquals([40], (new HighScores($input))->personalTopThree);
    }

    public function testLatestScoreDoesNotChangeAfterGettingPersonalBest(): void
    {
        $input     = [20, 10, 30, 3, 2, 1];
        $highScore = new HighScores($input);

        $this->assertEquals(30, $highScore->personalBest);
        $this->assertEquals(1, $highScore->latest);
    }

    public function testLatestScoreDoesNotChangeAfterGettingPersonalTopThree(): void
    {
        $input     = [20, 100, 30, 90, 2, 70];
        $highScore = new HighScores($input);

        $this->assertEquals([100, 90, 70], $highScore->personalTopThree);
        $this->assertEquals(70, $highScore->latest);
    }
}
