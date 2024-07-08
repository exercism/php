<?php

declare(strict_types=1);

/**
 * Abbreviates a phrase.
 *
 * @param string $phrase
 * @return string
 */
function acronym($phrase)
{
    $matches = preg_match_all('/\p{Lu}+\p{Ll}*|\p{Ll}+/u', $phrase, $words);

    if ($matches === false || $matches < 2) {
        return '';
    }

    return array_reduce($words[0], function ($acronym, $word) {
        return $acronym . mb_strtoupper(mb_substr($word, 0, 1));
    });
}
