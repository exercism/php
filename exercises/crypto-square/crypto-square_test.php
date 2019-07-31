<?php

class CryptoSquareTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'crypto-square.php';
    }

    public function testEmptyPlaintextResultsInAnEmptyCiphertext() : void
    {
        $this->assertEquals("", crypto_square(""));
    }

    public function testLowercase() : void
    {
        $this->assertEquals("a", crypto_square("A"));
    }

    public function testRemoveSpaces() : void
    {
        $this->assertEquals("b", crypto_square("  b "));
    }

    public function testRemovePunctuation() : void
    {
        $this->assertEquals("1", crypto_square("@1,%!"));
    }

    public function test9CharacterPlaintextResultsIn3ChunksOf3Characters() : void
    {
        $this->assertEquals("tsf hiu isn", crypto_square("This is fun!"));
    }

    public function test8CharacterPlaintextResultsIn3ChunksTheLastOneWithATrailingSpace() : void
    {
        $this->assertEquals("clu hlt io ", crypto_square("Chill out."));
    }

    public function test54CharacterPlaintextResultsIn7ChunksTheLastTwoWithTrailingSpaces() : void
    {
        $this->assertEquals(
            "imtgdvs fearwer mayoogo anouuio ntnnlvt wttddes aohghn  sseoau ",
            crypto_square("If man was meant to stay on the ground, god would have given us roots.")
        );
    }
}
