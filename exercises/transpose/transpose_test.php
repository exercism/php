<?php

require "transpose.php";

class TransposeTest extends PHPUnit\Framework\TestCase
{
    public function testEmptyString()
    {
        $input = "";
        $expected = "";
        $this->assertEquals($expected, transpose($input));
    }

    public function testTwoCharactersInARow()
    {
        $this->markTestSkipped();
        $input = "A1";
        $expected = "A\n1";
        $this->assertEquals($expected, transpose($input));
    }

    public function testTwoCharactersInAColumn()
    {
        $this->markTestSkipped();
        $input = "A\n1";
        $expected = "A1";
        $this->assertEquals($expected, transpose($input));
    }

    public function testSimple()
    {
        $this->markTestSkipped();
        $input = "ABC\n123";
        $expected = "A1\nB2\nC3";
        $this->assertEquals($expected, transpose($input));
    }

    public function testSingleLine()
    {
        $this->markTestSkipped();
        $input = "Single line.";
        $expected = "S\ni\nn\ng\nl\ne\n \nl\ni\nn\ne\n.";
        $this->assertEquals($expected, transpose($input));
    }

    public function testFirstLineLongerThanSecondLine()
    {
        $this->markTestSkipped();
        $input = "The fourth line.\nThe fifth line.";
        $expected = "TT\nhh\nee\n  \nff\noi\nuf\nrt\nth\nh \n l\nli\nin\nne\ne.\n.";
        $this->assertEquals($expected, transpose($input));
    }

    public function testSecondLineLongerThanFirstLine()
    {
        $this->markTestSkipped();
        $input = "The first line.\nThe second line.";
        $expected = "TT\nhh\nee\n  \nfs\nie\nrc\nso\ntn\n d\nl \nil\nni\nen\n.e\n .";
        $this->assertEquals($expected, transpose($input));
    }

    public function testSquare()
    {
        $this->markTestSkipped();
        $input = "HEART\nEMBER\nABUSE\nRESIN\nTREND";
        $expected = "HEART\nEMBER\nABUSE\nRESIN\nTREND";
        $this->assertEquals($expected, transpose($input));
    }

    public function testRectangle()
    {
        $this->markTestSkipped();
        $input = "FRACTURE\nOUTLINED\nBLOOMING\nSEPTETTE";
        $expected = "FOBS\nRULE\nATOP\nCLOT\nTIME\nUNIT\nRENT\nEDGE";
        $this->assertEquals($expected, transpose($input));
    }

    public function testTriangle()
    {
        $this->markTestSkipped();
        $input = "T\nEE\nAAA\nSSSS\nEEEEE\nRRRRRR";
        $expected = "TEASER\n EASER\n  ASER\n   SER\n    ER\n     R";
        $this->assertEquals($expected, transpose($input));
    }

    public function testManyLines()
    {
        $this->markTestSkipped();
        $input = "Chor. Two households, both alike in dignity,\nIn fair Verona, ";
        $input .= "where we lay our scene,\nFrom ancient grudge break to new mutiny";
        $input .= ",\nWhere civil blood makes civil hands unclean.\nFrom forth";
        $input .= " the fatal loins of these two foes\nA pair of star-cross'd ";
        $input .= "lovers take their life;\nWhose misadventur'd piteous overthrows";
        $input .= "\nDoth with their death bury their parents' strife.\nThe fear";
        $input .= "ful passage of their death-mark'd love,\nAnd the continuance";
        $input .= " of their parents' rage,\nWhich, but their children's end, ";
        $input .= "naught could remove,\nIs now the two hours' traffic of our ";
        $input .= "stage;\nThe which if you with patient ears attend,\nWhat ";
        $input .= "here shall miss, our toil shall strive to mend.";

        $expected = "CIFWFAWDTAWITW\nhnrhr hohnhshh\no oeopotedi ea\nrfmrmash";
        $expected .= "  cn t\n.a e ie fthow \n ia fr weh,whh\nTrnco miae  ie\nw";
        $expected .= " ciroitr btcr\noVivtfshfcuhhe\n eeih a uote  \nhrnl sdtln";
        $expected .= "  is\noot ttvh tttfh\nun bhaeepihw a\nsaglernianeoyl\ne,ro";
        $expected .= " -trsui ol\nh uofcu sarhu \nowddarrdan o m\nlhg to'egccuwi\n";
        $expected .= "deemasdaeehris\nsr als t  ists\n,ebk 'phool'h,\n  reldi ffd";
        $expected .= "   \nbweso tb  rtpo\noea ileutterau\nt kcnoorhhnatr\nhl ";
        $expected .= "isvuyee'fi \n atv es iisfet\nayoior trr ino\nl  lfsoh  ecti";
        $expected .= "\nion   vedpn  l\nkuehtteieadoe \nerwaharrar,fas\n   nekt te ";
        $expected .= " rh\nismdsehphnnosa\nncuse ra-tau l\n et  tormsural\n";
        $expected .= "dniuthwea'g t \niennwesnr hsts\ng,ycoitkrttet\nn,l rs'a anr";
        $expected .= "\nief 'dgcgdi\ntaol  eoe,v\nyneisl,u;e\n,.sftol \n     ervdt";
        $expected .= "\n     ;ie o\n       f,r \n       eem\n       .me\n          ";
        $expected .= "on\n          vd\n          e.\n          ,";

        $this->assertEquals($expected, transpose($input));
    }
}
