<?php

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
