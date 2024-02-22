<?php

declare(strict_types=1);

class RotationalCipherTest extends PHPUnit\Framework\TestCase
{
    private RotationalCipher $rotationalCipher;

    public static function setUpBeforeClass(): void
    {
        require_once 'RotationalCipher.php';
    }

    protected function setUp(): void
    {
        $this->rotationalCipher = new RotationalCipher();
    }

    /**
     * uuid: 74e58a38-e484-43f1-9466-877a7515e10f
     */
    public function testRotateAByZero(): void
    {
        $expected = 'a';
        $actual = $this->rotationalCipher->rotate('a', 0);
        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 7ee352c6-e6b0-4930-b903-d09943ecb8f5
     */
    public function testRotateAByOne(): void
    {
        $expected = 'b';
        $actual = $this->rotationalCipher->rotate('a', 1);
        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: edf0a733-4231-4594-a5ee-46a4009ad764
     */
    public function testRotateABy26(): void
    {
        $expected = 'a';
        $actual = $this->rotationalCipher->rotate('a', 26);
        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: e3e82cb9-2a5b-403f-9931-e43213879300
     */
    public function testRotateMBy13(): void
    {
        $expected = 'z';
        $actual = $this->rotationalCipher->rotate('m', 13);
        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 19f9eb78-e2ad-4da4-8fe3-9291d47c1709
     */
    public function testRotateNBy13WithWrapAroundAlphabet(): void
    {
        $expected = 'a';
        $actual = $this->rotationalCipher->rotate('n', 13);
        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: a116aef4-225b-4da9-884f-e8023ca6408a
     */
    public function testRotateCapitalLetters(): void
    {
        $expected = 'TRL';
        $actual = $this->rotationalCipher->rotate('OMG', 5);
        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 71b541bb-819c-4dc6-a9c3-132ef9bb737b
     */
    public function testRotateSpaces(): void
    {
        $expected = 'T R L';
        $actual = $this->rotationalCipher->rotate('O M G', 5);
        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: ef32601d-e9ef-4b29-b2b5-8971392282e6
     */
    public function testRotateNumbers(): void
    {
        $expected = 'Xiwxmrk 1 2 3 xiwxmrk';
        $actual = $this->rotationalCipher->rotate('Testing 1 2 3 testing', 4);
        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 32dd74f6-db2b-41a6-b02c-82eb4f93e549
     */
    public function testRotatePunctuation(): void
    {
        $expected = "Gzo'n zvo, Bmviyhv!";
        $actual = $this->rotationalCipher->rotate("Let's eat, Grandma!", 21);
        $this->assertEquals($expected, $actual);
    }

    /**
     * uuid: 9fb93fe6-42b0-46e6-9ec1-0bf0a062d8c9
     */
    public function testRotateAllLetters(): void
    {
        $expected = 'Gur dhvpx oebja sbk whzcf bire gur ynml qbt.';
        $actual = $this->rotationalCipher->rotate('The quick brown fox jumps over the lazy dog.', 13);
        $this->assertEquals($expected, $actual);
    }
}
