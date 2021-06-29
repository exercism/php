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

class PhoneNumber
{
    private $number;

    public function __construct(string $number)
    {
        $this->number = $this->clean($number);
    }

    public function number(): string
    {
        return $this->number;
    }

    public function areaCode(): string
    {
        return substr($this->number, 0, 3);
    }

    public function prettyPrint(): string
    {
        return '(' . $this->areaCode() . ') ' . $this->prefix() . '-' . $this->lineNumber();
    }

    private function clean(string $number): string
    {
        return $this->validate(preg_replace('/[^0-9a-z@:!]+/i', '', $number));
    }

    private function validate(string $number): string
    {
        if (strlen($number) === 11 && $number[0] !== '1') {
            throw new InvalidArgumentException('11 digits must start with 1');
        }

        if (strlen($number) > 11) {
            throw new InvalidArgumentException('more than 11 digits');
        }

        if (0 !== preg_match('/[A-z]/', $number)) {
            throw new InvalidArgumentException('letters not permitted');
        }

        if (0 !== preg_match('/[@:!]/', $number)) {
            throw new InvalidArgumentException('punctuations not permitted');
        }

        if (strlen($number) === 11) {
            $number = preg_replace('/^1/', '', $number);
        }

        if (strlen($number) !== 10) {
            throw new InvalidArgumentException('incorrect number of digits');
        }

        if ($number[0] === '0') {
            throw new InvalidArgumentException('area code cannot start with zero');
        }

        if ($number[0] === '1') {
            throw new InvalidArgumentException('area code cannot start with one');
        }

        if ($number[3] === '0') {
            throw new InvalidArgumentException('exchange code cannot start with zero');
        }

        if ($number[3] === '1') {
            throw new InvalidArgumentException('exchange code cannot start with one');
        }

        return $number;
    }

    private function prefix(): string
    {
        return substr($this->number, 3, 3);
    }

    private function lineNumber(): string
    {
        return substr($this->number, 6, 4);
    }
}
