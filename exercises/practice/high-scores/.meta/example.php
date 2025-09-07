<?php

declare(strict_types=1);

class HighScores
{
    /**
     * The list of scores
     *
     * @var int[]
     */
    public array $scores;

    /**
     * The last score in the list.
     */
    public int $latest;

    /**
     * The best score in a given list.
     */
    public int $personalBest;

    /**
     * The top three scores in the list.
     *
     * @var int[]
     */
    public array $personalTopThree;

    /**
     * The constructor, which takes in a list of scores.
     *
     * @param int[] $scores
     */
    public function __construct(array $scores)
    {
        $this->scores = $scores;
        $this->latest = $scores[count($scores) - 1];
        $this->personalBest = max($scores);
        $t = $scores;
        rsort($t);
        $this->personalTopThree = array_slice($t, 0, 3);
    }
}
