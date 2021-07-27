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

class SimpleCipherTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'SimpleCipher.php';
    }

    public function testRandomCipherKeyIsLetters(): void
    {
        $cipher = new SimpleCipher();
        $this->assertMatchesRegularExpression('/\A[a-z]+\z/', $cipher->key);
    }

    /**
     * Here we take advantage of the fact that plaintext of "aaa..." doesn't
     * output the key. This is a critical problem with shift ciphers, some
     * characters will always output the key verbatim.
     */
    public function testRandomKeyCipherEncode(): void
    {
        $cipher = new SimpleCipher();
        $plaintext = 'aaaaaaaaaa';
        $this->assertEquals(substr($cipher->key, 0, 10), $cipher->encode($plaintext));
    }

    public function testRandomKeyCipherDecode(): void
    {
        $cipher = new SimpleCipher();
        $plaintext = 'aaaaaaaaaa';
        $this->assertEquals($plaintext, $cipher->decode(substr($cipher->key, 0, 10)));
    }

    public function testRandomKeyCipherReversible(): void
    {
        $cipher = new SimpleCipher();
        $plaintext = 'abcdefghij';
        $this->assertEquals($plaintext, $cipher->decode($cipher->encode($plaintext)));
    }

    public function testCipherWithCapsKey(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $cipher = new SimpleCipher('ABCDEF');
    }

    public function testCipherWithNumericKey(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $cipher = new SimpleCipher('12345');
    }

    public function testCipherWithEmptyKey(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $cipher = new SimpleCipher('');
    }

    public function testCipherKeyIsAsSubmitted(): void
    {
        $cipher = new SimpleCipher('abcdefghij');
        $this->assertEquals($cipher->key, 'abcdefghij');
    }

    public function testCipherEncode(): void
    {
        $cipher = new SimpleCipher('abcdefghij');
        $plaintext = 'aaaaaaaaaa';
        $ciphertext = 'abcdefghij';
        $this->assertEquals($ciphertext, $cipher->encode($plaintext));
    }

    public function testCipherDecode(): void
    {
        $cipher = new SimpleCipher('abcdefghij');
        $plaintext = 'aaaaaaaaaa';
        $ciphertext = 'abcdefghij';
        $this->assertEquals($plaintext, $cipher->decode($ciphertext));
    }

    public function testCipherReversible(): void
    {
        $cipher = new SimpleCipher('abcdefghij');
        $plaintext = 'abcdefghij';
        $this->assertEquals($plaintext, $cipher->decode($cipher->encode($plaintext)));
    }

    public function testDoubleShiftEncode(): void
    {
        $cipher = new SimpleCipher('iamapandabear');
        $plaintext = 'iamapandabear';
        $ciphertext = 'qayaeaagaciai';
        $this->assertEquals($ciphertext, $cipher->encode($plaintext));
    }

    public function testCipherEncodeWrap(): void
    {
        $cipher = new SimpleCipher('abcdefghij');
        $plaintext = 'zzzzzzzzzz';
        $ciphertext = 'zabcdefghi';
        $this->assertEquals($ciphertext, $cipher->encode($plaintext));
    }

    public function testShiftCipherEncode(): void
    {
        $cipher = new SimpleCipher('dddddddddd');
        $plaintext = 'aaaaaaaaaa';
        $ciphertext = 'dddddddddd';
        $this->assertEquals($ciphertext, $cipher->encode($plaintext));
    }

    public function testShiftCipherDecode(): void
    {
        $cipher = new SimpleCipher('dddddddddd');
        $plaintext = 'aaaaaaaaaa';
        $ciphertext = 'dddddddddd';
        $this->assertEquals($plaintext, $cipher->decode($ciphertext));
    }

    public function testShiftCipherReversible(): void
    {
        $cipher = new SimpleCipher('dddddddddd');
        $plaintext = 'abcdefghij';
        $this->assertEquals($plaintext, $cipher->decode($cipher->encode($plaintext)));
    }
}
