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

class TwoBucket
{
    private int $goal;
    private array $buckets;

    public function solve(int $sizeBucketOne, int $sizeBucketTwo, int $goal, string $startBucket): Solution
    {
        $this->goal = $goal;
        $this->buckets = [new Bucket('one', $sizeBucketOne), new Bucket('two', $sizeBucketTwo)];

        if ($startBucket === 'two') {
            $this->buckets = array_reverse($this->buckets);
        }

        $this->validate();
        $this->first()->empty();
        $this->second()->empty();
        $moves = 0;

        $this->first()->fill();
        $moves++;

        if ($this->second()->getSize() === $this->goal) {
            $this->second()->fill();
            $moves++;
        }

        while (true) {
            if ($this->first()->getAmount() === $this->goal) {
                return new Solution(
                    $moves,
                    $this->first()->getName(),
                    $this->second()->getAmount()
                );
            }

            if ($this->second()->getAmount() === $this->goal) {
                return new Solution(
                    $moves,
                    $this->second()->getName(),
                    $this->first()->getAmount()
                );
            }

            if ($this->first()->isEmpty()) {
                $this->first()->fill();
            } elseif ($this->second()->isFull()) {
                $this->second()->empty();
            } else {
                $this->first()->pourInto($this->second());
            }

            $moves++;
        }
    }

    private function first(): Bucket
    {
        return $this->buckets[0];
    }

    private function second(): Bucket
    {
        return $this->buckets[1];
    }

    private function validate(): void
    {
        if ($this->goal > max($this->first()->getSize(), $this->second()->getSize())) {
            throw new \RuntimeException('Goal is bigger than the largest bucket.');
        }

        if ($this->goal % $this->greatestCommonDivisor($this->first()->getSize(), $this->second()->getSize()) !== 0) {
            throw new \RuntimeException('Goal must be a multiple of the GCD of the sizes of the two buckets.');
        }
    }

    private function greatestCommonDivisor($a, $b)
    {
        return $b === 0 ? $a : $this->greatestCommonDivisor($b, $a % $b);
    }
}

class Solution
{
    public function __construct(
        public int $numberOfActions,
        public string $nameOfBucketWithDesiredLiters,
        public int $litersLeftInOtherBucket,
    ) {
    }
}

class Bucket
{
    private string $name;
    private int $size;
    private int $amount;

    public function __construct(string $name, int $size)
    {
        $this->name = $name;
        $this->size = $size;
        $this->amount = 0;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getAvailable(): int
    {
        return $this->size - $this->amount;
    }

    public function isFull(): bool
    {
        return $this->amount === $this->size;
    }

    public function isEmpty(): bool
    {
        return $this->amount === 0;
    }

    public function fill(): void
    {
        $this->amount = $this->size;
    }

    public function empty(): void
    {
        $this->amount = 0;
    }

    public function pourInto(Bucket $other): void
    {
        $quantity = min($this->amount, $other->getAvailable());
        $this->amount -= $quantity;
        $other->add($quantity);
    }

    private function add($quantity): void
    {
        $this->amount += $quantity;
    }
}
