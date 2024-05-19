<?php

declare(strict_types=1);

function translate(string $text): string
{
    $words = explode(" ", $text);
    $translatedWords = array_map('translateWord', $words);
    return implode(' ', $translatedWords);
}

function translateWord(string $text): string
{
    if (preg_match('/^s?qu|thr?|s?ch|rh/', $text, $match)) {
        return sprintf("%s%say", substr($text, strlen($match[0])), $match[0]);
    }

    if (preg_match('/^[aeiou]|yt|xr/', $text)) {
        return sprintf("%say", $text);
    }

    return sprintf("%s%say", substr($text, 1), $text[0]);
}
