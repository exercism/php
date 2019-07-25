<?php

class TwoFerTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require 'two-fer.php';
    }

    public function testNoNameGiven()
    {
        $this->assertEquals('One for you, one for me.', twoFer());
    }

    public function testANameGiven()
    {
        $this->assertEquals('One for Alice, one for me.', twoFer('Alice'));
    }

    public function testAnotherNameGiven()
    {
        $this->assertEquals('One for Bob, one for me.', twoFer('Bob'));
    }
}
