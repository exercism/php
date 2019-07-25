<?php

class HelloWorldTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require 'hello-world.php';
    }

    public function testHelloWorld()
    {
        $this->assertEquals('Hello, World!', helloWorld());
    }
}
