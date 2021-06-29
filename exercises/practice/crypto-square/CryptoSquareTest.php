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

class CryptoSquareTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'CryptoSquare.php';
    }

    public function testEmptyPlaintextResultsInAnEmptyCiphertext(): void
    {
        $this->assertEquals("", crypto_square(""));
    }

    public function testLowercase(): void
    {
        $this->assertEquals("a", crypto_square("A"));
    }

    public function testRemoveSpaces(): void
    {
        $this->assertEquals("b", crypto_square("  b "));
    }

    public function testRemovePunctuation(): void
    {
        $this->assertEquals("1", crypto_square("@1,%!"));
    }

    public function test9CharacterPlaintextResultsIn3ChunksOf3Characters(): void
    {
        $this->assertEquals("tsf hiu isn", crypto_square("This is fun!"));
    }

    public function test8CharacterPlaintextResultsIn3ChunksTheLastOneWithATrailingSpace(): void
    {
        $this->assertEquals("clu hlt io ", crypto_square("Chill out."));
    }

    public function test54CharacterPlaintextResultsIn7ChunksTheLastTwoWithTrailingSpaces(): void
    {
        $this->assertEquals(
            "imtgdvs fearwer mayoogo anouuio ntnnlvt wttddes aohghn  sseoau ",
            crypto_square("If man was meant to stay on the ground, god would have given us roots.")
        );
    }
}
