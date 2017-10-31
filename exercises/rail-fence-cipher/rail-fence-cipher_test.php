<?php
require_once "rail-fence-cipher.php";

class RailFenceCipherTest extends PHPUnit\Framework\TestCase
{

    /**
     * Test encode with two rails.
     */
    public function testEncodeWithTwoRails()
    {

        $plainText  = "XOXOXOXOXOXOXOXOXO";
        $rails = 2;
        $expected = "XXXXXXXXXOOOOOOOOO";
        $this->assertEquals(encode($plainText, $rails), $expected);
    }
    /**
     * Test encode with three rails.
     */
    public function testEncodeWithThreeRails()
    {
        $this->markTestSkipped();
        $plainText  = "WEAREDISCOVEREDFLEEATONCE";
        $rails = 3;
        $expected = "WECRLTEERDSOEEFEAOCAIVDEN";
        $this->assertEquals(encode($plainText, $rails), $expected);
    }

    /**
     * Test encode with ending in the middle.
     */
    public function testEncodeWithEndingInTheMiddle()
    {
        $this->markTestSkipped();
        $plainText  = "EXERCISES";
        $rails = 4;
        $expected = "ESXIEECSR";
        $this->assertEquals(encode($plainText, $rails), $expected);
    }

    /**
     * Test decode with three rails.
     */
    public function testDecodeWithThreeRails()
    {
        $this->markTestSkipped();
        $encryptedText  = "TEITELHDVLSNHDTISEIIEA";
        $rails = 3;
        $expected = "THEDEVILISINTHEDETAILS";
        $this->assertEquals(decode($encryptedText, $rails), $expected);
    }
    /**
     * Test decode with five rails.
     */
    public function testDecodeWithFiveRails()
    {
        $this->markTestSkipped();
        $encryptedText  = "EIEXMSMESAORIWSCE";
        $rails = 5;
        $expected = "EXERCISMISAWESOME";
        $this->assertEquals(decode($encryptedText, $rails), $expected);
    }

    /**
     * Test decode with six rails.
     */
    public function testDecodeWithSixRails()
    {
        $this->markTestSkipped();
        $encryptedText  = "133714114238148966225439541018335470986172518171757571896261";
        $rails = 6;
        $expected = "112358132134558914423337761098715972584418167651094617711286";
        $this->assertEquals(decode($encryptedText, $rails), $expected);
    }
}
