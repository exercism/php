<?php

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
