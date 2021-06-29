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

class BobTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Bob.php';
    }

    /** @var Bob */
    private $bob;

    public function setUp(): void
    {
        $this->bob = new Bob();
    }

    public function testStatingSomething(): void
    {
        $this->assertEquals("Whatever.", $this->bob->respondTo("Tom-ay-to, tom-aaaah-to."));
    }

    public function testShouting(): void
    {
        $this->assertEquals("Whoa, chill out!", $this->bob->respondTo("WATCH OUT!"));
    }

    public function testShoutingGibberish(): void
    {
        $this->assertEquals("Whoa, chill out!", $this->bob->respondTo("FCECDFCAAB"));
    }

    public function testAskingAQuestion(): void
    {
        $this->assertEquals("Sure.", $this->bob->respondTo("Does this cryogenic chamber make me look fat?"));
    }

    public function testAskingANumericQuestion(): void
    {
        $this->assertEquals("Sure.", $this->bob->respondTo("You are, what, like 15?"));
    }

    public function testAskingGibberish(): void
    {
        $this->assertEquals("Sure.", $this->bob->respondTo("fffbbcbeab?"));
    }

    public function testTalkingForcefully(): void
    {
        $this->assertEquals("Whatever.", $this->bob->respondTo("Let's go make out behind the gym!"));
    }

    public function testUsingAcronymsInRegularSpeech(): void
    {
        $this->assertEquals("Whatever.", $this->bob->respondTo("It's OK if you don't want to go to the DMV."));
    }

    public function testForcefulQuestion(): void
    {
        $this->assertEquals(
            "Calm down, I know what I'm doing!",
            $this->bob->respondTo("WHAT THE HELL WERE YOU THINKING?")
        );
    }

    public function testShoutingNumbers(): void
    {
        $this->assertEquals("Whoa, chill out!", $this->bob->respondTo("1, 2, 3 GO!"));
    }

    public function testOnlyNumbers(): void
    {
        $this->assertEquals("Whatever.", $this->bob->respondTo("1, 2, 3"));
    }

    public function testQuestionWithOnlyNumbers(): void
    {
        $this->assertEquals("Sure.", $this->bob->respondTo("4?"));
    }

    public function testShoutingWithSpecialCharacters(): void
    {
        $this->assertEquals("Whoa, chill out!", $this->bob->respondTo("ZOMG THE %^*@#$(*^ ZOMBIES ARE COMING!!11!!1!"));
    }

    public function testShoutingWithNoExclamationMark(): void
    {
        $this->assertEquals("Whoa, chill out!", $this->bob->respondTo("I HATE YOU"));
    }

    public function testStatementContainingQuestionMark(): void
    {
        $this->assertEquals("Whatever.", $this->bob->respondTo("Ending with ? means a question."));
    }

    public function testNonLettersWithQuestion(): void
    {
        $this->assertEquals("Sure.", $this->bob->respondTo(":) ?"));
    }

    public function testPrattlingOn(): void
    {
        $this->assertEquals("Sure.", $this->bob->respondTo("Wait! Hang on. Are you going to be OK?"));
    }

    public function testSilence(): void
    {
        $this->assertEquals("Fine. Be that way!", $this->bob->respondTo(""));
    }

    public function testProlongedSilence(): void
    {
        $this->assertEquals("Fine. Be that way!", $this->bob->respondTo("         "));
    }

    public function testAlternateSilence(): void
    {
        $this->assertEquals("Fine. Be that way!", $this->bob->respondTo("\t\t\t\t\t\t\t\t\t\t"));
    }

    public function testMultipleLineQuestion(): void
    {
        $this->assertEquals("Whatever.", $this->bob->respondTo("\nDoes this cryogenic chamber make me look fat?\nno"));
    }

    public function testStartingWithWhitespace(): void
    {
        $this->assertEquals("Whatever.", $this->bob->respondTo("        hmmmmmmm..."));
    }

    public function testEndingWithWhitespace(): void
    {
        $this->assertEquals("Sure.", $this->bob->respondTo("Okay if like my  spacebar  quite a bit?   "));
    }

    public function testNonQuestionEndingWithWhitespace(): void
    {
        $this->assertEquals("Whatever.", $this->bob->respondTo("This is a statement ending with whitespace      "));
    }

//    public function testOtherWhitespace()
    //    {
    //        $this->assertEquals("Fine. Be that way!", $this->bob->respondTo("\n\r \t\u{000b}\u{00a0}\u{2002}"));
    //    }
    //
    //    public function testShoutingWithUmlauts()
    //    {
    //        $this->assertEquals("Whoa, chill out!", $this->bob->respondTo("ÜMLÄÜTS!"));
    //    }
    //
    //    public function testCalmlySpeakingWithUmlauts()
    //    {
    //        $this->assertEquals("Whatever.", $this->bob->respondTo("ÜMLäÜTS!"));
    //    }
}
