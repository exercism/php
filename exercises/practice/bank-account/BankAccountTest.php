<?php

declare(strict_types=1);

class BankAccountTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'BankAccount.php';
    }

    /**
     * uuid: 983a1528-4ceb-45e5-8257-8ce01aceb5ed
     * @testdox Newly opened account has zero balance
     */
    public function testNewlyOpenedAccountHasZeroBalance(): void
    {
        $subject = new BankAccount();
        $subject->open();
        $this->assertEquals(0, $subject->balance());
    }

    /**
     * uuid: e88d4ec3-c6bf-4752-8e59-5046c44e3ba7
     * @testdox Single deposit
     */
    public function testSingleDeposit(): void
    {
        $subject = new BankAccount();
        $subject->open();
        $subject->deposit(100);
        $this->assertEquals(100, $subject->balance());
    }

    /**
     * uuid: 3d9147d4-63f4-4844-8d2b-1fee2e9a2a0d
     * @testdox Multiple deposits
     */
    public function testMultipleDeposits(): void
    {
        $subject = new BankAccount();
        $subject->open();
        $subject->deposit(100);
        $subject->deposit(50);
        $this->assertEquals(150, $subject->balance());
    }

    /**
     * uuid: 08f1af07-27ae-4b38-aa19-770bde558064
     * @testdox Withdraw once
     */
    public function testWithdrawOnce(): void
    {
        $subject = new BankAccount();
        $subject->open();
        $subject->deposit(100);
        $subject->withdraw(75);
        $this->assertEquals(25, $subject->balance());
    }

    /**
     * uuid: 6f6d242f-8c31-4ac6-8995-a90d42cad59f
     * @testdox Withdraw twice
     */
    public function testWithdrawTwice(): void
    {
        $subject = new BankAccount();
        $subject->open();
        $subject->deposit(100);
        $subject->withdraw(80);
        $subject->withdraw(20);
        $this->assertEquals(0, $subject->balance());
    }

    /**
     * uuid: 45161c94-a094-4c77-9cec-998b70429bda
     * @testdox Can do multiple operations sequentially
     */
    public function testCanDoMultipleOperationsSequentially(): void
    {
        $subject = new BankAccount();
        $subject->open();
        $subject->deposit(100);
        $subject->deposit(110);
        $subject->withdraw(200);
        $subject->deposit(60);
        $subject->withdraw(50);
        $this->assertEquals(20, $subject->balance());
    }

    /**
     * uuid: f9facfaa-d824-486e-8381-48832c4bbffd
     * @testdox Cannot check balance of closed account
     */
    public function testCannotCheckBalanceOfClosedAccount(): void
    {
        $subject = new BankAccount();
        $subject->open();
        $subject->close();
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('account not open');
        $subject->balance();
    }

    /**
     * uuid: 7a65ba52-e35c-4fd2-8159-bda2bde6e59c
     * @testdox Cannot deposit into closed account
     */
    public function testCannotDepositIntoClosedAccount(): void
    {
        $subject = new BankAccount();
        $subject->open();
        $subject->close();
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('account not open');
        $subject->deposit(50);
    }

    /**
     * uuid: a0a1835d-faae-4ad4-a6f3-1fcc2121380b
     * @testdox Cannot deposit into unopened account
     */
    public function testCannotDepositIntoUnopenedAccount(): void
    {
        $subject = new BankAccount();
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('account not open');
        $subject->deposit(50);
    }

    /**
     * uuid: 570dfaa5-0532-4c1f-a7d3-0f65c3265608
     * @testdox Cannot withdraw from closed account
     */
    public function testCannotWithdrawFromClosedAccount(): void
    {
        $subject = new BankAccount();
        $subject->open();
        $subject->close();
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('account not open');
        $subject->withdraw(50);
    }

    /**
     * uuid: c396d233-1c49-4272-98dc-7f502dbb9470
     * @testdox Cannot close an account that was not opened
     */
    public function testCannotCloseAnAccountThatWasNotOpened(): void
    {
        $subject = new BankAccount();
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('account not open');
        $subject->close();
    }

    /**
     * uuid: c06f534f-bdc2-4a02-a388-1063400684de
     * @testdox Cannot open an already opened account
     */
    public function testCannotOpenAnAlreadyOpenedAccount(): void
    {
        $subject = new BankAccount();
        $subject->open();
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('account already open');
        $subject->open();
    }

    /**
     * uuid: 0722d404-6116-4f92-ba3b-da7f88f1669c
     * @testdox Reopened account does not retain balance
     */
    public function testReopenedAccountDoesNotRetainBalance(): void
    {
        $subject = new BankAccount();
        $subject->open();
        $subject->deposit(50);
        $subject->close();
        $subject->open();
        $this->assertEquals(0, $subject->balance());
    }

    /**
     * uuid: ec42245f-9361-4341-8231-a22e8d19c52f
     * @testdox Cannot withdraw more than deposited
     */
    public function testCannotWithdrawMoreThanDeposited(): void
    {
        $subject = new BankAccount();
        $subject->open();
        $subject->deposit(25);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('amount must be less than balance');
        $subject->withdraw(50);
    }

    /**
     * uuid: 4f381ef8-10ef-4507-8e1d-0631ecc8ee72
     * @testdox Cannot withdraw negative
     */
    public function testCannotWithdrawNegative(): void
    {
        $subject = new BankAccount();
        $subject->open();
        $subject->deposit(100);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('amount must be greater than 0');
        $subject->withdraw(-50);
    }

    /**
     * uuid: d45df9ea-1db0-47f3-b18c-d365db49d938
     * @testdox Cannot deposit negative
     */
    public function testCannotDepositNegative(): void
    {
        $subject = new BankAccount();
        $subject->open();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('amount must be greater than 0');
        $subject->deposit(-50);
    }
}
