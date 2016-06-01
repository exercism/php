<?php
require_once "pig-latin.php";

class PigLatinTest extends PHPUnit_Framework_TestCase
{
    public function testWordBeginningWithP()
    {
        $this->assertEquals("igpay", PigLatin::translate("pig"));
    }

    public function testWordBeginningWithK()
    {
        $this->markTestSkipped();

        $this->assertEquals("oalakay", PigLatin::translate("koala"));
    }

    public function testWordBeginningWithY()
    {
        $this->markTestSkipped();

        $this->assertEquals("ellowyay", PigLatin::translate("yellow"));
    }

    public function testWordBeginningWithX()
    {
        $this->markTestSkipped();

        $this->assertEquals("enonxay", PigLatin::translate("xenon"));
    }

    public function testWordBeginningWithA()
    {
        $this->markTestSkipped();

        $this->assertEquals("appleay", PigLatin::translate("apple"));
    }

    public function testWordBeginningWithE()
    {
        $this->markTestSkipped();

        $this->assertEquals("earay", PigLatin::translate("ear"));
    }

    public function testWordBeginningWithI()
    {
        $this->markTestSkipped();

        $this->assertEquals("iglooay", PigLatin::translate("igloo"));
    }

    public function testWordBeginningWithO()
    {
        $this->markTestSkipped();

        $this->assertEquals("objectay", PigLatin::translate("object"));
    }

    public function testWordBeginningWithU()
    {
        $this->markTestSkipped();

        $this->assertEquals("underay", PigLatin::translate("under"));
    }


    public function testWordBeginningWithQWithoutAFollowingU()
    {
        $this->markTestSkipped();

        $this->assertEquals("atqay", PigLatin::translate("qat"));
    }


    public function testWordBeginningWithCh()
    {
        $this->markTestSkipped();

        $this->assertEquals("airchay", PigLatin::translate("chair"));
    }

    public function testWordBeginningWithQu()
    {
        $this->markTestSkipped();

        $this->assertEquals("eenquay", PigLatin::translate("queen"));
    }

    public function testWordBeginningWithQuAndAPrecedingConsonant()
    {
        $this->markTestSkipped();

        $this->assertEquals("aresquay", PigLatin::translate("square"));
    }

    public function testWordBeginningWithTh()
    {
        $this->markTestSkipped();

        $this->assertEquals("erapythay", PigLatin::translate("therapy"));
    }

    public function testWordBeginningWithThr()
    {
        $this->markTestSkipped();

        $this->assertEquals("ushthray", PigLatin::translate("thrush"));
    }

    public function testWordBeginningWithSch()
    {
        $this->markTestSkipped();

        $this->assertEquals("oolschay", PigLatin::translate("school"));
    }

    public function testWordBeginningWithYt()
    {
        $this->markTestSkipped();

        $this->assertEquals("yttriaay", PigLatin::translate("yttria"));
    }

    public function testWordBeginningWithXr()
    {
        $this->markTestSkipped();

        $this->assertEquals("xrayay", PigLatin::translate("xray"));
    }

    public function testAWholePhrase()
    {
        $this->markTestSkipped();

        $this->assertEquals("ickquay astfay unray", PigLatin::translate("quick fast run"));
    }
}
