<?php
require_once "pig-latin.php";

class PigLatinTest extends PHPUnit_Framework_TestCase
{
    protected $translator = null;

    public function setUp()
    {
        $this->translator = new PigLatin();
    }

    public function testWordBeginningWithP()
    {
        $this->assertEquals("igpay", $this->translator->translate("pig"));
    }

    public function testWordBeginningWithK()
    {
        $this->markTestSkipped();

        $this->assertEquals("oalakay", $this->translator->translate("koala"));
    }

    public function testWordBeginningWithY()
    {
        $this->markTestSkipped();

        $this->assertEquals("ellowyay", $this->translator->translate("yellow"));
    }

    public function testWordBeginningWithX()
    {
        $this->markTestSkipped();

        $this->assertEquals("enonxay", $this->translator->translate("xenon"));
    }

    public function testWordBeginningWithA()
    {
        $this->markTestSkipped();

        $this->assertEquals("appleay", $this->translator->translate("apple"));
    }

    public function testWordBeginningWithE()
    {
        $this->markTestSkipped();

        $this->assertEquals("earay", $this->translator->translate("ear"));
    }

    public function testWordBeginningWithI()
    {
        $this->markTestSkipped();

        $this->assertEquals("iglooay", $this->translator->translate("igloo"));
    }

    public function testWordBeginningWithO()
    {
        $this->markTestSkipped();

        $this->assertEquals("objectay", $this->translator->translate("object"));
    }

    public function testWordBeginningWithU()
    {
        $this->markTestSkipped();

        $this->assertEquals("underay", $this->translator->translate("under"));
    }

    public function testWordBeginningVowelFollowedByQu()
    {
        $this->markTestSkipped();

        $this->assertEquals("equalay", $this->translator->translate("equal"));
    }


    public function testWordBeginningWithQWithoutAFollowingU()
    {
        $this->markTestSkipped();

        $this->assertEquals("atqay", $this->translator->translate("qat"));
    }


    public function testWordBeginningWithCh()
    {
        $this->markTestSkipped();

        $this->assertEquals("airchay", $this->translator->translate("chair"));
    }

    public function testWordBeginningWithQu()
    {
        $this->markTestSkipped();

        $this->assertEquals("eenquay", $this->translator->translate("queen"));
    }

    public function testWordBeginningWithQuAndAPrecedingConsonant()
    {
        $this->markTestSkipped();

        $this->assertEquals("aresquay", $this->translator->translate("square"));
    }

    public function testWordBeginningWithTh()
    {
        $this->markTestSkipped();

        $this->assertEquals("erapythay", $this->translator->translate("therapy"));
    }

    public function testWordBeginningWithThr()
    {
        $this->markTestSkipped();

        $this->assertEquals("ushthray", $this->translator->translate("thrush"));
    }

    public function testWordBeginningWithSch()
    {
        $this->markTestSkipped();

        $this->assertEquals("oolschay", $this->translator->translate("school"));
    }

    public function testWordBeginningWithYt()
    {
        $this->markTestSkipped();

        $this->assertEquals("yttriaay", $this->translator->translate("yttria"));
    }

    public function testWordBeginningWithXr()
    {
        $this->markTestSkipped();

        $this->assertEquals("xrayay", $this->translator->translate("xray"));
    }

    public function testAWholePhrase()
    {
        $this->markTestSkipped();

        $this->assertEquals("ickquay astfay unray", $this->translator->translate("quick fast run"));
    }
}
