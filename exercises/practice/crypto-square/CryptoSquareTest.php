<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

class CryptoSquareTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'CryptoSquare.php';
    }

    /**
     * uuid 407c3837-9aa7-4111-ab63-ec54b58e8e9f
     */
    #[TestDox('empty plaintext results in an empty ciphertext')]
    public function testEmptyPlaintextResultsInAnEmptyCiphertext(): void
    {
        $this->assertEquals("", crypto_square(""));
    }

    /**
     * uuid aad04a25-b8bb-4304-888b-581bea8e0040
     */
    #[TestDox('normalization results in empty plaintext')]
    public function testNormalizationResultsInEmptyPlaintext(): void
    {
        $this->assertEquals("", crypto_square("... --- ..."));
    }

    /**
     * uuid 64131d65-6fd9-4f58-bdd8-4a2370fb481d
     */
    #[TestDox('Lowercase')]
    public function testLowercase(): void
    {
        $this->assertEquals("a", crypto_square("A"));
    }

    /**
     * uuid 63a4b0ed-1e3c-41ea-a999-f6f26ba447d6
     */
    #[TestDox('Remove spaces')]
    public function testRemoveSpaces(): void
    {
        $this->assertEquals("b", crypto_square("  b "));
    }

    /**
     * uuid 1b5348a1-7893-44c1-8197-42d48d18756c
     */
    #[TestDox('Remove punctuation')]
    public function testRemovePunctuation(): void
    {
        $this->assertEquals("1", crypto_square("@1,%!"));
    }

    /**
     * uuid 8574a1d3-4a08-4cec-a7c7-de93a164f41a
     */
    #[TestDox('9 character plaintext results in 3 chunks of 3 characters')]
    public function test9CharacterPlaintextResultsIn3ChunksOf3Characters(): void
    {
        $this->assertEquals("tsf hiu isn", crypto_square("This is fun!"));
    }

    /**
     * uuid a65d3fa1-9e09-43f9-bcec-7a672aec3eae
     */
    #[TestDox('8 character plaintext results in 3 chunks, the last one with a trailing space')]
    public function test8CharacterPlaintextResultsIn3ChunksTheLastOneWithATrailingSpace(): void
    {
        $this->assertEquals("clu hlt io ", crypto_square("Chill out."));
    }

    /**
     * uuid 33fd914e-fa44-445b-8f38-ff8fbc9fe6e6
     */
    #[TestDox('54 character plaintext results in 8 chunks, the last two with trailing spaces')]
    public function test54CharacterPlaintextResultsIn7ChunksTheLastTwoWithTrailingSpaces(): void
    {
        $this->assertEquals(
            "imtgdvs fearwer mayoogo anouuio ntnnlvt wttddes aohghn  sseoau ",
            crypto_square("If man was meant to stay on the ground, god would have given us roots.")
        );
    }
}
