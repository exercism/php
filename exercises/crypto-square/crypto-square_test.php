<?php

require_once "crypto-square.php";

class CryptoSquareTest extends PHPUnit\Framework\TestCase
{
    public function testEmptyPlaintextResultsInAnEmptyCiphertext()
    {
        $this->assertEquals(crypto_square(""), "");
    }

    public function testLowercase()
    {
        $this->assertEquals(crypto_square("A"), "a");
    }

    public function testRemoveSpaces()
    {
        $this->assertEquals(crypto_square("  b "), "b");
    }

    public function testRemovePunctuation()
    {
        $this->assertEquals(crypto_square("@1,%!"), "1");
    }

    public function test9CharacterPlaintextResultsIn3ChunksOf3Characters()
    {
        $this->assertEquals(crypto_square("This is fun!"), "tsf hiu isn");
    }

    public function test8CharacterPlaintextResultsIn3ChunksTheLastOneWithATrailingSpace()
    {
        $this->assertEquals(crypto_square("Chill out."), "clu hlt io ");
    }

    public function test54CharacterPlaintextResultsIn7ChunksTheLastTwoWithTrailingSpaces()
    {
        $this->assertEquals(
            crypto_square("If man was meant to stay on the ground, god would have given us roots."),
            "imtgdvs fearwer mayoogo anouuio ntnnlvt wttddes aohghn  sseoau "
        );
    }
}
