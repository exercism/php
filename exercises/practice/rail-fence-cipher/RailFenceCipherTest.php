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

class RailFenceCipherTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'RailFenceCipher.php';
    }

    /**
     * Test encode with two rails.
     */
    public function testEncodeWithTwoRails(): void
    {
        $plainText = "XOXOXOXOXOXOXOXOXO";
        $rails = 2;
        $expected = "XXXXXXXXXOOOOOOOOO";
        $this->assertEquals($expected, encode($plainText, $rails));
    }
    /**
     * Test encode with three rails.
     */
    public function testEncodeWithThreeRails(): void
    {
        $plainText = "WEAREDISCOVEREDFLEEATONCE";
        $rails = 3;
        $expected = "WECRLTEERDSOEEFEAOCAIVDEN";
        $this->assertEquals($expected, encode($plainText, $rails));
    }

    /**
     * Test encode with ending in the middle.
     */
    public function testEncodeWithEndingInTheMiddle(): void
    {
        $plainText = "EXERCISES";
        $rails = 4;
        $expected = "ESXIEECSR";
        $this->assertEquals($expected, encode($plainText, $rails));
    }

    /**
     * Test decode with three rails.
     */
    public function testDecodeWithThreeRails(): void
    {
        $encryptedText = "TEITELHDVLSNHDTISEIIEA";
        $rails = 3;
        $expected = "THEDEVILISINTHEDETAILS";
        $this->assertEquals($expected, decode($encryptedText, $rails));
    }
    /**
     * Test decode with five rails.
     */
    public function testDecodeWithFiveRails(): void
    {
        $encryptedText = "EIEXMSMESAORIWSCE";
        $rails = 5;
        $expected = "EXERCISMISAWESOME";
        $this->assertEquals($expected, decode($encryptedText, $rails));
    }

    /**
     * Test decode with six rails.
     */
    public function testDecodeWithSixRails(): void
    {
        $encryptedText = "133714114238148966225439541018335470986172518171757571896261";
        $rails = 6;
        $expected = "112358132134558914423337761098715972584418167651094617711286";
        $this->assertEquals($expected, decode($encryptedText, $rails));
    }
}
