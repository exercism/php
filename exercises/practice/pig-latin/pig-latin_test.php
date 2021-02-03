<?php

class PigLatinTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'pig-latin.php';
    }

    public function testWordBeginningWithP() : void
    {
        $this->assertEquals("igpay", translate("pig"));
    }

    public function testWordBeginningWithK() : void
    {
        $this->assertEquals("oalakay", translate("koala"));
    }

    public function testWordBeginningWithY() : void
    {
        $this->assertEquals("ellowyay", translate("yellow"));
    }

    public function testWordBeginningWithX() : void
    {
        $this->assertEquals("enonxay", translate("xenon"));
    }

    public function testWordBeginningWithA() : void
    {
        $this->assertEquals("appleay", translate("apple"));
    }

    public function testWordBeginningWithE() : void
    {
        $this->assertEquals("earay", translate("ear"));
    }

    public function testWordBeginningWithI() : void
    {
        $this->assertEquals("iglooay", translate("igloo"));
    }

    public function testWordBeginningWithO() : void
    {
        $this->assertEquals("objectay", translate("object"));
    }

    public function testWordBeginningWithU() : void
    {
        $this->assertEquals("underay", translate("under"));
    }

    public function testWordBeginningVowelFollowedByQu() : void
    {
        $this->assertEquals("equalay", translate("equal"));
    }

    public function testWordBeginningWithQWithoutAFollowingU() : void
    {
        $this->assertEquals("atqay", translate("qat"));
    }

    public function testWordBeginningWithCh() : void
    {
        $this->assertEquals("airchay", translate("chair"));
    }

    public function testWordBeginningWithQu() : void
    {
        $this->assertEquals("eenquay", translate("queen"));
    }

    public function testWordBeginningWithQuAndAPrecedingConsonant() : void
    {
        $this->assertEquals("aresquay", translate("square"));
    }

    public function testWordBeginningWithTh() : void
    {
        $this->assertEquals("erapythay", translate("therapy"));
    }

    public function testWordBeginningWithThr() : void
    {
        $this->assertEquals("ushthray", translate("thrush"));
    }

    public function testWordBeginningWithSch() : void
    {
        $this->assertEquals("oolschay", translate("school"));
    }

    public function testWordBeginningWithYt() : void
    {
        $this->assertEquals("yttriaay", translate("yttria"));
    }

    public function testWordBeginningWithXr() : void
    {
        $this->assertEquals("xrayay", translate("xray"));
    }

    public function testAWholePhrase() : void
    {
        $this->assertEquals("ickquay astfay unray", translate("quick fast run"));
    }
}
