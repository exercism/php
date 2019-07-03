<?php

require_once 'affine-cipher.php';

/**
 * The test are divided into two groups:
 *
 * * Encoding from English to affine cipher,
 * * Decoding from affine cipher to all-lowercase-mashed-together English
 */
class AffineCipherTest extends PHPUnit\Framework\TestCase
{
    /**
     * Tests for encoding English to ciphertext with keys.
     */

    public function testEncodeYes()
    {
        $this->assertEquals('xbt', encode('yes', 5, 7));
    }

    public function testEncodeNo()
    {
        $this->assertEquals('fu', encode('no', 15, 18));
    }

    public function testEncodeOMG()
    {
        $this->assertEquals('lvz', encode('OMG', 21, 3));
    }

    public function testEncodeOMGWithSpaces()
    {
        $this->assertEquals('hjp', encode('O M G', 25, 47));
    }

    public function testEncodemindblowingly()
    {
        $this->assertEquals('rzcwa gnxzc dgt', encode('mindblowingly', 11, 15));
    }

    public function testEncodenumbers()
    {
        $this->assertEquals(
            'jqgjc rw123 jqgjc rw',
            encode('Testing,1 2 3, testing.', 3, 4)
        );
    }

    public function testEncodeDeepThought()
    {
        $this->assertEquals('iynia fdqfb ifje', encode('Truth is fiction.', 5, 17));
    }

    public function testEncodeAllTheLetters()
    {
        $this->assertEquals(
            'swxtj npvyk lruol iejdc blaxk swxmh qzglf',
            encode('The quick brown fox jumps over the lazy dog.', 17, 33)
        );
    }

    public function testEncodeWithANotCoprimeToM()
    {
        $this->expectException(Exception::class);
        encode('This is a test', 6, 17);
    }

    /**
     * Test decoding from ciphertext to English with keys
     */

    public function testDecodeExercism()
    {
        $this->assertEquals('exercism', decode('tytgn fjr', 3, 7));
    }

    public function testDecodeASentence()
    {
        $this->assertEquals(
            decode('qdwju nqcro muwhn odqun oppmd aunwd o', 19, 16),
          'anobstacleisoftenasteppingstone'
        );
    }

    public function testDecodeNumbers()
    {
        $this->assertEquals(
            decode('odpoz ub123 odpoz ub', 25, 7),
          'testing123testing'
        );
    }

    public function testDecodeAllTheLetters()
    {
        $this->assertEquals(
            decode('swxtj npvyk lruol iejdc blaxk swxmh qzglf', 17, 33),
          'thequickbrownfoxjumpsoverthelazydog'
        );
    }

    public function testDecodeWithNoSpacesInInput()
    {
        $this->assertEquals(
            decode('swxtjnpvyklruoliejdcblaxkswxmhqzglf', 17, 33),
          'thequickbrownfoxjumpsoverthelazydog'
        );
    }

    public function testDecodeWithTooManySpaces()
    {
        $this->assertEquals(
            decode('vszzm    cly   yd cg    qdp', 15, 16),
          'jollygreengiant'
        );
    }

    public function testDecodeWithANotCoprimeToM()
    {
        $this->expectException(Exception::class);
        decode('Test', 13, 5);
    }
}
