<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class TwoFerTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'TwoFer.php';
    }

    /**
     * uuid 1cf3e15a-a3d7-4a87-aeb3-ba1b43bc8dce
     */
    #[TestDox('No name given')]
    public function testNoNameGiven(): void
    {
        $this->assertEquals('One for you, one for me.', twoFer());
    }

    /**
     * uuid b4c6dbb8-b4fb-42c2-bafd-10785abe7709
     */
    #[TestDox('A name given')]
    public function testANameGiven(): void
    {
        $this->assertEquals('One for Alice, one for me.', twoFer('Alice'));
    }

    /**
     * uuid 3549048d-1a6e-4653-9a79-b0bda163e8d5
     */
    #[TestDox('Another name given')]
    public function testAnotherNameGiven(): void
    {
        $this->assertEquals('One for Bob, one for me.', twoFer('Bob'));
    }
}
