<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class HelloWorldTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'HelloWorld.php';
    }

    /**
     * uuid: af9ffe10-dc13-42d8-a742-e7bdafac449d
     */
    #[TestDox('Say Hi!')]
    public function testHelloWorld(): void
    {
        $this->assertEquals('Hello, World!', helloWorld());
    }
}
