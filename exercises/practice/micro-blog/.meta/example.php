<?php

declare(strict_types=1);

class MicroBlog
{
    public function truncate(string $text): string
    {
        return mb_substr($text, 0, 5);
    }
}
