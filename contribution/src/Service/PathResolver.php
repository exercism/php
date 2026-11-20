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

    /**
     * Returns a php-compatible function name from a test description
     */
    public static function testFunctionName(string $description): string
    {
        return 'test' . self::toPascalCase($description);
    }

    public static function toPascalCase(string $text): string
    {
        $textSpaced = preg_replace('/[^a-zA-Z0-9]/', ' ', $text);
        assert($textSpaced !== null, 'preg_replace failed');

        return str_replace(' ', '', ucwords($textSpaced));
    }
}
