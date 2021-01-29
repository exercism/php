<?php

class RailFenceCipherTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'rail-fence-cipher.php';
    }

    /**
     * Test encode with two rails.
     */
    public function testEncodeWithTwoRails() : void
    {
        $plainText  = "XOXOXOXOXOXOXOXOXO";
        $rails = 2;
        $expected = "XXXXXXXXXOOOOOOOOO";
        $this->assertEquals(encode($plainText, $rails), $expected);
    }
    /**
     * Test encode with three rails.
     */
    public function testEncodeWithThreeRails() : void
    {
        $plainText  = "WEAREDISCOVEREDFLEEATONCE";
        $rails = 3;
        $expected = "WECRLTEERDSOEEFEAOCAIVDEN";
        $this->assertEquals(encode($plainText, $rails), $expected);
    }

    /**
     * Test encode with ending in the middle.
     */
    public function testEncodeWithEndingInTheMiddle() : void
    {
        $plainText  = "EXERCISES";
        $rails = 4;
        $expected = "ESXIEECSR";
        $this->assertEquals(encode($plainText, $rails), $expected);
    }

    /**
     * Test decode with three rails.
     */
    public function testDecodeWithThreeRails() : void
    {
        $encryptedText  = "TEITELHDVLSNHDTISEIIEA";
        $rails = 3;
        $expected = "THEDEVILISINTHEDETAILS";
        $this->assertEquals(decode($encryptedText, $rails), $expected);
    }
    /**
     * Test decode with five rails.
     */
    public function testDecodeWithFiveRails() : void
    {
        $encryptedText  = "EIEXMSMESAORIWSCE";
        $rails = 5;
        $expected = "EXERCISMISAWESOME";
        $this->assertEquals(decode($encryptedText, $rails), $expected);
    }

    /**
     * Test decode with six rails.
     */
    public function testDecodeWithSixRails() : void
    {
        $encryptedText  = "133714114238148966225439541018335470986172518171757571896261";
        $rails = 6;
        $expected = "112358132134558914423337761098715972584418167651094617711286";
        $this->assertEquals(decode($encryptedText, $rails), $expected);
    }
}
