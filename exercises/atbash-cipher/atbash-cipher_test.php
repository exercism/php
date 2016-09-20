<?php

require "atbash-cipher.php";

class AtbashTest extends \PHPUnit_Framework_TestCase
{
    public function testEncodeNo()
    {
        $cipher = new Atbash();
        $this->assertEquals('ml', $cipher->encode('no'));
    }

    public function testEncodeYes()
    {
        $this->markTestSkipped();
        $cipher = new Atbash();
        $this->assertEquals('bvh', $cipher->encode('yes'));
    }

    public function testEncodeOmg()
    {
        $this->markTestSkipped();
        $cipher = new Atbash();
        $this->assertEquals('lnt', $cipher->encode('OMG'));
    }

    public function testEncodeOmgWithSpaces()
    {
        $this->markTestSkipped();
        $cipher = new Atbash();
        $this->assertEquals('lnt', $cipher->encode('O M G'));
    }

    public function testEncodeLongWord()
    {
        $this->markTestSkipped();
        $cipher = new Atbash();
        $this->assertEquals('nrmwy oldrm tob', $cipher->encode('mindblowingly'));
    }

    public function testEncodeNumbers()
    {
        $this->markTestSkipped();
        $cipher = new Atbash();
        $this->assertEquals('gvhgr mt123 gvhgr mt', $cipher->encode('Testing, 1 2 3, testing.'));
    }

    public function testEncodeSentence()
    {
        $this->markTestSkipped();
        $cipher = new Atbash();
        $this->assertEquals('gifgs rhurx grlm', $cipher->encode('Truth is fiction.'));
    }

    public function testEncodeAllTheThings()
    {
        $this->markTestSkipped();
        $cipher = new Atbash();
        $plaintext = 'The quick brown fox jumps over the lazy dog.';
        $encoded = 'gsvjf rxpyi ldmul cqfnk hlevi gsvoz abwlt';
        $this->assertEquals($encoded, $cipher->encode($plaintext));
    }
}
