<?php

declare(strict_types=1);

class Strain
{
    public function keep(array $list, callable $predicate): array
    {
        return $this->filter($list, $predicate, true);
    }

    public function discard(array $list, callable $predicate): array
    {
        return $this->filter($list, $predicate, false);
    }

    private function filter(array $list, callable $predicate, bool $keepMatches): array
    {
        $results = [];
        foreach ($list as $item) {
            if ($predicate($item) === $keepMatches) {
                $results[] = $item;
            }
        }
        return $results;
    }
}
