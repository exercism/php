<?php

declare(strict_types=1);

class PigLatinTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'PigLatin.php';
    }

    /**
     * uuid 11567f84-e8c6-4918-aedb-435f0b73db57
     * @testdox ay is added to words that start with vowels - word beginning with a
     */
    public function testWordBeginningWithA(): void
    {
        $this->assertEquals("appleay", translate("apple"));
    }

    /**
     * uuid f623f581-bc59-4f45-9032-90c3ca9d2d90
     * @testdox ay is added to words that start with vowels - word beginning with e
     */
    public function testWordBeginningWithE(): void
    {
        $this->assertEquals("earay", translate("ear"));
    }

    /**
     * uuid 7dcb08b3-23a6-4e8a-b9aa-d4e859450d58
     * @testdox ay is added to words that start with vowels - word beginning with i
     */
    public function testWordBeginningWithI(): void
    {
        $this->assertEquals("iglooay", translate("igloo"));
    }

    /**
     * uuid 0e5c3bff-266d-41c8-909f-364e4d16e09c
     * @testdox ay is added to words that start with vowels - word beginning with o
     */
    public function testWordBeginningWithO(): void
    {
        $this->assertEquals("objectay", translate("object"));
    }

    /**
     * uuid 614ba363-ca3c-4e96-ab09-c7320799723c
     * @testdox ay is added to words that start with vowels - word beginning with u
     */
    public function testWordBeginningWithU(): void
    {
        $this->assertEquals("underay", translate("under"));
    }

    /**
     * uuid bf2538c6-69eb-4fa7-a494-5a3fec911326
     * @testdox ay is added to words that start with vowels - word beginning with a vowel and followed by a qu
     */
    public function testWordBeginningVowelFollowedByQu(): void
    {
        $this->assertEquals("equalay", translate("equal"));
    }

    /**
     * uuid e5be8a01-2d8a-45eb-abb4-3fcc9582a303
     * @testdox First letter and ay are moved to the end of words that start with consonants - word beginning with p
     */
    public function testWordBeginningWithP(): void
    {
        $this->assertEquals("igpay", translate("pig"));
    }

    /**
     * uuid d36d1e13-a7ed-464d-a282-8820cb2261ce
     * @testdox First letter and ay are moved to the end of words that start with consonants - word beginning with k
     */
    public function testWordBeginningWithK(): void
    {
        $this->assertEquals("oalakay", translate("koala"));
    }

    /**
     * uuid d838b56f-0a89-4c90-b326-f16ff4e1dddc
     * @testdox First letter and ay are moved to the end of words that start with consonants - word beginning with x
     */
    public function testWordBeginningWithX(): void
    {
        $this->assertEquals("enonxay", translate("xenon"));
    }

    /**
     * uuid bce94a7a-a94e-4e2b-80f4-b2bb02e40f71
     * @testdox First letter and ay are moved to the end of words that start with consonants - word beginning with q without a following u
     */
    public function testWordBeginningWithQWithoutAFollowingU(): void
    {
        $this->assertEquals("atqay", translate("qat"));
    }

    /**
     * uuid c01e049a-e3e2-451c-bf8e-e2abb7e438b8
     * @testdox Some letter clusters are treated like a single consonant - word beginning with ch
     */
    public function testWordBeginningWithCh(): void
    {
        $this->assertEquals("airchay", translate("chair"));
    }

    /**
     * uuid 9ba1669e-c43f-4b93-837a-cfc731fd1425
     * @testdox Some letter clusters are treated like a single consonant - word beginning with qu
     */
    public function testWordBeginningWithQu(): void
    {
        $this->assertEquals("eenquay", translate("queen"));
    }

    /**
     * uuid 92e82277-d5e4-43d7-8dd3-3a3b316c41f7
     * @testdox Some letter clusters are treated like a single consonant - word beginning with qu and a preceding consonant
     */
    public function testWordBeginningWithQuAndAPrecedingConsonant(): void
    {
        $this->assertEquals("aresquay", translate("square"));
    }

    /**
     * uuid 79ae4248-3499-4d5b-af46-5cb05fa073ac
     * @testdox Some letter clusters are treated like a single consonant - word beginning with th
     */
    public function testWordBeginningWithTh(): void
    {
        $this->assertEquals("erapythay", translate("therapy"));
    }

    /**
     * uuid e0b3ae65-f508-4de3-8999-19c2f8e243e1
     * @testdox Some letter clusters are treated like a single consonant - word beginning with thr
     */
    public function testWordBeginningWithThr(): void
    {
        $this->assertEquals("ushthray", translate("thrush"));
    }

    /**
     * uuid 20bc19f9-5a35-4341-9d69-1627d6ee6b43
     * @testdox Some letter clusters are treated like a single consonant - word beginning with sch
     */
    public function testWordBeginningWithSch(): void
    {
        $this->assertEquals("oolschay", translate("school"));
    }

    /**
     * uuid 54b796cb-613d-4509-8c82-8fbf8fc0af9e
     * @testdox Some letter clusters are treated like a single vowel - word beginning with yt
     */
    public function testWordBeginningWithYt(): void
    {
        $this->assertEquals("yttriaay", translate("yttria"));
    }

    /**
     * uuid 8c37c5e1-872e-4630-ba6e-d20a959b67f6
     * @testdox Some letter clusters are treated like a single vowel - word beginning with xr
     */
    public function testWordBeginningWithXr(): void
    {
        $this->assertEquals("xrayay", translate("xray"));
    }


    /**
     * uuid a4a36d33-96f3-422c-a233-d4021460ff00
     * @testdox Position of y in a word determines if it is a consonant or a vowel - y is treated like a consonant at the beginning of a word
     */
    public function testWordBeginningWithY(): void
    {
        $this->assertEquals("ellowyay", translate("yellow"));
    }

    /**
     * uuid adc90017-1a12-4100-b595-e346105042c7
     * @testdox Position of y in a word determines if it is a consonant or a vowel - y is treated like a vowel at the end of a consonant cluster
     */
    public function testWordBeginningWithConsonantClusterThenY(): void
    {
        $this->assertEquals("ythmrhay", translate("rhythm"));
    }

    /**
     * uuid 29b4ca3d-efe5-4a95-9a54-8467f2e5e59a
     * @testdox Position of y in a word determines if it is a consonant or a vowel - y as second letter in two letter word
     */
    public function testTwoLetterWordWithY(): void
    {
        $this->assertEquals("ymay", translate("my"));
    }


    /**
     * uuid 44616581-5ce3-4a81-82d0-40c7ab13d2cf
     * @testdox Phrases are translated - a whole phrase
     */
    public function testAWholePhrase(): void
    {
        $this->assertEquals("ickquay astfay unray", translate("quick fast run"));
    }
}
