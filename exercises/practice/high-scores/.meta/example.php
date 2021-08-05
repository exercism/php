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
