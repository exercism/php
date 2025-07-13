<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestDox;

/**
 * The test are divided into two groups:
 *
 * * Encoding from English to affine cipher,
 * * Decoding from affine cipher to all-lowercase-mashed-together English
 */
class AffineCipherTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'AffineCipher.php';
    }

    /**
     * Encoding from English to affine cipher
     */
    /**
     * uuid 2ee1d9af-1c43-416c-b41b-cefd7d4d2b2a
     */
    #[TestDox('encode yes')]
    public function testEncodeYes(): void
    {
        $this->assertEquals('xbt', encode('yes', 5, 7));
    }

    /**
     * uuid 785bade9-e98b-4d4f-a5b0-087ba3d7de4b
     */
    #[TestDox('encode no')]
    public function testEncodeNo(): void
    {
        $this->assertEquals('fu', encode('no', 15, 18));
    }

    /**
     * uuid 2854851c-48fb-40d8-9bf6-8f192ed25054
     */
    #[TestDox('encode OMG')]
    public function testEncodeOMG(): void
    {
        $this->assertEquals('lvz', encode('OMG', 21, 3));
    }

    /**
     * uuid bc0c1244-b544-49dd-9777-13a770be1bad
     */
    #[TestDox('encode O M G')]
    public function testEncodeOMGWithSpaces(): void
    {
        $this->assertEquals('hjp', encode('O M G', 25, 47));
    }

    /**
     * uuid 381a1a20-b74a-46ce-9277-3778625c9e27
     */
    #[TestDox('encode mindblowingly')]
    public function testEncodemindblowingly(): void
    {
        $this->assertEquals('rzcwa gnxzc dgt', encode('mindblowingly', 11, 15));
    }

    /**
     * uuid 6686f4e2-753b-47d4-9715-876fdc59029d
     */
    #[TestDox('encode numbers')]
    public function testEncodenumbers(): void
    {
        $this->assertEquals(
            'jqgjc rw123 jqgjc rw',
            encode('Testing,1 2 3, testing.', 3, 4)
        );
    }

    /**
     * uuid ae23d5bd-30a8-44b6-afbe-23c8c0c7faa3
     */
    #[TestDox('encode deep thought')]
    public function testEncodeDeepThought(): void
    {
        $this->assertEquals('iynia fdqfb ifje', encode('Truth is fiction.', 5, 17));
    }

    /**
     * uuid c93a8a4d-426c-42ef-9610-76ded6f7ef57
     */
    #[TestDox('encode all the letters')]
    public function testEncodeAllTheLetters(): void
    {
        $this->assertEquals(
            'swxtj npvyk lruol iejdc blaxk swxmh qzglf',
            encode('The quick brown fox jumps over the lazy dog.', 17, 33)
        );
    }

    /**
     * uuid 0673638a-4375-40bd-871c-fb6a2c28effb
     */
    #[TestDox('encode with a not coprime to m')]
    public function testEncodeWithANotCoprimeToM(): void
    {
        $this->expectException(Exception::class);
        encode('This is a test', 6, 17);
    }

    /**
     * Decoding from affine cipher to all-lowercase-mashed-together English
     */
    /**
     * uuid 3f0ac7e2-ec0e-4a79-949e-95e414953438
     */
    #[TestDox('decode exercism')]
    public function testDecodeExercism(): void
    {
        $this->assertEquals('exercism', decode('tytgn fjr', 3, 7));
    }

    /**
     * uuid 241ee64d-5a47-4092-a5d7-7939d259e077
     */
    #[TestDox('decode a sentence')]
    public function testDecodeASentence(): void
    {
        $this->assertEquals(
            "anobstacleisoftenasteppingstone",
            decode("qdwju nqcro muwhn odqun oppmd aunwd o", 19, 16)
        );
    }

    /**
     * uuid 33fb16a1-765a-496f-907f-12e644837f5e
     */
    #[TestDox('decode numbers')]
    public function testDecodeNumbers(): void
    {
        $this->assertEquals(
            "testing123testing",
            decode("odpoz ub123 odpoz ub", 25, 7)
        );
    }

    /**
     * uuid 20bc9dce-c5ec-4db6-a3f1-845c776bcbf7
     */
    #[TestDox('decode all the letters')]
    public function testDecodeAllTheLetters(): void
    {
        $this->assertEquals(
            "thequickbrownfoxjumpsoverthelazydog",
            decode("swxtj npvyk lruol iejdc blaxk swxmh qzglf", 17, 33)
        );
    }

    /**
     * uuid 623e78c0-922d-49c5-8702-227a3e8eaf81
     */
    #[TestDox('decode with no spaces in input')]
    public function testDecodeWithNoSpacesInInput(): void
    {
        $this->assertEquals(
            "thequickbrownfoxjumpsoverthelazydog",
            decode("swxtjnpvyklruoliejdcblaxkswxmhqzglf", 17, 33)
        );
    }

    /**
     * uuid 58fd5c2a-1fd9-4563-a80a-71cff200f26f
     */
    #[TestDox('decode with too many spaces')]
    public function testDecodeWithTooManySpaces(): void
    {
        $this->assertEquals(
            "jollygreengiant",
            decode("vszzm    cly   yd cg    qdp", 15, 16)
        );
    }

    /**
     * uuid b004626f-c186-4af9-a3f4-58f74cdb86d5
     */
    #[TestDox('decode with a not coprime to m')]
    public function testDecodeWithANotCoprimeToM(): void
    {
        $this->expectException(Exception::class);
        decode("Test", 13, 5);
    }
}
