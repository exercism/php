<?php

class TwoFerTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'two-fer.php';
    }

    public function testNoNameGiven() : void
    {
        $this->assertEquals('One for you, one for me.', twoFer());
    }

    public function testANameGiven() : void
    {
        $this->assertEquals('One for Alice, one for me.', twoFer('Alice'));
    }

    public function testAnotherNameGiven() : void
    {
        $this->assertEquals('One for Bob, one for me.', twoFer('Bob'));
    }
}
