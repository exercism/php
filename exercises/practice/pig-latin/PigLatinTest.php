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

class PigLatinTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'PigLatin.php';
    }

    public function testWordBeginningWithP(): void
    {
        $this->assertEquals("igpay", translate("pig"));
    }

    public function testWordBeginningWithK(): void
    {
        $this->assertEquals("oalakay", translate("koala"));
    }

    public function testWordBeginningWithY(): void
    {
        $this->assertEquals("ellowyay", translate("yellow"));
    }

    public function testWordBeginningWithX(): void
    {
        $this->assertEquals("enonxay", translate("xenon"));
    }

    public function testWordBeginningWithA(): void
    {
        $this->assertEquals("appleay", translate("apple"));
    }

    public function testWordBeginningWithE(): void
    {
        $this->assertEquals("earay", translate("ear"));
    }

    public function testWordBeginningWithI(): void
    {
        $this->assertEquals("iglooay", translate("igloo"));
    }

    public function testWordBeginningWithO(): void
    {
        $this->assertEquals("objectay", translate("object"));
    }

    public function testWordBeginningWithU(): void
    {
        $this->assertEquals("underay", translate("under"));
    }

    public function testWordBeginningVowelFollowedByQu(): void
    {
        $this->assertEquals("equalay", translate("equal"));
    }

    public function testWordBeginningWithQWithoutAFollowingU(): void
    {
        $this->assertEquals("atqay", translate("qat"));
    }

    public function testWordBeginningWithCh(): void
    {
        $this->assertEquals("airchay", translate("chair"));
    }

    public function testWordBeginningWithQu(): void
    {
        $this->assertEquals("eenquay", translate("queen"));
    }

    public function testWordBeginningWithQuAndAPrecedingConsonant(): void
    {
        $this->assertEquals("aresquay", translate("square"));
    }

    public function testWordBeginningWithTh(): void
    {
        $this->assertEquals("erapythay", translate("therapy"));
    }

    public function testWordBeginningWithThr(): void
    {
        $this->assertEquals("ushthray", translate("thrush"));
    }

    public function testWordBeginningWithSch(): void
    {
        $this->assertEquals("oolschay", translate("school"));
    }

    public function testWordBeginningWithYt(): void
    {
        $this->assertEquals("yttriaay", translate("yttria"));
    }

    public function testWordBeginningWithXr(): void
    {
        $this->assertEquals("xrayay", translate("xray"));
    }

    public function testAWholePhrase(): void
    {
        $this->assertEquals("ickquay astfay unray", translate("quick fast run"));
    }
}
