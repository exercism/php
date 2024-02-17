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

class ListOps
{
    public function append(array $list1, array $list2): array
    {
        foreach ($list2 as $el) {
            $list1[] = $el;
        }
        return $list1;
    }

    public function concat(array $list1, array ...$listn): array
    {
        foreach ($listn as $list) {
            $list1 = self::append($list1, $list);
        }
        return $list1;
    }

    public function filter(callable $predicate, array $list): array
    {
        $result = [];
        foreach ($list as $el) {
            if ($predicate($el)) {
                $result[] = $el;
            }
        }
        return $result;
    }

    public function length(array $list): int
    {
        $count = 0;
        foreach ($list as $_el) {
            $count++;
        }
        return $count;
    }

    public function map(callable $function, array $list): array
    {
        $result = [];
        foreach ($list as $el) {
            $result[] = $function($el);
        }
        return $result;
    }

    public function foldl(callable $function, array $list, $accumulator)
    {
        foreach ($list as $el) {
            $accumulator = $function($accumulator, $el);
        }
        return $accumulator;
    }

    public function foldr(callable $function, array $list, $accumulator)
    {
        while (self::length($list) > 0) {
            $el = array_pop($list);
            $accumulator = $function($accumulator, $el);
        }
        return $accumulator;
    }

    public function reverse(array $list): array
    {
        $result = [];
        while (self::length($list) > 0) {
            $result[] = array_pop($list);
        }
        return $result;
    }
}
