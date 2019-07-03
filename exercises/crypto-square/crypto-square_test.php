<?php

require_once 'crypto-square.php';

class CryptoSquareTest extends PHPUnit\Framework\TestCase
{
    public function testEmptyPlaintextResultsInAnEmptyCiphertext()
    {
        $this->assertEquals('', crypto_square(''));
    }

    public function testLowercase()
    {
        $this->assertEquals('a', crypto_square('A'));
    }

    public function testRemoveSpaces()
    {
        $this->assertEquals('b', crypto_square('  b '));
    }

    public function testRemovePunctuation()
    {
        $this->assertEquals('1', crypto_square('@1,%!'));
    }

    public function test9CharacterPlaintextResultsIn3ChunksOf3Characters()
    {
        $this->assertEquals('tsf hiu isn', crypto_square('This is fun!'));
    }

    public function test8CharacterPlaintextResultsIn3ChunksTheLastOneWithATrailingSpace()
    {
        $this->assertEquals('clu hlt io ', crypto_square('Chill out.'));
    }

    public function test54CharacterPlaintextResultsIn7ChunksTheLastTwoWithTrailingSpaces()
    {
        $this->assertEquals(
            'imtgdvs fearwer mayoogo anouuio ntnnlvt wttddes aohghn  sseoau ',
            crypto_square('If man was meant to stay on the ground, god would have given us roots.')
        );
    }
}
