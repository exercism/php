<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class TransposeTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Transpose.php';
    }

    /**
     * uuid: 404b7262-c050-4df0-a2a2-0cb06cd6a821
     */
    #[TestDox('Empty string')]
    public function testEmptyString(): void
    {
        $input = [""];
        $expected = [""];
        $this->assertEquals($expected, transpose($input));
    }

    /**
     * uuid: a89ce8a3-c940-4703-a688-3ea39412fbcb
     */
    #[TestDox('Two characters in a row')]
    public function testTwoCharactersInARow(): void
    {
        $input = [
            "A1",
        ];
        $expected = [
            "A",
            "1",
        ];
        $this->assertEquals($expected, transpose($input));
    }

    /**
     * uuid: 855bb6ae-4180-457c-abd0-ce489803ce98
     */
    #[TestDox('Two characters in a column')]
    public function testTwoCharactersInAColumn(): void
    {
        $input = [
            "A",
            "1",
        ];
        $expected = [
            "A1",
        ];
        $this->assertEquals($expected, transpose($input));
    }

    /**
     * uuid: 5ceda1c0-f940-441c-a244-0ced197769c8
     */
    #[TestDox('Simple')]
    public function testSimple(): void
    {
        $input = [
            "ABC",
            "123",
        ];
        $expected = [
            "A1",
            "B2",
            "C3",
        ];
        $this->assertEquals($expected, transpose($input));
    }

    /**
     * uuid: a54675dd-ae7d-4a58-a9c4-0c20e99a7c1f
     */
    #[TestDox('Single line')]
    public function testSingleLine(): void
    {
        $input = [
            "Single line.",
        ];
        $expected = [
            "S",
            "i",
            "n",
            "g",
            "l",
            "e",
            " ",
            "l",
            "i",
            "n",
            "e",
            ".",
        ];
        $this->assertEquals($expected, transpose($input));
    }

    /**
     * uuid: 0dc2ec0b-549d-4047-aeeb-8029fec8d5c5
     */
    #[TestDox('First line longer than second line')]
    public function testFirstLineLongerThanSecondLine(): void
    {
        $input = [
            "The fourth line.",
            "The fifth line.",
        ];
        $expected = [
            "TT",
            "hh",
            "ee",
            "  ",
            "ff",
            "oi",
            "uf",
            "rt",
            "th",
            "h ",
            " l",
            "li",
            "in",
            "ne",
            "e.",
            ".",
        ];
        $this->assertEquals($expected, transpose($input));
    }

    /**
     * uuid: 984e2ec3-b3d3-4b53-8bd6-96f5ef404102
     */
    #[TestDox('Second line longer than first line')]
    public function testSecondLineLongerThanFirstLine(): void
    {
        $input = [
            "The first line.",
            "The second line.",
        ];
        $expected = [
            "TT",
            "hh",
            "ee",
            "  ",
            "fs",
            "ie",
            "rc",
            "so",
            "tn",
            " d",
            "l ",
            "il",
            "ni",
            "en",
            ".e",
            " .",
        ];
        $this->assertEquals($expected, transpose($input));
    }

    /**
     * uuid: eccd3784-45f0-4a3f-865a-360cb323d314
     */
    #[TestDox('Mixed line length')]
    public function testMixedLineLength(): void
    {
        $input = [
            "The longest line.",
            "A long line.",
            "A longer line.",
            "A line.",
        ];
        $expected = [
            "TAAA",
            "h   ",
            "elll",
            " ooi",
            "lnnn",
            "ogge",
            "n e.",
            "glr",
            "ei ",
            "snl",
            "tei",
            " .n",
            "l e",
            "i .",
            "n",
            "e",
            ".",
        ];
        $this->assertEquals($expected, transpose($input));
    }

    /**
     * uuid: 85b96b3f-d00c-4f80-8ca2-c8a5c9216c2d
     */
    #[TestDox('Square')]
    public function testSquare(): void
    {
        $input = [
            "HEART",
            "EMBER",
            "ABUSE",
            "RESIN",
            "TREND",
        ];
        $expected = [
            "HEART",
            "EMBER",
            "ABUSE",
            "RESIN",
            "TREND",
        ];
        $this->assertEquals($expected, transpose($input));
    }

    /**
     * uuid: b9257625-7a53-4748-8863-e08e9d27071d
     */
    #[TestDox('Rectangle')]
    public function testRectangle(): void
    {
        $input = [
            "FRACTURE",
            "OUTLINED",
            "BLOOMING",
            "SEPTETTE",
        ];
        $expected = [
            "FOBS",
            "RULE",
            "ATOP",
            "CLOT",
            "TIME",
            "UNIT",
            "RENT",
            "EDGE",
        ];
        $this->assertEquals($expected, transpose($input));
    }

    /**
     * uuid: b80badc9-057e-4543-bd07-ce1296a1ea2c
     */
    #[TestDox('Triangle')]
    public function testTriangle(): void
    {
        $input = [
            "T",
            "EE",
            "AAA",
            "SSSS",
            "EEEEE",
            "RRRRRR",
        ];
        $expected = [
            "TEASER",
            " EASER",
            "  ASER",
            "   SER",
            "    ER",
            "     R",
        ];
        $this->assertEquals($expected, transpose($input));
    }

    /**
     * uuid: 76acfd50-5596-4d05-89f1-5116328a7dd9
     */
    #[TestDox('Jagged triangle')]
    public function testJaggedTriangle(): void
    {
        $input = [
            "11",
            "2",
            "3333",
            "444",
            "555555",
            "66666",
        ];
        $expected = [
            "123456",
            "1 3456",
            "  3456",
            "  3 56",
            "    56",
            "    5",
        ];
        $this->assertEquals($expected, transpose($input));
    }

    #[TestDox('Many lines')]
    public function testManyLines(): void
    {
        $input = [
            "Chor. Two households, both alike in dignity,",
            "In fair Verona, where we lay our scene,",
            "From ancient grudge break to new mutiny,",
            "Where civil blood makes civil hands unclean.",
            "From forth the fatal loins of these two foes",
            "A pair of star-cross'd lovers take their life;",
            "Whose misadventur'd piteous overthrows",
            "Doth with their death bury their parents' strife.",
            "The fearful passage of their death-mark'd love,",
            "And the continuance of their parents' rage,",
            "Which, but their children's end, naught could remove,",
            "Is now the two hours' traffic of our stage;",
            "The which if you with patient ears attend,",
            "What here shall miss, our toil shall strive to mend.",
        ];

        $expected = [
            "CIFWFAWDTAWITW",
            "hnrhr hohnhshh",
            "o oeopotedi ea",
            "rfmrmash  cn t",
            ".a e ie fthow ",
            " ia fr weh,whh",
            "Trnco miae  ie",
            "w ciroitr btcr",
            "oVivtfshfcuhhe",
            " eeih a uote  ",
            "hrnl sdtln  is",
            "oot ttvh tttfh",
            "un bhaeepihw a",
            "saglernianeoyl",
            "e,ro -trsui ol",
            "h uofcu sarhu ",
            "owddarrdan o m",
            "lhg to'egccuwi",
            "deemasdaeehris",
            "sr als t  ists",
            ",ebk 'phool'h,",
            "  reldi ffd   ",
            "bweso tb  rtpo",
            "oea ileutterau",
            "t kcnoorhhnatr",
            "hl isvuyee'fi ",
            " atv es iisfet",
            "ayoior trr ino",
            "l  lfsoh  ecti",
            "ion   vedpn  l",
            "kuehtteieadoe ",
            "erwaharrar,fas",
            "   nekt te  rh",
            "ismdsehphnnosa",
            "ncuse ra-tau l",
            " et  tormsural",
            "dniuthwea'g t ",
            "iennwesnr hsts",
            "g,ycoi tkrttet",
            "n ,l r s'a anr",
            "i  ef  'dgcgdi",
            "t  aol   eoe,v",
            "y  nei sl,u; e",
            ",  .sf to l   ",
            "     e rv d  t",
            "     ; ie    o",
            "       f, r   ",
            "       e  e  m",
            "       .  m  e",
            "          o  n",
            "          v  d",
            "          e  .",
            "          ,",
        ];

        $this->assertEquals($expected, transpose($input));
    }
}
