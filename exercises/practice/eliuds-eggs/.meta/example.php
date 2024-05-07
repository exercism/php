<?php

declare(strict_types=1);

class EliudsEggs
{
    public function eggCount(int $displayValue): int
    {
        if ($displayValue === 0) {
            return 0;
        }

        return ($displayValue & 1) + $this->eggCount($displayValue >> 1);
    }
}
