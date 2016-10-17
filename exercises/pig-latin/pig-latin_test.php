<?php
require_once "pig-latin.php";

class PigLatinTest extends PHPUnit_Framework_TestCase
{
    public function testWordBeginningWithP()
    {
        $translator = new PigLatin();
        $this->assertEquals("igpay", $translator->translate("pig"));
    }

    public function testWordBeginningWithK()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("oalakay", $translator->translate("koala"));
    }

    public function testWordBeginningWithY()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("ellowyay", $translator->translate("yellow"));
    }

    public function testWordBeginningWithX()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("enonxay", $translator->translate("xenon"));
    }

    public function testWordBeginningWithA()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("appleay", $translator->translate("apple"));
    }

    public function testWordBeginningWithE()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("earay", $translator->translate("ear"));
    }

    public function testWordBeginningWithI()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("iglooay", $translator->translate("igloo"));
    }

    public function testWordBeginningWithO()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("objectay", $translator->translate("object"));
    }

    public function testWordBeginningWithU()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("underay", $translator->translate("under"));
    }

    public function testWordBeginningVowelFollowedByQu()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("equalay", $translator->translate("equal"));
    }


    public function testWordBeginningWithQWithoutAFollowingU()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("atqay", $translator->translate("qat"));
    }


    public function testWordBeginningWithCh()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("airchay", $translator->translate("chair"));
    }

    public function testWordBeginningWithQu()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("eenquay", $translator->translate("queen"));
    }

    public function testWordBeginningWithQuAndAPrecedingConsonant()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("aresquay", $translator->translate("square"));
    }

    public function testWordBeginningWithTh()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("erapythay", $translator->translate("therapy"));
    }

    public function testWordBeginningWithThr()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("ushthray", $translator->translate("thrush"));
    }

    public function testWordBeginningWithSch()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("oolschay", $translator->translate("school"));
    }

    public function testWordBeginningWithYt()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("yttriaay", $translator->translate("yttria"));
    }

    public function testWordBeginningWithXr()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("xrayay", $translator->translate("xray"));
    }

    public function testAWholePhrase()
    {
        $this->markTestSkipped();
        $translator = new PigLatin();
        $this->assertEquals("ickquay astfay unray", $translator->translate("quick fast run"));
    }
}
