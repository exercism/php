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
        $this->markTestSkipped();

        $this->assertEquals("oalakay", translate("koala"));
    }

    public function testWordBeginningWithY()
    {
        $this->markTestSkipped();

        $this->assertEquals("ellowyay", translate("yellow"));
    }

    public function testWordBeginningWithX()
    {
        $this->markTestSkipped();

        $this->assertEquals("enonxay", translate("xenon"));
    }

    public function testWordBeginningWithA()
    {
        $this->markTestSkipped();

        $this->assertEquals("appleay", translate("apple"));
    }

    public function testWordBeginningWithE()
    {
        $this->markTestSkipped();

        $this->assertEquals("earay", translate("ear"));
    }

    public function testWordBeginningWithI()
    {
        $this->markTestSkipped();

        $this->assertEquals("iglooay", translate("igloo"));
    }

    public function testWordBeginningWithO()
    {
        $this->markTestSkipped();

        $this->assertEquals("objectay", translate("object"));
    }

    public function testWordBeginningWithU()
    {
        $this->markTestSkipped();

        $this->assertEquals("underay", translate("under"));
    }

    public function testWordBeginningVowelFollowedByQu()
    {
        $this->markTestSkipped();

        $this->assertEquals("equalay", translate("equal"));
    }


    public function testWordBeginningWithQWithoutAFollowingU()
    {
        $this->markTestSkipped();

        $this->assertEquals("atqay", translate("qat"));
    }


    public function testWordBeginningWithCh()
    {
        $this->markTestSkipped();

        $this->assertEquals("airchay", translate("chair"));
    }

    public function testWordBeginningWithQu()
    {
        $this->markTestSkipped();

        $this->assertEquals("eenquay", translate("queen"));
    }

    public function testWordBeginningWithQuAndAPrecedingConsonant()
    {
        $this->markTestSkipped();

        $this->assertEquals("aresquay", translate("square"));
    }

    public function testWordBeginningWithTh()
    {
        $this->markTestSkipped();

        $this->assertEquals("erapythay", translate("therapy"));
    }

    public function testWordBeginningWithThr()
    {
        $this->markTestSkipped();

        $this->assertEquals("ushthray", translate("thrush"));
    }

    public function testWordBeginningWithSch()
    {
        $this->markTestSkipped();

        $this->assertEquals("oolschay", translate("school"));
    }

    public function testWordBeginningWithYt()
    {
        $this->markTestSkipped();

        $this->assertEquals("yttriaay", translate("yttria"));
    }

    public function testWordBeginningWithXr()
    {
        $this->markTestSkipped();

        $this->assertEquals("xrayay", translate("xray"));
    }

    public function testAWholePhrase()
    {
        $this->markTestSkipped();

        $this->assertEquals("ickquay astfay unray", translate("quick fast run"));
    }
}
