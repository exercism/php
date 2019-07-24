<?php

require "hello-world.php";

class HelloWorldTest extends PHPUnit\Framework\TestCase
{
    public function testHelloWorld(): void
    {
        $this->assertEquals('Hello, World!', helloWorld());
    }
}
