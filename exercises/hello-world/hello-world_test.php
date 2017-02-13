<?php

require "hello-world.php";

class HelloWorldTest extends PHPUnit\Framework\TestCase
{
    public function testNoName()
    {
        $this->assertEquals('Hello, World!', helloWorld());
    }

    public function testSampleName()
    {
        $this->assertEquals('Hello, Alice!', helloWorld('Alice'));
    }

    public function testAnotherSampleName()
    {
        $this->assertEquals('Hello, Bob!', helloWorld('Bob'));
    }
}
