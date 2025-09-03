<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class HighScoresTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'HighScores.php';
    }

    /*
     * uuid: 1035eb93-2208-4c22-bab8-fef06769a73c
     */
    #[TestDox('List of scores')]
    public function testListOfScores(): void
    {
        $input = [30, 50, 20, 70];
        $this->assertEquals([30, 50, 20, 70], (new HighScores($input))->scores);
    }

    /*
     * uuid: 6aa5dbf5-78fa-4375-b22c-ffaa989732d2
     */
    #[TestDox('Latest score')]
    public function testLatestScore(): void
    {
        $input = [100, 0, 90, 30];
        $this->assertEquals(30, (new HighScores($input))->latest);
    }

    /*
     * uuid: b661a2e1-aebf-4f50-9139-0fb817dd12c6
     */
    #[TestDox('Personal best')]
    public function testPersonalBest(): void
    {
        $input = [40, 100, 70];
        $this->assertEquals(100, (new HighScores($input))->personalBest);
    }

    /*
     * uuid: 3d996a97-c81c-4642-9afc-80b80dc14015
     */
    #[TestDox('Top 3 scores -> Personal top three from a list of scores')]
    public function testTop3ScoresPersonalTopThreeFromAListOfScores(): void
    {
        $input = [10, 30, 90, 30, 100, 20, 10, 0, 30, 40, 40, 70, 70];
        $this->assertEquals([100, 90, 70], (new HighScores($input))->personalTopThree);
    }

    /*
     * uuid: 1084ecb5-3eb4-46fe-a816-e40331a4e83a
     */
    #[TestDox('Top 3 scores -> Personal top highest to lowest')]
    public function testTop3ScoresPersonalTopHighestToLowest(): void
    {
        $input = [20, 10, 30];
        $this->assertEquals([30, 20, 10], (new HighScores($input))->personalTopThree);
    }

    /*
     * uuid: e6465b6b-5a11-4936-bfe3-35241c4f4f16
     */
    #[TestDox('Top 3 scores -> Personal top when there is a tie')]
    public function testTop3ScoresPersonalTopWhenThereIsATie(): void
    {
        $input = [40, 20, 40, 30];
        $this->assertEquals([40, 40, 30], (new HighScores($input))->personalTopThree);
    }

    /*
     * uuid: f73b02af-c8fd-41c9-91b9-c86eaa86bce2
     */
    #[TestDox('Top 3 scores -> Personal top when there are less than 3')]
    public function testTop3ScoresPersonalTopWhenThereAreLessThan3(): void
    {
        $input = [30, 70];
        $this->assertEquals([70, 30], (new HighScores($input))->personalTopThree);
    }

    /*
     * uuid: 16608eae-f60f-4a88-800e-aabce5df2865
     */
    #[TestDox('Top 3 scores -> Personal top when there is only one')]
    public function testTop3ScoresPersonalTopWhenThereIsOnlyOne(): void
    {
        $input = [40];
        $this->assertEquals([40], (new HighScores($input))->personalTopThree);
    }

    /*
     * uuid: 2df075f9-fec9-4756-8f40-98c52a11504f
     */
    #[TestDox('Top 3 scores -> Latest score after personal top scores')]
    public function testTop3ScoresLatestScoreAfterPersonalTopScores(): void
    {
        $input     = [20, 100, 30, 90, 2, 70];
        $highScore = new HighScores($input);

        $this->assertEquals([100, 90, 70], $highScore->personalTopThree);
        $this->assertEquals(70, $highScore->latest);
    }

    /*
     * uuid: 809c4058-7eb1-4206-b01e-79238b9b71bc
     */
    #[TestDox('Top 3 scores -> Scores after personal top scores')]
    public function testTop3ScoresScoresAfterPersonalTopScores(): void
    {
        $input     = [30, 50, 20, 70];
        $highScore = new HighScores($input);

        $this->assertEquals([70, 50, 30], $highScore->personalTopThree);
        $this->assertEquals([30, 50, 20, 70], $highScore->scores);
    }

    /*
     * uuid: ddb0efc0-9a86-4f82-bc30-21ae0bdc6418
     */
    #[TestDox('Top 3 scores -> Latest score after personal best')]
    public function testTop3ScoresLatestScoreAfterPersonalBest(): void
    {
        $input     = [20, 10, 30, 3, 2, 1];
        $highScore = new HighScores($input);

        $this->assertEquals(30, $highScore->personalBest);
        $this->assertEquals(1, $highScore->latest);
    }

    /*
     * uuid: 6a0fd2d1-4cc4-46b9-a5bb-2fb667ca2364
     */
    #[TestDox('Top 3 scores -> Scores after personal best')]
    public function testTop3ScoresScoresAfterPersonalBest(): void
    {
        $input     = [20, 70, 15, 25, 30];
        $highScore = new HighScores($input);

        $this->assertEquals(70, $highScore->personalBest);
        $this->assertEquals([20, 70, 15, 25, 30], $highScore->scores);
    }
}
