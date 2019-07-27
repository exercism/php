<?php

class TransposeTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once 'transpose.php';
    }

    public function testEmptyString() : void
    {
        $input = [""];
        $expected = [""];
        $this->assertEquals($expected, transpose($input));
    }

    public function testTwoCharactersInARow() : void
    {
        $input = [
            "A1"
        ];
        $expected = [
            "A",
            "1"
        ];
        $this->assertEquals($expected, transpose($input));
    }

    public function testTwoCharactersInAColumn() : void
    {
        $input = [
            "A",
            "1"
        ];
        $expected = [
            "A1"
        ];
        $this->assertEquals($expected, transpose($input));
    }

    public function testSimple() : void
    {
        $input = [
            "ABC",
            "123"
        ];
        $expected = [
            "A1",
            "B2",
            "C3"
        ];
        $this->assertEquals($expected, transpose($input));
    }

    public function testSingleLine() : void
    {
        $input = [
            "Single line."
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

    public function testFirstLineLongerThanSecondLine() : void
    {
        $input = [
            "The fourth line.",
            "The fifth line."
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
            "."
        ];
        $this->assertEquals($expected, transpose($input));
    }

    public function testSecondLineLongerThanFirstLine() : void
    {
        $input = [
            "The first line.",
            "The second line."
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
            " ."
        ];
        $this->assertEquals($expected, transpose($input));
    }

    public function testSquare() : void
    {
        $input = [
            "HEART",
            "EMBER",
            "ABUSE",
            "RESIN",
            "TREND"
        ];
        $expected = [
            "HEART",
            "EMBER",
            "ABUSE",
            "RESIN",
            "TREND"
        ];
        $this->assertEquals($expected, transpose($input));
    }

    public function testRectangle() : void
    {
        $input = [
            "FRACTURE",
            "OUTLINED",
            "BLOOMING",
            "SEPTETTE"
        ];
        $expected = [
            "FOBS",
            "RULE",
            "ATOP",
            "CLOT",
            "TIME",
            "UNIT",
            "RENT",
            "EDGE"
        ];
        $this->assertEquals($expected, transpose($input));
    }

    public function testTriangle() : void
    {
        $input = [
            "T",
            "EE",
            "AAA",
            "SSSS",
            "EEEEE",
            "RRRRRR"
        ];
        $expected = [
            "TEASER",
            " EASER",
            "  ASER",
            "   SER",
            "    ER",
            "     R"
        ];
        $this->assertEquals($expected, transpose($input));
    }

    public function testManyLines() : void
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
            "What here shall miss, our toil shall strive to mend."
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
            "          ,"
        ];

        $this->assertEquals($expected, transpose($input));
    }
}
