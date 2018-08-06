<?php
require_once "pig-latin.php";

class PigLatinTest extends PHPUnit\Framework\TestCase
{
    public function testWordBeginningWithP()
    {
        $this->assertEquals("igpay", translate("pig"));
    }

    public function testWordBeginningWithK()
    {
        $this->assertEquals("oalakay", translate("koala"));
    }

    public function testWordBeginningWithY()
    {
        $this->assertEquals("ellowyay", translate("yellow"));
    }

    public function testWordBeginningWithX()
    {
        $this->assertEquals("enonxay", translate("xenon"));
    }

    public function testWordBeginningWithA()
    {
        $this->assertEquals("appleay", translate("apple"));
    }

    public function testWordBeginningWithE()
    {
        $this->assertEquals("earay", translate("ear"));
    }

    public function testWordBeginningWithI()
    {
        $this->assertEquals("iglooay", translate("igloo"));
    }

    public function testWordBeginningWithO()
    {
        $this->assertEquals("objectay", translate("object"));
    }

    public function testWordBeginningWithU()
    {
        $this->assertEquals("underay", translate("under"));
    }

    public function testWordBeginningVowelFollowedByQu()
    {
        $this->assertEquals("equalay", translate("equal"));
    }


    public function testWordBeginningWithQWithoutAFollowingU()
    {
        $this->assertEquals("atqay", translate("qat"));
    }


    public function testWordBeginningWithCh()
    {
        $this->assertEquals("airchay", translate("chair"));
    }

    public function testWordBeginningWithQu()
    {
        $this->assertEquals("eenquay", translate("queen"));
    }

    public function testWordBeginningWithQuAndAPrecedingConsonant()
    {
        $this->assertEquals("aresquay", translate("square"));
    }

    public function testWordBeginningWithTh()
    {
        $this->assertEquals("erapythay", translate("therapy"));
    }

    public function testWordBeginningWithThr()
    {
        $this->assertEquals("ushthray", translate("thrush"));
    }

    public function testWordBeginningWithSch()
    {
        $this->assertEquals("oolschay", translate("school"));
    }

    public function testWordBeginningWithYt()
    {
        $this->assertEquals("yttriaay", translate("yttria"));
    }

    public function testWordBeginningWithXr()
    {
        $this->assertEquals("xrayay", translate("xray"));
    }

    public function testAWholePhrase()
    {
        $this->assertEquals("ickquay astfay unray", translate("quick fast run"));
    }
}
