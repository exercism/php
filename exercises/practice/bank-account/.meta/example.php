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

class BankAccount
{
    private int $balance = 0;
    private bool $opened = false;

    public function open()
    {
        if ($this->opened) {
            throw new Exception('account already open');
        }

        $this->opened = true;
        $this->balance = 0;
    }

    public function close()
    {
        if (!$this->opened) {
            throw new Exception('account not open');
        }

        $this->balance = 0;
        $this->opened = false;
    }

    public function balance(): int
    {
        if (!$this->opened) {
            throw new Exception('account not open');
        }

        return $this->balance;
    }

    public function deposit(int $amt)
    {
        if (0 > $amt) {
            throw new InvalidArgumentException('amount must be greater than 0');
        }

        if (!$this->opened) {
            throw new Exception('account not open');
        }

        $this->balance += $amt;
    }

    public function withdraw(int $amt)
    {
        if (0 > $amt) {
            throw new InvalidArgumentException('amount must be greater than 0');
        }

        if (!$this->opened) {
            throw new Exception('account not open');
        }

        if ($amt > $this->balance) {
            throw new InvalidArgumentException('amount must be less than balance');
        }

        $this->balance -= $amt;
    }
}
