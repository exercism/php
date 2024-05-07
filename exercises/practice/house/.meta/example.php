<?php

declare(strict_types=1);

class House
{
    private const OBJECTS = [
        'house',
        'malt',
        'rat',
        'cat',
        'dog',
        'cow with the crumpled horn',
        'maiden all forlorn',
        'man all tattered and torn',
        'priest all shaven and shorn',
        'rooster that crowed in the morn',
        'farmer sowing his corn',
        'horse and the hound and the horn',
    ];

    private const ACTIONS = [
        'Jack built',
        'lay in',
        'ate',
        'killed',
        'worried',
        'tossed',
        'milked',
        'kissed',
        'married',
        'woke',
        'kept',
        'belonged to',
    ];

    public function verse(int $verseNumber): array
    {
        $lines = [];
        $totalLines = $verseNumber;
        $itemIndex = $verseNumber - 1;
        for ($lineNumber = 1; $lineNumber <= $totalLines; $lineNumber++) {
            $lineText = '';
            if ($lineNumber === 1) {
                $lineText .= 'This is';
            } else {
                $lineText .= 'that ' . self::ACTIONS[$itemIndex];
                $itemIndex--;
            }
            $lineText .= ' the ' . self::OBJECTS[$itemIndex];
            if ($lineNumber === $totalLines) {
                $lineText .= ' that ' . self::ACTIONS[$itemIndex] . '.';
            }
            $lines[] = $lineText;
        }
        return $lines;
    }

    public function verses(int $start, int $end): array
    {
        $lines = [];
        for ($i = $start; $i <= $end; $i++) {
            $verseLines = $this->verse($i);
            $lines = array_merge($lines, $verseLines);
            if ($i < $end) {
                $lines[] = '';
            }
        }
        return $lines;
    }
}
