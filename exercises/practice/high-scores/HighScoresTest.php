<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class HighScoresTest extends \PHPUnit\Framework\TestCase
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
