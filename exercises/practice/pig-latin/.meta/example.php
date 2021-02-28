<?php

/**
 * Translates a string into Pig Latin
 *
 * @param  string $str
 * @return string
 */
function translate($str)
{
    $words = explode(" ", $str);
    $translatedWords = array_map('translateWord', $words);
    return implode(' ', $translatedWords);
}

/**
 * Translates a single word
 *
 * @param  string $str
 * @return string
 */
function translateWord($str)
{
    if (preg_match('/^s?qu|thr?|s?ch/', $str, $match)) {
        return sprintf("%s%say", substr($str, strlen($match[0])), $match[0]);
    }

    if (preg_match('/^[aeiou]|yt|xr/', $str)) {
        return sprintf("%say", $str);
    }

    return sprintf("%s%say", substr($str, 1), $str[0]);
}
