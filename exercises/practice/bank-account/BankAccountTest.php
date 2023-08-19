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

class BankAccountTest extends PHPUnit\Framework\TestCase
{
    private BankAccount $bankAccount;

    public static function setUpBeforeClass(): void
    {
        require_once 'BankAccount.php';
    }

    protected function setUp(): void
    {
        $this->bankAccount = new BankAccount();
    }

    public function testOpenNewAccount(): void
    {
        $this->bankAccount->open();
        $this->assertEquals(0, $this->bankAccount->balance());
    }

    public function testSingleDeposit(): void
    {
        $this->bankAccount->open();
        $this->bankAccount->deposit(100);
        $this->assertEquals(100, $this->bankAccount->balance());
    }

    public function testMultipleDeposits(): void
    {
        $this->bankAccount->open();
        $this->bankAccount->deposit(100);
        $this->bankAccount->deposit(50);
        $this->assertEquals(150, $this->bankAccount->balance());
    }

    public function testSingleWithdraw(): void
    {
        $this->bankAccount->open();
        $this->bankAccount->deposit(100);
        $this->bankAccount->withdraw(75);
        $this->assertEquals(25, $this->bankAccount->balance());
    }

    public function testMultipleWithdraws(): void
    {
        $this->bankAccount->open();
        $this->bankAccount->deposit(100);
        $this->bankAccount->withdraw(80);
        $this->bankAccount->withdraw(20);
        $this->assertEquals(0, $this->bankAccount->balance());
    }

    public function testMultipleOperations(): void
    {
        $this->bankAccount->open();
        $this->bankAccount->deposit(100);
        $this->bankAccount->deposit(110);
        $this->bankAccount->withdraw(200);
        $this->bankAccount->deposit(60);
        $this->bankAccount->withdraw(50);
        $this->assertEquals(20, $this->bankAccount->balance());
    }

    public function testNoBalanceForClosedAccounts()
    {
        $this->bankAccount->open();
        $this->bankAccount->close();
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('account not open');
        $this->bankAccount->balance();
    }

    public function testNoDepositsForClosedAccounts()
    {
        $this->bankAccount->open();
        $this->bankAccount->close();
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('account not open');
        $this->bankAccount->deposit(50);
    }

    public function testNoDepositsForUnOpenedAccounts()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('account not open');
        $this->bankAccount->deposit(50);
    }

    public function testNoWithdrawsFromClosedAccounts()
    {
        $this->bankAccount->open();
        $this->bankAccount->close();
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('account not open');
        $this->bankAccount->withdraw(50);
    }

    public function testCannotCloseUnOpenedAccounts()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('account not open');
        $this->bankAccount->close();
    }

    public function testCannotOpenExistingAccount()
    {
        $this->bankAccount->open();
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('account already open');
        $this->bankAccount->open();
    }

    public function testReopenedAccountDoesNotKeepBalance()
    {
        $this->bankAccount->open();
        $this->bankAccount->deposit(50);
        $this->bankAccount->close();
        $this->bankAccount->open();
        $this->assertEquals(0, $this->bankAccount->balance());
    }

    public function testCannotWithdrawMoreThanDeposited()
    {
        $this->bankAccount->open();
        $this->bankAccount->deposit(25);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('amount must be less than balance');
        $this->bankAccount->withdraw(50);
    }

    public function testCannotWithdrawNegativeAmount()
    {
        $this->bankAccount->open();
        $this->bankAccount->deposit(100);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('amount must be greater than 0');
        $this->bankAccount->withdraw(-50);
    }

    public function testCannotDepositNegativeAmount()
    {
        $this->bankAccount->open();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('amount must be greater than 0');
        $this->bankAccount->deposit(-50);
    }
}
