<?php

declare(strict_types=1);

namespace App\Service;

class PathResolver
{
    /**
     * Returns exercise path relative to repository root
     *
     * @param 'practice'|'concept' $category
     */
    public static function exercisePath(string $category, string $exerciseSlug): string
    {
        return $category . '/' . $exerciseSlug;
    }
}
