<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class RailFenceCipherTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'RailFenceCipher.php';
    }

    /**
     * uuid 46dc5c50-5538-401d-93a5-41102680d068
     */
    #[TestDox('encode with two rails')]
    public function testEncodeWithTwoRails(): void
    {
        $plainText = "XOXOXOXOXOXOXOXOXO";
        $rails = 2;
        $expected = "XXXXXXXXXOOOOOOOOO";
        $this->assertEquals($expected, encode($plainText, $rails));
    }

    /**
     * uuid 25691697-fbd8-4278-8c38-b84068b7bc29
     */
    #[TestDox('encode with three rails')]
    public function testEncodeWithThreeRails(): void
    {
        $plainText = "WEAREDISCOVEREDFLEEATONCE";
        $rails = 3;
        $expected = "WECRLTEERDSOEEFEAOCAIVDEN";
        $this->assertEquals($expected, encode($plainText, $rails));
    }

    /**
     * uuid 384f0fea-1442-4f1a-a7c4-5cbc2044002c
     */
    #[TestDox('encode with ending in the middle')]
    public function testEncodeWithEndingInTheMiddle(): void
    {
        $plainText = "EXERCISES";
        $rails = 4;
        $expected = "ESXIEECSR";
        $this->assertEquals($expected, encode($plainText, $rails));
    }

    /**
     * uuid cd525b17-ec34-45ef-8f0e-4f27c24a7127
     */
    #[TestDox('decode with three rails')]
    public function testDecodeWithThreeRails(): void
    {
        $encryptedText = "TEITELHDVLSNHDTISEIIEA";
        $rails = 3;
        $expected = "THEDEVILISINTHEDETAILS";
        $this->assertEquals($expected, decode($encryptedText, $rails));
    }

    /**
     * uuid dd7b4a98-1a52-4e5c-9499-cbb117833507
     */
    #[TestDox('decode with five rails')]
    public function testDecodeWithFiveRails(): void
    {
        $encryptedText = "EIEXMSMESAORIWSCE";
        $rails = 5;
        $expected = "EXERCISMISAWESOME";
        $this->assertEquals($expected, decode($encryptedText, $rails));
    }

    /**
     * uuid 93e1ecf4-fac9-45d9-9cd2-591f47d3b8d3
     */
    #[TestDox('decode with six rails')]
    public function testDecodeWithSixRails(): void
    {
        $encryptedText = "133714114238148966225439541018335470986172518171757571896261";
        $rails = 6;
        $expected = "112358132134558914423337761098715972584418167651094617711286";
        $this->assertEquals($expected, decode($encryptedText, $rails));
    }
}
