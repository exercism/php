<?php
require_once "bob.php";

class BobTest extends PHPUnit\Framework\TestCase
{

    /**
     * @var \Bob
     */
    private $bob;

    public function setUp()
    {
        $this->bob = new Bob;
    }

    public function testStatingSomething()
    {
        $this->assertEquals("Whatever.", $this->bob->respondTo("Tom-ay-to, tom-aaaah-to."));
    }

    public function testShouting()
    {
        $this->markTestSkipped();

        $this->assertEquals("Whoa, chill out!", $this->bob->respondTo("WATCH OUT!"));
    }

    public function testShoutingGibberish()
    {
        $this->markTestSkipped();

        $this->assertEquals("Whoa, chill out!", $this->bob->respondTo("FCECDFCAAB"));
    }

    public function testAskingAQuestion()
    {
        $this->markTestSkipped();

        $this->assertEquals("Sure.", $this->bob->respondTo("Does this cryogenic chamber make me look fat?"));
    }

    public function testAskingANumericQuestion()
    {
        $this->markTestSkipped();

        $this->assertEquals("Sure.", $this->bob->respondTo("You are, what, like 15?"));
    }

    public function testAskingGibberish()
    {
        $this->markTestSkipped();

        $this->assertEquals("Sure.", $this->bob->respondTo("fffbbcbeab?"));
    }

    public function testTalkingForcefully()
    {
        $this->markTestSkipped();

        $this->assertEquals("Whatever.", $this->bob->respondTo("Let's go make out behind the gym!"));
    }

    public function testUsingAcronymsInRegularSpeech()
    {
        $this->markTestSkipped();

        $this->assertEquals("Whatever.", $this->bob->respondTo("It's OK if you don't want to go to the DMV."));
    }

    public function testForcefulQuestion()
    {
        $this->markTestSkipped();

        $this->assertEquals("Whoa, chill out!", $this->bob->respondTo("WHAT THE HELL WERE YOU THINKING?"));
    }

    public function testShoutingNumbers()
    {
        $this->markTestSkipped();

        $this->assertEquals("Whoa, chill out!", $this->bob->respondTo("1, 2, 3 GO!"));
    }

    public function testOnlyNumbers()
    {
        $this->markTestSkipped();

        $this->assertEquals("Whatever.", $this->bob->respondTo("1, 2, 3"));
    }

    public function testQuestionWithOnlyNumbers()
    {
        $this->markTestSkipped();

        $this->assertEquals("Sure.", $this->bob->respondTo("4?"));
    }

    public function testShoutingWithSpecialCharacters()
    {
        $this->markTestSkipped();

        $this->assertEquals("Whoa, chill out!", $this->bob->respondTo("ZOMG THE %^*@#$(*^ ZOMBIES ARE COMING!!11!!1!"));
    }


    public function testShoutingWithNoExclamationMark()
    {
        $this->markTestSkipped();

        $this->assertEquals("Whoa, chill out!", $this->bob->respondTo("I HATE YOU"));
    }

    public function testStatementContainingQuestionMark()
    {
        $this->markTestSkipped();

        $this->assertEquals("Whatever.", $this->bob->respondTo("Ending with ? means a question."));
    }

    public function testNonLettersWithQuestion()
    {
        $this->markTestSkipped();

        $this->assertEquals("Sure.", $this->bob->respondTo(":) ?"));
    }

    public function testPrattlingOn()
    {
        $this->markTestSkipped();

        $this->assertEquals("Sure.", $this->bob->respondTo("Wait! Hang on. Are you going to be OK?"));
    }

    public function testSilence()
    {
        $this->markTestSkipped();

        $this->assertEquals("Fine. Be that way!", $this->bob->respondTo(""));
    }

    public function testProlongedSilence()
    {
        $this->markTestSkipped();

        $this->assertEquals("Fine. Be that way!", $this->bob->respondTo("         "));
    }

    public function testAlternateSilence()
    {
        $this->markTestSkipped();

        $this->assertEquals("Fine. Be that way!", $this->bob->respondTo("\t\t\t\t\t\t\t\t\t\t"));
    }

    public function testMultipleLineQuestion()
    {
        $this->markTestSkipped();

        $this->assertEquals("Whatever.", $this->bob->respondTo("\nDoes this cryogenic chamber make me look fat?\nno"));
    }

    public function testStartingWithWhitespace()
    {
        $this->markTestSkipped();

        $this->assertEquals("Whatever.", $this->bob->respondTo("        hmmmmmmm..."));
    }

    public function testEndingWithWhitespace()
    {
        $this->markTestSkipped();

        $this->assertEquals("Sure.", $this->bob->respondTo("Okay if like my  spacebar  quite a bit?   "));
    }


    public function testNonQuestionEndingWithWhitespace()
    {
        $this->markTestSkipped();

        $this->assertEquals("Whatever.", $this->bob->respondTo("This is a statement ending with whitespace      "));
    }

//    public function testOtherWhitespace()
//    {
//        $this->markTestSkipped();
//
//        $this->assertEquals("Fine. Be that way!", $this->bob->respondTo("\n\r \t\u000b\u00a0\u2002"));
//    }
//
//    public function testShoutingWithUmlauts()
//    {
//        $this->markTestSkipped();
//
//        $this->assertEquals("Whoa, chill out!", $this->bob->respondTo("ÜMLÄÜTS!"));
//    }
//
//    public function testCalmlySpeakingWithUmlauts()
//    {
//        $this->markTestSkipped();
//
//        $this->assertEquals("Whatever.", $this->bob->respondTo("ÜMLäÜTS!"));
//    }
}
