<?php

declare(strict_types=1);

function wordCount($phrase)
{
    $count = [];

    $phrase = preg_replace(['/[^a-zA-Z0-9]+/', '/\s\s/'], ' ', mb_strtolower($phrase));

    foreach (explode(' ', $phrase) as $word) {
        if (!array_key_exists($word, $count) && !empty($word)) {
            $count[$word] = 1;
        } elseif (array_key_exists($word, $count)) {
            $count[$word]++;
        }
    }

    return $count;
}
