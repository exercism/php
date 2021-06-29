<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class AtbashCipherTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'AtbashCipher.php';
    }

    public function testEncodeNo(): void
    {
        $this->assertEquals('ml', encode('no'));
    }

    public function testEncodeYes(): void
    {
        $this->assertEquals('bvh', encode('yes'));
    }

    public function testEncodeOmg(): void
    {
        $this->assertEquals('lnt', encode('OMG'));
    }

    public function testEncodeOmgWithSpaces(): void
    {
        $this->assertEquals('lnt', encode('O M G'));
    }

    public function testEncodeLongWord(): void
    {
        $this->assertEquals('nrmwy oldrm tob', encode('mindblowingly'));
    }

    public function testEncodeNumbers(): void
    {
        $this->assertEquals('gvhgr mt123 gvhgr mt', encode('Testing, 1 2 3, testing.'));
    }

    public function testEncodeSentence(): void
    {
        $this->assertEquals('gifgs rhurx grlm', encode('Truth is fiction.'));
    }

    public function testEncodeAllTheThings(): void
    {
        $plaintext = 'The quick brown fox jumps over the lazy dog.';
        $encoded = 'gsvjf rxpyi ldmul cqfnk hlevi gsvoz abwlt';
        $this->assertEquals($encoded, encode($plaintext));
    }
}
