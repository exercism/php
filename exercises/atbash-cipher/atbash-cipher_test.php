<?php

require "atbash-cipher.php";

class AtbashTest extends PHPUnit\Framework\TestCase
{
    public function testEncodeNo()
    {
        $this->assertEquals('ml', encode('no'));
    }

    public function testEncodeYes()
    {
        $this->assertEquals('bvh', encode('yes'));
    }

    public function testEncodeOmg()
    {
        $this->assertEquals('lnt', encode('OMG'));
    }

    public function testEncodeOmgWithSpaces()
    {
        $this->assertEquals('lnt', encode('O M G'));
    }

    public function testEncodeLongWord()
    {
        $this->assertEquals('nrmwy oldrm tob', encode('mindblowingly'));
    }

    public function testEncodeNumbers()
    {
        $this->assertEquals('gvhgr mt123 gvhgr mt', encode('Testing, 1 2 3, testing.'));
    }

    public function testEncodeSentence()
    {
        $this->assertEquals('gifgs rhurx grlm', encode('Truth is fiction.'));
    }

    public function testEncodeAllTheThings()
    {
        $plaintext = 'The quick brown fox jumps over the lazy dog.';
        $encoded = 'gsvjf rxpyi ldmul cqfnk hlevi gsvoz abwlt';
        $this->assertEquals($encoded, encode($plaintext));
    }
}
