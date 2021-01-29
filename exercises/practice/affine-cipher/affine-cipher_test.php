<?php

/**
 * The test are divided into two groups:
 *
 * * Encoding from English to affine cipher,
 * * Decoding from affine cipher to all-lowercase-mashed-together English
 */
class AffineCipherTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'affine-cipher.php';
    }

    /**
     * Tests for encoding English to ciphertext with keys.
     */

    public function testEncodeYes() : void
    {
        $this->assertEquals('xbt', encode('yes', 5, 7));
    }

    public function testEncodeNo() : void
    {
        $this->assertEquals('fu', encode('no', 15, 18));
    }

    public function testEncodeOMG() : void
    {
        $this->assertEquals('lvz', encode('OMG', 21, 3));
    }

    public function testEncodeOMGWithSpaces() : void
    {
        $this->assertEquals('hjp', encode('O M G', 25, 47));
    }

    public function testEncodemindblowingly() : void
    {
        $this->assertEquals('rzcwa gnxzc dgt', encode('mindblowingly', 11, 15));
    }

    public function testEncodenumbers() : void
    {
        $this->assertEquals(
            'jqgjc rw123 jqgjc rw',
            encode('Testing,1 2 3, testing.', 3, 4)
        );
    }

    public function testEncodeDeepThought() : void
    {
        $this->assertEquals('iynia fdqfb ifje', encode('Truth is fiction.', 5, 17));
    }

    public function testEncodeAllTheLetters() : void
    {
        $this->assertEquals(
            'swxtj npvyk lruol iejdc blaxk swxmh qzglf',
            encode('The quick brown fox jumps over the lazy dog.', 17, 33)
        );
    }

    public function testEncodeWithANotCoprimeToM() : void
    {
        $this->expectException(Exception::class);
        encode('This is a test', 6, 17);
    }

    /**
     * Test decoding from ciphertext to English with keys
     */

    public function testDecodeExercism() : void
    {
        $this->assertEquals('exercism', decode('tytgn fjr', 3, 7));
    }

    public function testDecodeASentence() : void
    {
        $this->assertEquals(
            decode("qdwju nqcro muwhn odqun oppmd aunwd o", 19, 16),
            "anobstacleisoftenasteppingstone"
        );
    }

    public function testDecodeNumbers() : void
    {
        $this->assertEquals(
            decode("odpoz ub123 odpoz ub", 25, 7),
            "testing123testing"
        );
    }

    public function testDecodeAllTheLetters() : void
    {
        $this->assertEquals(
            decode("swxtj npvyk lruol iejdc blaxk swxmh qzglf", 17, 33),
            "thequickbrownfoxjumpsoverthelazydog"
        );
    }

    public function testDecodeWithNoSpacesInInput() : void
    {
        $this->assertEquals(
            decode("swxtjnpvyklruoliejdcblaxkswxmhqzglf", 17, 33),
            "thequickbrownfoxjumpsoverthelazydog"
        );
    }

    public function testDecodeWithTooManySpaces() : void
    {
        $this->assertEquals(
            decode("vszzm    cly   yd cg    qdp", 15, 16),
            "jollygreengiant"
        );
    }

    public function testDecodeWithANotCoprimeToM() : void
    {
        $this->expectException(Exception::class);
        decode("Test", 13, 5);
    }
}
