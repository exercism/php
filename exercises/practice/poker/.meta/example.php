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

class Poker
{
    public array $bestHands = [];
    // The '..' prefix for card ranks allows for matching index -> value increasing readability.
    public const CARD_RANKS = '..23456789TJQKA';
    public const CARD_SUITS = 'HSDC';

    public function __construct(array $hands)
    {
        $this->bestHands = $this->calculateBestHands($hands);
    }

    private function calculateBestHands(array $hands): array
    {
        $bestHands   = [];
        $parsedHands = [];

        foreach ($hands as $handData) {
            $parsedHands[] = $this->parseHand($handData);
        }

        $highestScore       = max(array_map(fn(Hand $hand): int => $hand->result->score, $parsedHands));
        $handsWithHighScore = array_filter($parsedHands, fn(Hand $hand): bool => $hand->result->score == $highestScore);

        if (count($handsWithHighScore) === 1) {
            $bestHands[] = current($handsWithHighScore)->input;

            return $bestHands;
        }

        $highestTieBreaks       = max(array_map(fn(Hand $hand): int => $hand->result->tiebreakScore, $parsedHands));
        $handsWithHighTiebreaks = array_filter(
            $parsedHands,
            fn(Hand $hand): bool =>
                $hand->result->tiebreakScore == $highestTieBreaks &&
                $hand->result->score === $highestScore
        );

        foreach ($handsWithHighTiebreaks as $winningHands) {
            $bestHands[] = $winningHands->input;
        }

        return $bestHands;
    }

    private function parseHand(string $handData): Hand
    {
        $parsedCards = $this->parseCards($handData);
        $score       = $this->scoreHand($parsedCards);

        return new Hand($handData, $score);
    }

    private function parseCards(string $handData): array
    {
        $normalizedHand = str_replace('10', 'T', $handData);
        $cards          = explode(',', $normalizedHand);
        $hand           = [];

        foreach ($cards as $cardData) {
            $card = $this->parseCard($cardData);
            $hand[] = $card;
        }
        //Sort Hands by Card rank.
        usort($hand, fn(Card $current, Card $next) => ($current->rank <=> $next->rank));

        return $hand;
    }

    private function parseCard(string $cardData): Card
    {
        $cardRank = strpos(self::CARD_RANKS, $cardData[0]);
        $cardSuit = strpos(self::CARD_SUITS, $cardData[1]);

        return new Card($cardRank, $cardSuit);
    }

    private function scoreHand(array $cards): Score
    {
        $ranks = [];
        $suits = [];
        foreach ($cards as $card) {
            $ranks[] = $card->rank;
            $suits[] = $card->suit;
        }

        $rankValues  = array_count_values($ranks);
        $ranksByFreq = $rankValues;
        sort($ranksByFreq);

        $dualSortedCards = [];

        foreach ($rankValues as $num => $rate) {
            $dualSortedCards[] = ['rank' => $num, 'frequency' => $rate];
        }

        //Sort by card rank AND frequency they occur. If three ranks appear 2,2,1 times. The first two will appear first
        //even if they are lower value than the card appearing only once.
        $sortRank      = array_column($dualSortedCards, 'rank');
        $sortFrequency = array_column($dualSortedCards, 'frequency');
        array_multisort($sortFrequency, SORT_DESC, $sortRank, SORT_DESC, $dualSortedCards);

        $cardsByRank = [];
        foreach ($dualSortedCards as $sortedValue) {
            $cardsByRank[] = $sortedValue['rank'];
        }

        //Normalize aces for low straights.
        if ($this->isEqualHandRanks([14, 2, 3, 4, 5], $ranks)) {
            $ranks = [5, 4, 3, 2, 1];
        }

        $isFlush    = count(array_unique($suits)) === 1;
        $isStraight = (count(array_unique($ranks)) === 5 && max($ranks) - min($ranks) === 4);

        if ($isStraight && $isFlush) {
            return new Score(800 + current($ranks), 0);
        }

        if ($this->isEqualHandRanks($ranksByFreq, [4, 1])) {
            return new Score(700 + $cardsByRank[0], $cardsByRank[1]);
        }

        if ($this->isEqualHandRanks($ranksByFreq, [3,2])) {
            return new Score(600 + $cardsByRank[0], $cardsByRank[1]);
        }

        if ($isFlush) {
            return new Score(500 + current($cardsByRank), 0);
        }

        if ($isStraight) {
            return new Score(400 + current($cardsByRank), 0);
        }

        if ($this->isEqualHandRanks($ranksByFreq, [3,1,1])) {
            return new Score(300 + $cardsByRank[0], $cardsByRank[1]);
        }

        if ($this->isEqualHandRanks($ranksByFreq, [2,2,1])) {
            return new Score(200 + 2 * $cardsByRank[0] + $cardsByRank[1], $cardsByRank[2]);
        }

        if ($this->isEqualHandRanks($ranksByFreq, [2,1,1,1])) {
            return new Score(100 + $cardsByRank[0], 0);
        }

        return new Score(max($ranks), $cardsByRank[4]);
    }

    private function isEqualHandRanks(array $handOne, array $handTwo): bool
    {
        //Ensures hands have the same number of cards and the values are the same even if in different orders.
        return (count($handOne) == count($handTwo) && array_diff($handOne, $handTwo) == array_diff($handTwo, $handOne));
    }
}

class Card
{
    public int $rank;
    public int $suit;

    public function __construct(int $rank, int $suit)
    {
        $this->rank = $rank;
        $this->suit = $suit;
    }
}

class Hand
{
    public string $input;
    public Score $result;

    public function __construct(string $input, Score $result)
    {
        $this->input  = $input;
        $this->result = $result;
    }
}

class Score
{
    public int $score;
    public int $tiebreakScore = 0;

    public function __construct(int $score, int $tiebreakScore)
    {
        $this->score         = $score;
        $this->tiebreakScore = $tiebreakScore;
    }
}
