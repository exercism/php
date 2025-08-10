<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HelloWorldTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'HelloWorld.php';
    }

    public function testHelloWorld(): void
    {
        $this->assertEquals('Hello, World!', helloWorld());
    }
}
