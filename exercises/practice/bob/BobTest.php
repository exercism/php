<?php

declare(strict_types=1);

class BobTest extends PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'Bob.php';
    }

    /**
     * uuid: e162fead-606f-437a-a166-d051915cea8e
     * @testdox stating something
     */
    public function testStatingSomething(): void
    {
        $input = "Tom-ay-to, tom-aaaah-to.";
        $expected = "Whatever.";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: 73a966dc-8017-47d6-bb32-cf07d1a5fcd9
     * @testdox shouting
     */
    public function testShouting(): void
    {
        $input = "WATCH OUT!";
        $expected = "Whoa, chill out!";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: d6c98afd-df35-4806-b55e-2c457c3ab748
     * @testdox shouting gibberish
     */
    public function testShoutingGibberish(): void
    {
        $input = "FCECDFCAAB";
        $expected = "Whoa, chill out!";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: 8a2e771d-d6f1-4e3f-b6c6-b41495556e37
     * @testdox asking a question
     */
    public function testAskingAQuestion(): void
    {
        $input = "Does this cryogenic chamber make me look fat?";
        $expected = "Sure.";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: 81080c62-4e4d-4066-b30a-48d8d76920d9
     * @testdox asking a numeric question
     */
    public function testAskingANumericQuestion(): void
    {
        $input = "You are, what, like 15?";
        $expected = "Sure.";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: 2a02716d-685b-4e2e-a804-2adaf281c01e
     * @testdox asking gibberish
     */
    public function testAskingGibberish(): void
    {
        $input = "fffbbcbeab?";
        $expected = "Sure.";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: c02f9179-ab16-4aa7-a8dc-940145c385f7
     * @testdox talking forcefully
     */
    public function testTalkingForcefully(): void
    {
        $input = "Hi there!";
        $expected = "Whatever.";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: 153c0e25-9bb5-4ec5-966e-598463658bcd
     * @testdox using acronyms in regular speech
     */
    public function testUsingAcronymsInRegularSpeech(): void
    {
        $input = "It's OK if you don't want to go work for NASA.";
        $expected = "Whatever.";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: a5193c61-4a92-4f68-93e2-f554eb385ec6
     * @testdox forceful question
     */
    public function testForcefulQuestion(): void
    {
        $input = "WHAT'S GOING ON?";
        $expected = "Calm down, I know what I'm doing!";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: a20e0c54-2224-4dde-8b10-bd2cdd4f61bc
     * @testdox shouting numbers
     */
    public function testShoutingNumbers(): void
    {
        $input = "1, 2, 3 GO!";
        $expected = "Whoa, chill out!";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: f7bc4b92-bdff-421e-a238-ae97f230ccac
     * @testdox no letters
     */
    public function testOnlyNumbers(): void
    {
        $input = "1, 2, 3";
        $expected = "Whatever.";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: bb0011c5-cd52-4a5b-8bfb-a87b6283b0e2
     * @testdox question with no letters
     */
    public function testQuestionWithOnlyNumbers(): void
    {
        $input = "4?";
        $expected = "Sure.";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: 496143c8-1c31-4c01-8a08-88427af85c66
     * @testdox shouting with special characters
     */
    public function testShoutingWithSpecialCharacters(): void
    {
        $input = "ZOMG THE %^*@#$(*^ ZOMBIES ARE COMING!!11!!1!";
        $expected = "Whoa, chill out!";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: e6793c1c-43bd-4b8d-bc11-499aea73925f
     * @testdox shouting with no exclamation mark
     */
    public function testShoutingWithNoExclamationMark(): void
    {
        $input = "I HATE THE DENTIST";
        $expected = "Whoa, chill out!";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: aa8097cc-c548-4951-8856-14a404dd236a
     * @testdox statement containing question mark
     */
    public function testStatementContainingQuestionMark(): void
    {
        $input = "Ending with ? means a question.";
        $expected = "Whatever.";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: 9bfc677d-ea3a-45f2-be44-35bc8fa3753e
     * @testdox non-letters with question
     */
    public function testNonLettersWithQuestion(): void
    {
        $input = ":) ?";
        $expected = "Sure.";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: 8608c508-f7de-4b17-985b-811878b3cf45
     * @testdox prattling on
     */
    public function testPrattlingOn(): void
    {
        $input = "Wait! Hang on. Are you going to be OK?";
        $expected = "Sure.";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: bc39f7c6-f543-41be-9a43-fd1c2f753fc0
     * @testdox silence
     */
    public function testSilence(): void
    {
        $input = "";
        $expected = "Fine. Be that way!";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: d6c47565-372b-4b09-b1dd-c40552b8378b
     * @testdox prolonged silence
     */
    public function testProlongedSilence(): void
    {
        $input = "          ";
        $expected = "Fine. Be that way!";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: 4428f28d-4100-4d85-a902-e5a78cb0ecd3
     * @testdox alternate silence
     */
    public function testAlternateSilence(): void
    {
        $input = "\t\t\t\t\t\t\t\t\t\t";
        $expected = "Fine. Be that way!";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: 66953780-165b-4e7e-8ce3-4bcb80b6385a
     * @testdox multiple line question
     */
    public function testMultipleLineQuestion(): void
    {
        $input = "\nDoes this cryogenic chamber make me look fat?\nNo.";
        $expected = "Whatever.";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: 5371ef75-d9ea-4103-bcfa-2da973ddec1b
     * @testdox starting with whitespace
     */
    public function testStartingWithWhitespace(): void
    {
        $input = "         hmmmmmmm...";
        $expected = "Whatever.";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: 05b304d6-f83b-46e7-81e0-4cd3ca647900
     * @testdox ending with whitespace
     */
    public function testEndingWithWhitespace(): void
    {
        $input = "Okay if like my  spacebar  quite a bit?   ";
        $expected = "Sure.";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: 72bd5ad3-9b2f-4931-a988-dce1f5771de2
     * @testdox other whitespace
     */
    public function testOtherWhitespace()
    {
        $input = "\n\r \t";
        $expected = "Fine. Be that way!";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }

    /**
     * uuid: 12983553-8601-46a8-92fa-fcaa3bc4a2a0
     * @testdox non-question ending with whitespace
     */
    public function testNonQuestionEndingWithWhitespace(): void
    {
        $input = "This is a statement ending with whitespace      ";
        $expected = "Whatever.";
        $subject = new Bob();
        $this->assertEquals($expected, $subject->respondTo($input));
    }
}
