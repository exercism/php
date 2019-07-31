<?php

class AtbashTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'atbash-cipher.php';
    }

    public function testEncodeNo() : void
    {
        $this->assertEquals('ml', encode('no'));
    }

    public function testEncodeYes() : void
    {
        $this->assertEquals('bvh', encode('yes'));
    }

    public function testEncodeOmg() : void
    {
        $this->assertEquals('lnt', encode('OMG'));
    }

    public function testEncodeOmgWithSpaces() : void
    {
        $this->assertEquals('lnt', encode('O M G'));
    }

    public function testEncodeLongWord() : void
    {
        $this->assertEquals('nrmwy oldrm tob', encode('mindblowingly'));
    }

    public function testEncodeNumbers() : void
    {
        $this->assertEquals('gvhgr mt123 gvhgr mt', encode('Testing, 1 2 3, testing.'));
    }

    public function testEncodeSentence() : void
    {
        $this->assertEquals('gifgs rhurx grlm', encode('Truth is fiction.'));
    }

    public function testEncodeAllTheThings() : void
    {
        $plaintext = 'The quick brown fox jumps over the lazy dog.';
        $encoded = 'gsvjf rxpyi ldmul cqfnk hlevi gsvoz abwlt';
        $this->assertEquals($encoded, encode($plaintext));
    }
}
